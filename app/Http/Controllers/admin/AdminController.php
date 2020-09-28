<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
class AdminController extends Controller
{
    function __construct()
    {

    }
    
    public function index()
    {
        return view('admin.dashboard');
    }
}
