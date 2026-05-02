<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class WriterController extends Controller
{
    public function dashboard()
    {
        $toReview = Auth::user()->articles()->whereNull('is_accepted')->orderBy('created_at', 'desc')->get();
        $accepted = Auth::user()->articles()->where('is_accepted', true)->orderBy('updated_at', 'desc')->get();
        $rejected = Auth::user()->articles()->where('is_accepted', false)->orderBy('updated_at', 'desc')->get();

        return view('writer.dashboard', compact('toReview', 'accepted', 'rejected'));
    }
}
