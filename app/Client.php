<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{

    protected $fillable=[ 'nom','prenom','tel','email','password','adresse'];

    
    public function orders(){
        return $this->hasMany('App\Order');
    }

    public function getClient($email,$password){

        $client = DB::table('clients')
        ->where('email',"like",$email)
        ->where('password','like',$password)
        ->get();
        return $client;

    }

    
}
