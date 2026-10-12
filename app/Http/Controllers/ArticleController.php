<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|min:3|max:255',
            'short_description' => 'nullable|string|max:255',
            'content'           => 'required|string|min:10',
            'date'              => 'required|date',
            'preview_image'     => 'nullable|string|max:255',
            'full_image'        => 'nullable|string|max:255',
        ]);

        Article::create($validated);

        return redirect()->route('index')
            ->with('success', 'Статья успешно создана!');
    }

    public function show(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', ['article' => $article]);
    }

    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'              => 'required|string|min:3|max:255',
            'short_description' => 'nullable|string|max:255',
            'content'           => 'required|string|min:10',
            'date'              => 'required|date',
            'preview_image'     => 'nullable|string|max:255',
            'full_image'        => 'nullable|string|max:255',
        ]);

        $article = Article::findOrFail($id);
        $article->update($validated);

        return redirect()->route('articles.show', $article->id)
            ->with('success', 'Статья обновлена!');
    }

    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('index')
            ->with('success', 'Статья удалена!');
    }
}