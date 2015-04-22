<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 13.05.2014
 * Time: 21:38
 * 
    */


class DersController extends BaseController {

    public function index($ders) {

    $ders = Ders::where('title', '=', $ders)->first();
    $articles = $ders->articles()->paginate(10);
    $dersler = Ders::with('articles')->get();

    return View::make('frontend.article.index', compact('articles','dersler'));
}

}
