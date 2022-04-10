<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;

class FuncController extends Controller
{
    public function findPostsBySearch(Request $req) {
        $posts = json_decode(DB::table('posts')
                ->where('postcategory', 'like', '%' . $req->search . '%')->get(), true);
        return view('post.index', ['posts' => $posts]);
    }

    public function findUserPosts(Request $req) {
        $session = $req->session()->get('user');
        $posts = Post::where('userid', $session[0])->get();
        return view('my-posts', ['posts' => $posts]);
    }

    public function deleteUserAccount() {
        DB::table('users')->where('uid', \Session::get('user')[0])->delete();
        \Session::flush();
        return redirect('/auth/signup');
    }
}
