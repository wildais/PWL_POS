<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    public function index(){
        // $data = [
        //     'level_id' => 1,
        //     'username' => 'manager_tiga',
        //     'nama' => 'Manager 3',
        //     'password' => Hash::make('12345'),
        // ];
        // UserModel::create($data);        
        
        // $user = UserModel::find(2);
        // $user = UserModel::where('level_id',1)->first();
        // $user = UserModel::firstwhere('level_id',1)->first();
        // $user = UserModel::findOr(10, ['username', 'nama'], function(){
        //     abort(404);
        // });
        
        // $user = UserModel::findOrFail(10);

        // $user = UserModel::where('username','manager_seribu')->firstOrFail();
        // return view('user', ['d' => $user]);

        // $count = UserModel::where('level_id',1)->count();
        // return view('user', ['count' => $count]);
        
        // $user = UserModel::firstOrCreate(
        //     [
        //         'username' => 'pelanggan7',
        //         'nama' => 'Pelanggan 7',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ],
        // );
        
        // $user = UserModel::all();
        // return view('user', ['data' => $user]);

        $user = UserModel::with('level')->get();
        return view('user', ['data' => $user]);

        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'pelanggan8',
        //         'nama' => 'Pelanggan 8',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2,
        //     ],
        // );
        // // $user->save();
        // return view('user', ['d' => $user]);

        // $user->username='Pelanggan 2000';

        // $user->isDirty();
        // $user->isDirty('username');
        // $user->isDirty('nama');
        // $user->isDirty('nama', 'username');

        // $user->isClean('username');
        // $user->isClean('username');
        // $user->isClean('nama');
        // $user->isClean('nama', 'username');

        // $user->save();
        // $user->isDirty();
        // $user->isClean();
        // dd($user->isDirty());

        // $user->save();
        // $user->wasChanged();
        // $user->wasChanged('username');
        // $user->wasChanged('nama');
        // dd($user->wasChanged(['nama','username']));
        
        // $data = [
        //     'username' => 'Pelanggan',
        //     'nama' => 'Customer1',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 1
        // ];
        // UserModel::insert($data);
    }

    public function tambah(){
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request){
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }

    public function ubah($id){
        $user = UserModel::find($id);
        return view('user_ubah',['data'=>$user]);
    }

    public function ubah_simpan($id, Request $request){
        $user = UserModel::find($id);
        
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->level_id = $request->level_id;

        $user->save();
        return redirect('/user');
    }

    public function hapus($id){
        $user = UserModel::find($id);
        $user->delete();
        return redirect('/user');
    }
}