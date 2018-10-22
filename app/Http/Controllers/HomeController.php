<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 2018/10/2
 * Time: 22:08
 */

namespace App\Http\Controllers;


use App\Models\UserVote;
use EasyWeChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $arr = config('kfs.data');
        $app = EasyWeChat::officialAccount();
        return view('home', ['data' => $arr, 'app' => $app]);
    }

    public function pc(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|exists:votes,name',
            'jzzl' => 'required|in:0,1',
            'wy' => 'required|in:0,1',
            'shzr' => 'required|in:0,1',
            'message' => 'nullable|max:500'
        ]);
        /*$user = session('wechat.oauth_user.default'); // 拿到授权用户资料
        $userId = $user->getId();
        $record = UserVote::where('id', $userId)->first();
        if ($record) {
            return ['code' => 201, 'message' => '你已经投过票了'];
        }*/
        if (isset($_COOKIE["submit"])) {
            $submit = $_COOKIE["submit"];
            if ($submit === 'yes') {
                return ['code' => 201, 'message' => '你已经投过票了'];
            }
        }
        $result = UserVote::create([
            //'id' => $userId,
            'vote_name' => $request->name,
            'jzzl' => $request->jzzl,
            'wy' => $request->wy,
            'shzr' => $request->shzr,
            'message' => $request->message,
            'ip' => $request->ip()
        ]);
        if ($result) {
            $exp = time() + 60 * 60 * 24 * 30;
            setcookie("submit", "yes", $exp);
            return ['code' => 200, 'message' => '提交成功'];
        }
    }

    public function init()
    {
        $arr = config('kfs.data');
        $data = [];
        foreach ($arr as $items) {
            foreach ($items['data'] as $item) {
                $data[] = ['name' => $item['name']];
            }
        }
        DB::table('votes')->insert($data);
    }

    public function sh($id, Request $request)
    {
        $this->validate($request, [
            'status' => 'required|in:0,1',
            'id' => 'exists:user_votes,id'
        ]);
        $model = UserVote::find($request->id);
        $model->status = $request->status;
        $model->save();
        return [];
    }

    public function backend()
    {
        $result = UserVote::orderByDesc('created_at')->paginate(20);
        return view('backend', ['data' => $result]);
    }
}