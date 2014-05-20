<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 15:59
 */ namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Validator, Post, Category, Response, Tag, Str, Notification, Image;

class PostController extends BaseController {

    public function __construct() {

        View::share('active', 'Posts');
    }

    public function create() {

        $categories = Category::lists('title', 'id');
        return View::make('backend.post.create', compact('categories'));
    }

    public function store() {

        $input = Input::all();
        $validation = Validator::make($input, Post::$rules);

        if ($validation->fails()) {

            return Redirect::action('App\Controllers\Admin\PostController@create')->withErrors($validation)->withInput();
        }

        $post                   = new Post();
        $post->title            = Input::get('title');
        $post->body             = Input::get('body');
        $post->slug             = Input::get('slug');
        $post->meta_keywords    = Input::get('meta_keywords');
        $post->meta_description = Input::get('meta_description');



        $image = Input::file('image');

        $destinationPath =  '/img/';
        $fileName = $image->getClientOriginalName();
        $fileSize = $image->getClientSize();

        $upload_success = $image->move(public_path() . $destinationPath, $fileName);



        Image::make(public_path() .$destinationPath . $fileName)
            ->resize(468, 249);


        $post->image = $destinationPath  . $fileName;


        /*  $filename  = time() . '.' . $image->getClientOriginalExtension();
          $path = public_path() . '/img/themes' . $filename;

         // şaşkınım abi :D
          Image::make($image->getRealPath())->resize(468, 249)->save($path);
          $themes->image = 'img/themes/'.$filename;
          */

//burda $theme->image
        $post->is_published = (Input::get('is_published')) ? true : false;

        if ($post->save()) {

            $category = Category::find(Input::get('category'));
            $category->posts()->save($post);
        }
        $postTags = explode(',', Input::get('tag'));




        foreach ($postTags as $postTag) {

            if(!$postTag) continue;

            $tag = Tag::where('name', '=', $postTag)->first();

            if(!$tag) $tag = new Tag;

            $tag->name = $postTag;
            $tag->slug = Str::slug($postTag);
            $post->tags()->save($tag);
        }

        Notification::success('Yazı başarıyla eklendi');

        return Redirect::action('App\Controllers\Admin\PostController@index');

    }

    public function show($id) {

        $post = Post::findOrFail($id);
        return View::make('backend.post.show', compact('post'));
    }

    public function edit($id) {

        $post = Post::findOrFail($id);

        $tags = null;

        foreach ($post->tags as $tag) {
            $tag .= ',' . $tag->name;
        }
        $tags = substr($tags, 1);

        $categories = Category::lists('title','id');

        return View::make('backend.post.edit', compact('post', 'tags', 'categories'));
    }

    public function update($id) {



        $post                   = Post::findOrFail($id);
        $post->title            = Input::get('title');
        $post->body             = Input::get('body');
        $post->slug             = Input::get('slug');
        $post->meta_keywords    = Input::get('meta_keywords');
        $post->meta_description = Input::get('meta_description');





        /*  $filename  = time() . '.' . $image->getClientOriginalExtension();
          $path = public_path() . '/img/themes/' . $filename;

         //
          Image::make($image->getRealPath())->resize(468, 249)->save($path);
          $themes->image = 'img/themes/'.$filename;
          */

//burda $theme->image
        $post->is_published = (Input::get('is_published')) ? true : false;

        if ($post->save()) {

            $category = Category::find(Input::get('category'));
            $category->posts()->save($post);
        }
        $postTags = explode(',', Input::get('tag'));

        foreach ($postTags as $postTag) {

            if(!$postTag) continue;

            $tag = Tag::where('name', '=', $postTag)->first();

            if(!$tag) $tag = new Tag;

            $tag->name = $postTag;
            $tag->slug = Str::slug($postTag);
            $post->tags()->save($tag);
        }

        Notification::success('Yazı başarıyla eklendi');

        return Redirect::action('App\Controllers\Admin\PostController@index');

    }

    public function index() {


        $posts = Post::orderBy('created_at','DESC')->paginate(10);

        return View::make('backend.post.index', compact('posts'));
    }

    public function destroy($id) {

        $post = Post::findOrFail($id);
        $post->tags()->detach();
        $post->delete();

        Notification::success('Yazı başarıyla silindi');

        return Redirect::action('App\Controllers\Admin\PostController@index');
    }

    public function confirmDestroy($id) {

        $post = Post::findOrFail($id);
        return View::make('backend.post.confirm-destroy', compact('post'));
    }

    public function togglePublish($id) {

        $page = Post::findOrFail($id);

        $page->is_published = ($page->is_published) ? false : true;
        $page->save();

        return Response::json(array('result' => 'success', 'changed' => ($page->is_published) ? 1 : 0));
    }

}
