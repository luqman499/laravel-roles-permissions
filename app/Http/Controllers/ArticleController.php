<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::latest()->get();
        return view('articles.list', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3',
            'author' => 'required|min:3',
        ]);


        if ($validator->passes()) {
            $article = new Article();
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->save();
            return redirect()->route('articles.index')->with('success','Article created successfully');
        }else{
            return redirect()->route('articles.create')->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article =Article::find($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|unique:articles,title,' . $article->id,
            'author' => 'required|min:3',
        ]);

        if ($validator->passes()) {
//            $article = new Article();
            $article->title = $request->title;
            $article->text = $request->text;
            $article->author = $request->author;
            $article->save();
            return redirect()->route('articles.index')->with('success','Article Updated successfully');
        }else{
            return redirect()->route('articles.edit',$id)->withErrors($validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('articles.index')->with('success','Article Deleted successfully');

    }
}
