<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use App\Models\User;

class AuthController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role'=> 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['user'] =  $user->name;
        $success['token'] =  $user->createToken('Uploader')->accessToken->token;

        return response()->json(['success'=>$success], 200);
    }

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('Uploader')-> accessToken->token;
            $success['name'] =  $user->name;
            $success['role'] =  $user->role;
    
            return response()->json(['success' => $success], 200);
        }
        else {
            return response()->json(['error' => 'Invalid email or password'], 401);
        }
    }
    

    public function details()
    {
        $user = Auth::user();
        return response()->json(['user' => $user], $this-> successStatus);
    }
}
