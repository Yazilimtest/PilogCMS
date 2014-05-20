<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 18:31
 */

class AboutController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $about = About::findOrfail(1);

        return View::make('frontend.about.index', compact('about'));
    }

}
