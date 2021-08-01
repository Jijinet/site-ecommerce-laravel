<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Client as Client;

class ClientController extends Controller
{
    public function __construct(Client $client){
        $this->client=$client;

    }

    public function addClient(Request $request,Client $client){


        if($request->isMethod('post')){
            $client= new Client([
                'nom' =>$request->input('first'),
                'prenom' =>$request->input('last'),
                'tel' =>$request->input('phone'),
                'email' =>$request->input('email'),
                'password' =>$request->input('password'),
                'adresse' =>$request->input('adress')
            ]);

            $client->save();

            return redirect('/');
            
        }

        return view('index');

    }

    public function authClient(Request $request){

        if($request->isMethod('post')){
            
      
            $email=$request->input('email');
            $password=$request->input('password');
            
            $client = $this->client->getClient($email,$password);
            $request->session()->put('client', $client);

            if($client != null){
                return redirect('/');
            } else{
                
            }
                
            }

            return view('index');
        
    }

    public function logoutClient(Request $request){

        $request->session()->forget('client');
        return redirect('/');
        return view('index');
        
    }

}
