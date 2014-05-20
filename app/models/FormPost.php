<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 20:58
 */ class FormPost extends Eloquent {

    public $table = 'form_posts';
    public $fillable = ['sender_name_surname', 'sender_email', 'sender_phone_number', 'subject', 'post'];
}