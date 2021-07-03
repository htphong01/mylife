<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index() {
        return view('custom.comingSoon');
    }

    public function update($id) {
        
    }
}
