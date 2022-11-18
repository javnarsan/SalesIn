<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articles;
use App\Cicles;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Articles::latest()->paginate(10);
        return view('articlesViews/articlesIndex', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articlesViews/createArticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Articles;
        $article->title = $request->get('title');
        $article->image = $request->get('image');
        $article->description = $request->get('description');
        $article->cicle_id = $request->get('cicle_id');
        $article->save();
        
        return redirect('articlesViews/articlesIndex')->with('success', 'Article created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cicles=cicles::all();
        $article = Articles::find($id);
        
        return view('articlesViews/editArticle', compact(['article','cicles']));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'description'=>'required',
            'cicle_id'=>'required'
        ]); 
        $article = Articles::find($id);
        // Getting values from the blade template form
        $article->title = $request->get('title');
        $article->image = $request->get('image');
        $article->description = $request->get('description');
        $article->cicle_id = $request->get('cicle_id');
        $article->update();

        return redirect('articlesViews')->with('success', 'Article updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
