<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth; 

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin')->except('logout');
    }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
      Auth::guard('admin')->logout();
      return redirect('/admin/login');
    }
}
