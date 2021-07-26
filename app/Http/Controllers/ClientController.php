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
        $data=[];

        if($request->isMethod('post')){
            
      
            $email=$request->input('email');
            $password=$request->input('password');
            
            $request->session()->put('data',$this->client->getClient($email,$password));

            if($request->session()->has('data')){
                $data['clients']=$request->session()->get('data');

            }
                return redirect('/');
                dd($data['clients']);
        
            }


        return view('index',$data);

    }

}
