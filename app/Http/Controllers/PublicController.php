<?php

namespace App\Http\Controllers;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function homepage()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
        return view('homepage', compact('articles'));
    }

    public function careers()
    {
        return view('careers');
    }

    public function careersSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $role = 'writer';
        $email = $request->email;
        $message = $request->message;

        try {
            Mail::to('admin@theaulabpost.it')->send(new CareerRequestMail(compact('user', 'role', 'email', 'message')));
            return redirect(route('homepage'))->with('message', 'Candidatura inviata con successo!');
        } catch (\Exception $e) {
            return redirect(route('homepage'))->with('error', 'Si è verificato un errore. Per favore, riprova più tardi.');
        }
    }
}
