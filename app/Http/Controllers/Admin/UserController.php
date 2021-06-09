<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class UserController extends Controller
{
    
    public function index(){
        $users = User::all(); 
        return view("admin.user" , ['users' => $users]);
    }
    public function destroy($id)
    {   
        $user = User::where('id' , $id)->first();
        $user->delete();
        return redirect()->back();
    }
}
