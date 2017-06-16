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
        $articles = Article::withTrashed()->paginate(5);
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
        
        if (isset($request->live)) {
            Article::create(array_merge($request->all(),['live' => true]));
            return redirect('/articles');
        }
        else if(! isset($request->live))
        {
            Article::create(array_merge($request->all(),['live' => false]));
            return redirect('/articles');
        }
        else
        {
            Article::create($request->all());
            return redirect('/articles');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findorFail($id);
        return view('articles.show',compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',compact('article'));
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
        $article = Article::findORFail($id);
        if (isset($request->live)) {
            $article->update(array_merge($request->all(),['live' => true]));
            return redirect('/articles');
        }
        else if(! isset($request->live))
        {
            $article->update(array_merge($request->all(),['live' => false]));
            return redirect('/articles');
        }
        else
        {
            $article->update($request->all());
            return redirect('/articles');
        }        
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    }    
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect('/articles');
    }

    
}
