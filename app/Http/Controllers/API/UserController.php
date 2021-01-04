<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{

    public $successStatus = 200;

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $email = request('email');
//            $success['token'] =  $user->createToken('nApp')->accessToken;
            $token =  $user->createToken('nApp')->accessToken;
            $datas = User::where('email', $email)->first();
//            return response()->json(['success' => $success], $this->successStatus);
            return response()->json([
                'http status' => '200',
                'status' => 'true',
                'Message' => 'Login Success',
                'token' => $token,
                'data' => $datas
            ], $this->successStatus);
        }
        else{
//            return response()->json(['error'=>'Unauthorised'], 401);
            return response()->json([
                'http status' => '401',
                'status' => 'false',
                'Message' => 'Unauthorised'
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
//            return response()->json(['error'=>$validator->errors()], 401);
            return response()->json([
                'http status' => '401',
                'status' => 'false',
                'Message' => $validator->errors(),
            ], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('nApp')->accessToken;
        $success['name'] =  $user->name;



//        return response()->json(['success'=>$success], $this->successStatus);
        return response()->json([
            'http status' => '200',
            'status' => 'true',
            'Message' => 'Register Success',
            'data' => $success
        ], $this->successStatus);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }

    public function createAuthUser(request $request){
        $user = new User;
        $user->employee_id = $request->employee_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = $request->remember_token;
        $user->save();

        return response()->json([
            'http status' => '201',
            'status' => 'true',
            'Message' => 'Success insert new auth data',
        ], 201);
    }
}
