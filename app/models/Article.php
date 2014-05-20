<?php
/**
* Created by PhpStorm.
* User: macit
* Date: 11.05.2014
* Time: 18:34
*/  class Article extends Eloquent {

public $table = 'articles';

protected $fillable = array('title','body','slug');

public static $rules = array(
'title' => 'required|min:5',
'body' => 'required|min:20',
);




public function ders() {

return $this->hasMany('Ders');
}
}