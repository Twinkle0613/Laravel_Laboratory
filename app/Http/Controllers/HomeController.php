<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

        $users = User::select(['id','name','email','created_at'])->get();
        // dd($users);
        $data = [
            'users' => $users,
            'fields' => [ 
                    ['label' => '#','width' => '1%'],
                    ['label' => 'Name'],
                    ['label' => 'Email'],
                    // ['label' => 'Created At'],
                    ['label' => 'Action','width' => '240px']
            ],
            ];

        // dd($data);
        return view('home',$data);
    }
}
