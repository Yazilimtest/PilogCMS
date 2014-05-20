<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 18:34
 */  class Post extends Eloquent {

    public $table = 'posts';

    protected $fillable = array('title','body','slug','meta_description','meta_keywords','image','is_published');

    public static $rules = array(
        'title' => 'required|min:5',
        'body' => 'required|min:20',
        'image'=>'required|image|mimes:jpeg,jpg,bmp,png,gif'
    );


    public function tags() {

        return $this->belongsToMany('Tag','posts_tags');
    }

    public function category() {

        return $this->hasMany('Category');
    }
}