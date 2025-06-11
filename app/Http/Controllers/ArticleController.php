<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('articles.index', [
            'articles' => Article::orderBy('published_at')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        Article::create($validatedData);

        return redirect()->route('articles.index')->with('success', 'Article created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string'
        ]);

        $article->update($validatedData);

        return redirect()->route('articles.index')->with('success', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Article deleted!');
    }
}
