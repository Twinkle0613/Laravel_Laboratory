<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\Users\StoreUserRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'table_fields' => [ 
                    ['key'=> 'id','label' => '#','width' => '1%'],
                    ['key'=> 'name','label' => 'Name'],
                    ['key'=> 'email','label' => 'Email'],
                    ['key'=> 'created_at','label' => 'CreatedAt'],
            ],
            'form_inputs' => [
                ['type' => 'text','key'=>'name','label'=>'Name'],
                ['type' => 'email','for'=> 'inputEmail3' ,'key'=>'email','label'=>'Email'],
                ['type' => 'password','key'=>'password','label'=>'Password'],
                ['type' => 'password','key'=>'c_password','label'=>'Confirm Password'],
            ]
            ];

        return view('home',$data);
    }
}
