<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // use customer as default and fallback
        $type = $request->get('type') ?? 'customer';
        // filter user with role name
        $data = User::where('account_role', $type)->paginate();
        return view('users.index', compact('data', 'type'));
    }
}
