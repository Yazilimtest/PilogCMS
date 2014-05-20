<?php

class TagController extends BaseController {


    public function index($tag) {

        $tag = Tag::where('slug', '=', $tag)->first();
        $posts = $tag->posts()->paginate(10);
        $tags = Tag::with('posts')->get();

        return View::make('frontend.tag.index', compact('posts', 'tags'));
    }
}
