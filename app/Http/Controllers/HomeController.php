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
            'users_table' => [
                'table_fields' => [ 
                        ['key'=> 'id','label' => '#','width' => '1%'],
                        ['key'=> 'name','label' => 'Name'],
                        ['key'=> 'email','label' => 'Email'],
                        ['key'=> 'created_at','label' => 'CreatedAt'],
                ],
                'form_inputs' => [
                    ['type' => 'text','key'=>'name','label'=>'Name'],
                    ['type' => 'email','for'=> 'inputEmail3' ,'key'=>'email','label'=>'Email'],
                    ['type' => 'select','key'=>'role','label'=>'Role','multiple'=>false],
                    ['type' => 'password','key'=>'password','label'=>'Password'],
                    ['type' => 'password','key'=>'c_password','label'=>'Confirm Password'],
                ]
            ],
            'roles_table' => [
                'table_fields' => [ 
                        ['key'=> 'id','label' => '#','width' => '1%'],
                        ['key'=> 'name','label' => 'Name'],
                        ['key'=> 'guard_name','label' => 'Guard Name'],
                        ['key'=> 'created_at','label' => 'CreatedAt'],
                ],
                'form_inputs' => [
                    ['type' => 'text','key'=>'name','label'=>'Name'],
                    ['type' => 'select','key'=>'permissions','label'=>'Permissions','multiple'=>true],
                ]
            ],
            'permissions_table' => [
                'table_fields' => [ 
                        ['key'=> 'id','label' => '#','width' => '1%'],
                        ['key'=> 'name','label' => 'Name'],
                        ['key'=> 'guard_name','label' => 'Guard Name'],
                        ['key'=> 'created_at','label' => 'CreatedAt'],
                ],
                'form_inputs' => [
                    ['type' => 'text','key'=>'name','label'=>'Name'],
                ]
            ]

        ];

        return view('home',$data);
    }
}
