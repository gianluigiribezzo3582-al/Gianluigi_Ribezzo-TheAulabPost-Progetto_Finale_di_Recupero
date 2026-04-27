<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class RevisorController extends Controller
{
    public function dashboard()
    {
        $toReview = Article::whereNull('is_accepted')->with(['user', 'category'])->orderBy('created_at', 'desc')->get();
        $accepted = Article::where('is_accepted', true)->with(['user', 'category'])->orderBy('updated_at', 'desc')->get();
        $rejected = Article::where('is_accepted', false)->with(['user', 'category'])->orderBy('updated_at', 'desc')->get();

        return view('revisor.dashboard', compact('toReview', 'accepted', 'rejected'));
    }

    public function accept(Article $article)
    {
        $article->is_accepted = true;
        $article->revisor_id  = Auth::user()->id;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo accettato.');
    }

    public function reject(Article $article)
    {
        $article->is_accepted = false;
        $article->revisor_id  = Auth::user()->id;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo rifiutato.');
    }

    public function resetReview(Article $article)
    {
        $article->is_accepted = null;
        $article->revisor_id  = null;
        $article->save();
        return redirect(route('revisor.dashboard'))->with('message', 'Articolo rimandato in revisione.');
    }
}
