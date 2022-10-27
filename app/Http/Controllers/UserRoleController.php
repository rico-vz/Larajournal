<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserRoleController extends Controller
{
    public function makeAdmin(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_admin = true;
        $user->save();
        return redirect()->route('dashboard');
    }

    public function makeWriter(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_writer = true;
        $user->save();
        return redirect()->route('dashboard');
    }

    public function removeAdmin(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_admin = false;
        $user->save();
        return redirect()->route('dashboard');
    }

    public function removeWriter(Request $request)
    {
        $user = User::find($request->user_id);
        $user->is_writer = false;
        $user->save();
        return redirect()->route('dashboard');
    }
}