<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Client as passportClient;
use GuzzleHttp\Client;
use App\User;
use Validator;


class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        // if ($request->isJson()) {
        
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $access_token = $this->getToken($request->email, $request->password);
                return response()->json(['access_token'=>$access_token],200);                
            } else {
                dd('entro al else');
            }
        // } else {
        //     return response()->json(['error' => 'Forbidden'], 403);
        // }
    }

    public function register(Request $request)
    {
        //valida
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'role_id' => 'required',
            'consultorio_id' => 'required'
        ]);
        //no cumple validacion
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $password = $request->password;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $client = passportClient::where('password_client', 1)->first();
        return $this->getToken($client, $user->email, $password);        
    }

    public function getToken($email, $password){
        $client = passportClient::where('password_client', 1)->first();        
        $http = new Client;
        
        $response = $http->post('http://localhost/consultorio/public/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'username' => $email,
                'password' => $password,
                'scope' => '',
            ],
        ]);        
        $res = json_decode((string) $response->getBody(), true);
        dd($res);
        //return json_decode((string) $response->getBody(), true);
    }
}
