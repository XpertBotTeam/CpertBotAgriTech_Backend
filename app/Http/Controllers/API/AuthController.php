<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $credentials = $request->only(['email','password']);


        if(Auth::attempt($credentials))
        {
            // $user = Auth::user()->id;
            $user = $request->user();
            $access_token = $user->createToken('authToken')->plainTextToken;
            return response()->json([
                'success'=>true,
                'token'=>$access_token,
                'message'=>'User logged-in successfuly'
            ]);
        }
        else
        {
            return response()->json([
                'success'=>false,
                'message'=>'wrong username or password'
            ]);
        }
    }
    public function register(Request $request)
    {

        $user = User::where('email',$request->email)->first();

        if(is_null($user))
        {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'status'=>true,
                'message' => 'User Creeated Successfully',
                'token' => $token
            ]);

        }
        else
        {
            return response()->json([
                'status'=>false,
                'message'=>'User already exists'
            ]);
        }


    }
    public function update_Password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8|max:100',
            'confirm_password' => 'required|same:new_password'
        ]);

        $current_user = $request->user();

        if(Hash::check($request->old_password, $current_user->password))
        {
            $current_user->update([
                'password' => bcrypt($request->new_password)
            ]);
            return response()->json([
                'status'=>true,
                'message'=>'Password Changed Successfully'
            ]);

        }
        else
        {
            return response()->json([
                'status'=>false,
                'message'=>'Old password is incorrect'
            ]);
        }
    }
}
