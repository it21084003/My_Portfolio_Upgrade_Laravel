<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Middleware\AdminMiddleware;

class AdminDashboardController extends Controller
{
    // public function __construct(){
    //     $this->middleware(['auth','isAdmin']);
    // }
    public function index(){
        return view('admin_panel.dashboard');
    }
}
