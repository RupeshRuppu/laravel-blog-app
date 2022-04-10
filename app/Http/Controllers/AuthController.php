<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function signin() {
        return view('auth.signin');
    }
    
    public function signup() {
        return view('auth.signup');
    }

    public function createUser(Request $req) {
        $req->validate([
            'fullname' => 'required|min:6|max:15',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:12'
        ]);
        
        $user = new User;
        $user->uid = uniqid();
        $user->fullname = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);

        $response =  $user->save();
        if($response) {
            $req->session()->put('user', [$user->uid, $user->email, $user->fullname]);
            return redirect()->route('posts.index');
        } else {
            return back()->with('error', "Whoop's something went wrong! Please try agian later");
        }
    }

    public function checkUser(Request $req) {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);
        
        $user = User::where('email', $req->email)->first();
        if($user) {

            if(Hash::check($req->password, $user->password)) {

                $req->session()->put('user', [$user->uid, $user->email, $user->fullname]);
                return redirect()->route('posts.index');

            } else {
                return back()->with('error', 'Password is incorrect!');
            }

        } else {
            return back()->with('error', 'No user account exists!');
        }
    }

    public function home(Request $req) {
        $user = User::where('email', '=', $req->session()->get('user')[1])->first();
        $u_ = [$user->uid, $user->email, $user->fullname];
        return view('page.home', compact('u_'));
    }

    public function logout(Request $req) {
        
        if($req->session()->has('user')) {
            $req->session()->flush();
        }

        return redirect()->route('auth.signin');
    }

    /*  These two methods help's user to reset his password. */

    public function resetPassword() {
        return view('auth.reset-password');
    }
    public function setResetInputCookie(Request $req) {
        if($req->submit === 'Get Key') {
            $email = $req->email;

            $user = DB::table('users')->where('email', $email)->first();
            if($user === null) {
                return back()->with('email-error', $email);
            } else {

                $key = uniqid();
                $details = [
                    'title' => "Attention please. Don't share this unique id with others!",
                    'body' => 'secret key: '.$key
                ];
                \Mail::to($email)->send(new \App\Mail\ResetMail($details));
                
                DB::table('users')->where('email', $email)->update(array(
                    'password'=>$key,
                ));
                
                return back()->with('reset-inputs', $email);
            }
        }

        $key = $req->key;
        $user = DB::table('users')->where('password', $key)->first();
        if($user === null) {
            return back()->with('key-error', $key);
        }
        $email = $req->email;
        $password = $req->password;
        DB::table('users')->where('email', $email)->update(array(
            'password'=> Hash::make($password),
        ));

        return redirect()->route('auth.signin');
    }
}
