<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;

class AdminController extends Controller
{
    public function indexUsers(){
        $data = User::get();

        return view('dashboard.user', compact('data'));
    }

    public function indexEditUser($id){
        $data = User::where('id',$id)->first();
        return view ('dashboard.edit-user', compact('data'));
    }

    public function updateIndex(Request $request , $id){

        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'address' => $request->address           
        ]);

        return redirect()->route('indexUser')
        ->with('Success', 'Selamat Activity Berhasil Dibuat!');
    }

    public function delete($id){
        User::where('id',$id)->delete();
        return redirect(route('indexUser'));
    }



}
