<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 20:59
 */ class Setting extends Eloquent {

    public $table = 'settings';
    public $fillable = ['site_title', 'ga_code', 'meta_keywords', 'meta_description'];

    public static  function getMeta() {

        $meta = Cache::get('settings', function () {

            $meta = Setting::get()->first()->toArray();
            Cache::forever('settings', $meta);
            return $meta;
        });

        return $meta;
    }

}
