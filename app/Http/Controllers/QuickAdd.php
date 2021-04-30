<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
class QuickAdd extends Controller
{
    public function add(){
   $admin = new Admin();
   $admin->username =('nilesh');
   $admin->password = Hash::make('nilesh');
   $admin->save();
   return 'added successfully';
  }
}
