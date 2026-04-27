<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $adminRequests   = User::where('role', 'requested_admin')->get();
        $revisorRequests = User::where('role', 'requested_revisor')->get();
        $writerRequests  = User::where('role', 'requested_writer')->get();

        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function approveAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', 'Utente promosso ad Amministratore.');
    }

    public function approveRevisor(User $user)
    {
        $user->role = 'revisor';
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', 'Utente promosso a Revisore.');
    }

    public function approveWriter(User $user)
    {
        $user->role = 'writer';
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', 'Utente promosso a Redattore.');
    }
}
