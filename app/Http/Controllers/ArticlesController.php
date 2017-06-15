<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
// for the query builder method
use DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Eloquent method to call the values
        $articles = Article::paginate(5);
        return view('articles.index',compact('articles'));
        // query builder method 
       /* $articles = DB::table('articles')->get();
        return $articles;*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$article = new Article;
        $article->user_id = Auth::user()->id ;
        $article->live = (boolean)$request->live ;
        $article->post_on = $request->post_on;
        $article->content = $request->content;
        $article->save();
        return $request->all();*/
        Article::create($request->all());

        /*Now if the input does not match the table filed then do this store manually
        Article::created([
            'user_id'   =>  Auth::user()->id,
            'content'   =>  $request->content,
            'live'      =>  $request->live,
            'post_on'      =>  $request->post_on
            ]);*/
        
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
        //
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
        //
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
