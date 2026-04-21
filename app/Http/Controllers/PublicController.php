<?php

namespace App\Http\Controllers;
use App\Mail\WorkWithUsMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PublicController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['homepage', 'careers']),
        ];
    }

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
            'role' => 'required|in:admin,revisor,writer',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $user = Auth::user();
        $email = $request->email;
        $message = $request->message;
        $role = $request->role;

        // Gestione ruoli piattaforma (permette l'approvazione dell'admin)
        switch ($request->role) {
            case 'admin':
                $role = 'Amministratore';
                $user->is_admin = null;
                break;
            case 'revisor':
                $role = 'Revisore';
                $user->is_revisor = null;
                break;
            case 'writer':
                $role = 'Redattore';
                $user->is_writer = null;
                $user->is_author = null;
                break;
        }

        if(in_array($request->role, ['admin', 'revisor', 'writer'])){
            $user->update();
        }

        try {
            Mail::to('admin@theaulabpost.it')->send(new WorkWithUsMail(compact('user', 'role', 'email', 'message')));
            return redirect(route('homepage'))->with('message', 'Candidatura inviata con successo!');
        } catch (\Exception $e) {
            return redirect(route('homepage'))->with('error', 'Si è verificato un errore. Per favore, riprova più tardi.');
        }
    }
}
