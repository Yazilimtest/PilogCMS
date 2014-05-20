<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 15:59
 */ namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, Article, Ders, Response,  Str, Notification, Image;

class ArticleController extends BaseController {

    public function __construct() {

        View::share('active', 'Articles');
    }

    public function create() {
        //ders içeriği ekleme
        $dersler = Ders::lists('title', 'id');
        return View::make('backend.article.create', compact('dersler'));
    }

    public function store() {
        //ders içeriği saklama

        $input = Input::all();
        $validation = Validator::make($input, Article::$rules);

        if ($validation->fails()) {

            return Redirect::action('App\Controllers\Admin\ArticleController@create')->withErrors($validation)->withInput();
        }

        $article                   = new Article();
        $article->title            = Input::get('title');
        $article->body             = Input::get('body');
        $article->slug             = Input::get('slug');




        if ($article->save()) {

            $ders = Ders::find(Input::get('ders'));
            $ders->articles()->save($article);
        }



        Notification::success('Yazı başarıyla eklendi');

        return Redirect::action('App\Controllers\Admin\ArticleController@index');

    }

    public function show($id) {
        //ders içeriği admin show

        $article = Article::findOrFail($id);
        return View::make('backend.article.show', compact('article'));
    }

    public function edit($id) {
        //ders içeriğini güncellemek için tekar tutma

        $article = Article::findOrFail($id);




        $dersler = Ders::lists('title','id');

        return View::make('backend.article.edit', compact('article','dersler'));
    }

    public function update($id) {

        //ders içeriğini güncellemek


        $article                   = Article::findOrFail($id);
        $article->title            = Input::get('title');
        $article->body             = Input::get('body');
        $article->slug             = Input::get('slug');


        if ($article->save()) {

            $ders = Ders::find(Input::get('ders'));
            $ders->articles()->save($article);
        }




        Notification::success('Yazı başarıyla eklendi');

        return Redirect::action('App\Controllers\Admin\ArticleController@index');

    }

    public function index() {

         // ders içeriğinin admin'de listelenmesi

        $articles = Article::orderBy('created_at','DESC')->paginate(10);

        return View::make('backend.article.index', compact('articles'));
    }

    public function destroy($id) {

         //ders içeriğini silme
        $article = Article::findOrFail($id);
        $article->delete();

        Notification::success('Yazı başarıyla silindi');

        return Redirect::action('App\Controllers\Admin\ArticleController@index');
    }

    public function confirmDestroy($id) {
        // silme onayı
        $article = Article::findOrFail($id);
        return View::make('backend.article.confirm-destroy', compact('article'));
    }


}
