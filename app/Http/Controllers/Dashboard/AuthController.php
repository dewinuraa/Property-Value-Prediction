<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\users;
class AuthController extends Controller
{
    //

    public function login()
    {

        return view('login');
    }
    public function login_procces(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd($request->all());
        // dd('test');

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user);

             if ($user instanceof \App\Models\Users)
              {
                  $token = $user->createToken('auth_token')->plainTextToken;
             }
            // $token = $user->createToken('auth_token')->plainTextToken;
            Cache::put('token', $token, now()->addMinutes(60));
            // dd("disini");
            return redirect()->intended('history');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function register_procces(Request $request){
        $validateData=$request->validate([
            'username' => 'required|max:255',
            'name' =>'required|max:255',
            'email' =>'required|email|max:255|unique:users',
            'password' => 'required',

        ]);
        // dd($validateData);
        $validateData['password']=bcrypt($validateData['password']);
        $user = users::create($validateData);
     
        return redirect()->route('login');
    }

    public function register()
    {
        return view('register');
    }

    public function logout(){
    Cache::clear();

    Auth::logout();
    

    return redirect('/'); // Redirect to the home page after logout
    }
}
