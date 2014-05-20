<?php
class CategoryController extends BaseController {

/**
 * Created by PhpStorm.
 * User: macit
 * Date: 12.05.2014
 * Time: 16:56
 *
 */   public function index($category) {

    $category = Category::where('title', '=', $category)->first();
    $posts = $category->posts()->paginate(10);
    $tags = Tag::with('posts')->get();
    $categories = Category::with('posts')->get();

    return View::make('frontend.post.index', compact('posts', 'tags', 'categories'));
}
}
