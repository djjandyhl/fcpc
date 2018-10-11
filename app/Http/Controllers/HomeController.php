<?php
/**
 * Created by PhpStorm.
 * User: djj
 * Date: 2018/10/2
 * Time: 22:08
 */

namespace App\Http\Controllers;


use App\Models\UserVote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $arr = config('kfs.data');
        return view('home', ['data' => $arr]);
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
        $submit = Cookie::get('submit');
        if ($submit === 'yes') {
            return ['code' => 201, 'message' => '你已经投过票了'];
        }
        $result = UserVote::create([
            //'id' => $userId,
            'vote_name' => $request->name,
            'jzzl' => $request->jzzl,
            'wy' => $request->wy,
            'shzr' => $request->shzr,
            'message' => $request->message
        ]);
        if ($result) {
            setcookie("submit", "yes");
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

    public function backend()
    {
        $result = UserVote::orderByDesc('created_at')->paginate(20);
        return view('backend', ['data' => $result]);
    }
}