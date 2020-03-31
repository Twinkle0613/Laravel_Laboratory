<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
                        // ['key'=> 'id','label' => '#','width' => '1%'],
                        ['type' => 'text', 'key'=> 'name','label' => 'Name'],
                        ['type' => 'text', 'key'=> 'email','label' => 'Email'],
                        ['type' => 'tag', 'key'=> 'roles','data'=>'name','label' => 'Roles'],
                        // ['type' => 'text', 'key'=> 'created_at','label' => 'CreatedAt'],
                ],
                'form_inputs' => [
                    ['type' => 'image','key'=>'picture','label'=>'Picture','default_img' => asset('')],
                    ['type' => 'text','key'=>'name','label'=>'Name'],
                    ['type' => 'email','for'=> 'inputEmail3' ,'key'=>'email','label'=>'Email'],
                    ['type' => 'select','key'=>'roles','label'=>'Roles','multiple'=>true,'api'=> route('api.roles.index') ],
                    ['type' => 'password','key'=>'password','label'=>'Password'],
                    ['type' => 'password','key'=>'c_password','label'=>'Confirm Password'],
                ]
            ],
            'roles_table' => [
                'table_fields' => [ 
                        // ['key'=> 'id','label' => '#','width' => '1%'],
                        ['type' => 'text', 'key'=> 'name','label' => 'Name'],
                        ['type' => 'tag', 'key'=> 'permissions','data'=>'name','label' => 'Permissions'],
                ],
                'form_inputs' => [
                    ['type' => 'text','key'=>'name','label'=>'Name'],
                    ['type' => 'select','key'=>'permissions','label'=>'Permissions','multiple'=>true,'api'=> route('api.permissions.index')],
                ]
            ],
            'permissions_table' => [
                'table_fields' => [ 
                        // ['key'=> 'id','label' => '#','width' => '1%'],
                        ['type' => 'text', 'key'=> 'name','label' => 'Name'],
                        ['type' => 'text', 'key'=> 'guard_name','label' => 'Guard Name'],
                        ['type' => 'text', 'key'=> 'created_at','label' => 'CreatedAt'],
                ],
                'form_inputs' => [
                    ['type' => 'text','key'=>'name','label'=>'Name'],
                ]
            ]

        ];

        return view('home',$data);
    }
}
