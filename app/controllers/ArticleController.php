<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 13.05.2014
 * Time: 21:38
 */    /**
 * Display a listing of the resource.
 *
 * @return Response
 *
 */
class ArticleController extends BaseController {

public function index() {

    $articles = Article::orderBy('created_at', 'ASC')
        ->paginate(4);


    /*
    $articles = Cache::remember('articles', 60, function () {

        return Article::with('tags')->orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->paginate(10)->getItems();
    });
    */

    /*
    $articles = Cache::get('articles', function () {

        $collections = Article::with('tags')->orderBy('created_at', 'DESC')
            ->where('is_published', 1)
            ->paginate(10)->getItems();
        Cache::forever('articles', $collections, 60);
        return $collections;
    });
    */

    return View::make('frontend.article.index', compact('articles'));
}

/**
 * @param $id
 * @return \Illuminate\View\View
 */
public function show($id) {

    $article = Cache::remember('article_' . $id, 60, function () use ($id) {

        return Article::findOrFail($id);
    });



    $dersler = Cache::remember('dersler', 60, function () {

        return Ders::with('articles')->get();
    });

    //var_dump(DB::getQueryLog());

    /*
    $article = Article::findOrFail($id);
    $tags = Tag::with('articles')->get();
    $categories = Category::with('articles')->get();
    */

    return View::make('frontend.article.show', compact('article','dersler'));
}
}
