<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Str;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['index', 'show', 'byCategory', 'byUser']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|unique:articles',
            'subtitle' => 'required|min:5',
            'body' => 'required|min:10',
            'image' => 'image',
            'category' => 'required',
        ]);

        $article = Article::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'subtitle' => $request->subtitle,
            'body' => $request->body,
            'category_id' => $request->category,
            'user_id' => Auth::user()->id,
            'is_accepted' => false, //di default non accettato
        ]);

        if ($request->hasFile('image')) {
            $article->update([
                'image' => $request->file('image')->store('public/articles'),
            ]);
        }

        return redirect(route('homepage'))->with('message', 'Articolo inviato per la revisione');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if (!$article->is_accepted && !(Auth::check() && (Auth::user()->is_admin || Auth::user()->is_revisor))) {
            abort(404);
        }
        return view('article.show', compact('article'));
    }


    public function byCategory(Category $category)
    {
        $articles = $category->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-category', compact('articles', 'category'));
    }


    public function byUser(User $user)
    {
        $articles = $user->articles()->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
        return view('article.by-user', compact('articles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
