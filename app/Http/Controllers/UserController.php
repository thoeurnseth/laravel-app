<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = Auth::user(); 
            $success['token']   =   $user->createToken('MyApp')->plainTextToken; 
            $success['name']    =   $user->name;
            $success['email']   =   $user->email;
            return $success;
        } 
        else{ 
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        } 
    }

    public function Register(Request $request){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        if(!empty($email) && !empty($password)){
            $register = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
            ]);
            if($register = 1){
                $result = [
                    'status' => 'success',
                ];
            }
        }else{
            $result = [
                'status' => '404',
            ];
        }
        echo json_encode($result);
    }

    public function Test(){
        return 122222222222;
    }
}
