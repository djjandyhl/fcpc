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
        $msg = DB::select('select vote_name, message_up as msg,updated_at from user_votes where up_status=1 union select vote_name, message_down as msg,updated_at from user_votes where down_status=1 order by updated_at desc');
        return view('home', ['data' => $arr, 'app' => $app,'msg'=>$msg]);
    }

    public function pc(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|exists:votes,name',
            'up' => 'in:0,1',
            'down' => 'in:0,1',
            'message_up' => 'nullable|max:150',
            'message_down' => 'nullable|max:150'
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
            'up' => $request->get('up', 0),
            'down' => $request->get('down', 0),
            'message_up' => $request->message_up,
            'message_down' => $request->message_down,
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
            'id' => 'exists:user_votes,id',
            'tag'=>'required|in:up,down'
        ]);
        $model = UserVote::find($request->id);
        $col = $request->tag.'_status';
        $model->$col = $request->status;
        $model->save();
        return [];
    }

    public function backend()
    {
        $result = UserVote::orderByDesc('created_at')->paginate(20);
        return view('backend', ['data' => $result]);
    }
}