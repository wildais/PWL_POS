<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index(){
        $user = UserModel::all();
        return view('user', ['data' => $user]);

        // $data = [
        //     'username' => 'Pelanggan',
        //     'name' => 'Customer1',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 1
        // ];
        // m_user::insert($data);
    }
}