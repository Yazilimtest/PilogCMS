<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 16:00
 */

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, About;

class AboutController extends BaseController {

    public function index() {
        //hakkımda bilgileri oluşturma
        $about = About::findOrFail(1);
        return View::make('backend.about.about', compact('about'))->with('active', 'about');
    }

    public function save() {
        //hakkımda bilgileri kaydetme

        $about = About::findOrFail(1);
        $about->fill(Input::all())->save();
        return Redirect::route('admin.about')->with('message', 'About was successfully updated');
    }
}
