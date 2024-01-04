<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::lastest()->get();
        return ArticleResource::collection($articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required',
            // 'images' => 'nullable|image|mimes:jpeg,jpg,png,bmp,gif,svg|max:2048'
            'images' => 'required|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        $article = Article::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        if ($images = $request->images) {
            foreach ($images as $image) {
                $article->addMedia($image)->toMediaCollection('images');
            }
        }

        return [
            'message' => 'Article created successfully',
            'data' => new ArticleResource($article),
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);

        return new ArticleResource($article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'images' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $article = Article::find($id);
        $article->title = $request->title;
        $article->content = $request->content;
        $article->save();

        if ($images = $request->images) {
            $article->clearMediaCollection('images');

            foreach ($images as $image) {
                $article->addMedia($image)->toMediaCollection('images');
            }
        }

        return [
            'message' => 'Article updated successfully',
            'data' => new ArticleResource($article)
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();

        return response(null, 204);
    }
}
