<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 20:57
 */ class Category extends Eloquent {

    public $table = 'categories';
    public $timestamps = false;
    protected $fillable = ['title'];
    public static $rules = ['title' => 'required|min:3|unique:categories'];
    public $errors;

    public function posts() {

        return $this->hasMany('Post');
    }

    public function isValid() {

        $validation = Validator::make($this->attributes, static::$rules);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }
}