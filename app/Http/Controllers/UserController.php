<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Whine;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * registration
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:16',
            'confirm' => 'required|same:password',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('user.login')->with('success','会員登録しました。ログインしてください。');
    }

    /**
     * login
     *
     * @param Request $request
     * @return void
     */
    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:16',
        ]);
        $roles = $request->only('email','password');
        if(Auth::attempt($roles)){
            return redirect()->route('user.home')->with('success',"おかえりなさい。".Auth::user()->name."さん");
        }else{
            return redirect()->back()->with('error','ログインに失敗しました。再度ログインしてください。');
        }
    }

    public function guestLogin()
    {
        if(Auth::attempt(['email' => 'guest@guest.com','password' => 'guestLogin'])){
            return redirect()->route('user.home')->with('success','ゲストとしてログインしました。');
        }else{
            return false;
        }
    }
    /**
     * logout
     *
     * @return void
     */
    public function logout()
    {
        Auth::logout();
        return back();
    }


    public function home()
    {
        $users=User::get();
        $whines=Whine::inRandomOrder()->limit(10)->get();
        $sympathys=Auth::user()->sympathy_whines()->orderBy('created_at','desc')->get();
        $mines=Auth::user()->whines()->orderBy('created_at','desc')->get();

        return view('users.home',compact('users','whines','sympathys','mines'));
    }

    public function setting()
    {
        $user=Auth::user();
        $user_data=json_encode($user);
        return view('users.setting',compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = Auth::user();
        $user->update($request->only(['name','email']));
        
        return redirect()->back()->with('success','ユーザー情報を更新しました。');
    }

    public function favorites()
    {
        $user = Auth::user();
        $whines = $user->sympathy_whines()->orderBy('created_at','desc')->paginate(10);
        return view('users.favorites',compact('user','whines'));
    }
}
