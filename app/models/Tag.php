<?php

 class Tag extends Eloquent {

    public $table = 'tags';

    public function posts() {

        return $this->belongsToMany('Post', 'posts_tags');
    }
}
