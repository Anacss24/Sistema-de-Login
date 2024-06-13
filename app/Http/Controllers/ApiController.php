<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ApiController extends Controller
{
    
    public function getAllLogin(){

        $logins = Login::get()->toJson(JSON_PRETTY_PRINT);
        return response($logins, 200)->header('Content-Type', 'application/json; charset=utf-8');
     }

     public function getLogin($id){
        if(Login::where('id', $id)->exists()){
            $login = Login::where ('id',$id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($login, 200)->header('Content-type', 'application/json; charset=utf-8');
        }else{
            return response()->json([
                "message" => 'Login not found'
            ],404);
        }
        
    }

    public function store (Request $request){
        $login = new Login();
        $login->name = $request->input('name');
        $login->email = $request->input('email');
        $password = $request->input('password');

        if ($password) {
        $login->password = Hash::make($password);
}
        

        $login->save();

        return response()->json([
            "message" => "Login record created",
            "data" =>$login,
        ],201)->header('Content-Type', 'application/json; charset=utf-8');
    }
    
    public function update(Request $request, $id){
        if(Login::where('id',$id)->exists()){
            $login = Login::find($id);
            $login->name = is_null($request->name) ? $login->name : $request->name;
            $login->email = is_null($request->email) ? $login->email : $request->email;
            
            if (!is_null($request->password)) {
                $hashedPassword = Hash::make($request->password);
                $login->password = $hashedPassword;
            }
           $login->save();


           return response()->json([
            "message" => "Login record updated",
            "data" => $login,
           ],200)->header('Content-Type', 'application/json; charset=utf-8');
           
        }
    }


    public function delete($id){
        if(Login::where('id',$id)->exists()){
            $login = Login::find($id);
            $login->delete();

            return response()->json([
             "message" => "Login deleted"
            ], 200);
        }else{
            return response()->json([
                "message" => "Login not found"
            ],404);
        }
    }


}    

