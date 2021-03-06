<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class UserController extends Controller
{
    public function doReg(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');
        $email = $request->input('email');
        $password = Hash::make($password);
        $user = new User;
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();

        return response()->json([
            'result'=>'success'
        ]);
    }

    public function reg()
    {
        return view('test');
    }

    public function login()
    {
        return view('test');
    }

    public function doLogin(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        $user = User::where('name',$name)->get();
        $token = JWTAuth::fromUser($user[0]);
        $result = Hash::check($password,$user[0]->password);
        if($result){
            session([
               'user' => $user[0]->id
            ]);
           return response()->json([
                'reuslt' => 'success',
                'token' => $token
            ]);
        }
    }




    public function testLogin(Request $request)
    {
        dd(session('user'));
            return response()->json(compact('user'));
    }

    public function logout(Request $request)
    {
        if(session('user')){
            $request->session()->flush();
        }
    }
}
