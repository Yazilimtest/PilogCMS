<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 13.05.2014
 * Time: 16:10

 **/  class About extends Eloquent {

    public $table = 'about';

    protected $fillable = array('title','body');

    public static $rules = array(
        'title' => 'required|min:5',
        'body' => 'required|min:20',
    );

}