<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 20:57
 */ class Ders extends Eloquent {

    public $table = 'dersler';
    public $timestamps = false;
    protected $fillable = ['title'];
    public static $rules = ['title' => 'required|min:3|unique:dersler'];
    public $errors;

    public function articles() {

        return $this->hasMany('Article');
    }

    public function isValid() {

        $validation = Validator::make($this->attributes, static::$rules);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }
}