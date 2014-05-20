<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 18:31
 */

class PostController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $posts = Post::with('tags')->orderBy('created_at', 'DESC')
            ->where('is_published', 1)
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

        return View::make('frontend.post.index', compact('posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id, $slug = null) {

        $post = Cache::remember('post_' . $id, 60, function () use ($id) {

            return Post::findOrFail($id);
        });

        $tags = Cache::remember('tags', 60, function () {

            return Tag::with('posts')->get();
        });

        $categories = Cache::remember('categories', 60, function () {

            return Category::with('posts')->get();
        });

        //var_dump(DB::getQueryLog());

        /*
        $article = Article::findOrFail($id);
        $tags = Tag::with('articles')->get();
        $categories = Category::with('articles')->get();
        */

        return View::make('frontend.post.show', compact('post', 'tags', 'categories'));
    }
}
