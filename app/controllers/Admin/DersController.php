<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 15:59
 */

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Ders, Response, Notification;

class DersController extends BaseController {

    protected $ders;

    public function __construct(Ders $ders) {

        $this->ders = $ders;
        View::share('active', 'Ders');
    }

    public function index() {
        //Ders admin panelinde göster max15

        $dersler = $this->ders->paginate(15);

        return View::make('backend.ders.index', compact('dersler'));
    }
    public function create() {
        //Ders oluştur

        return View::make('backend.ders.create')
            ->with('active', 'ders');
    }
    public function store() {
        //Ders saklama

        $input = Input::all();

        if(!$this->ders->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->ders->errors);

        }

        $this->ders->save();

        Notification::success('Category was successfully added');

        return Redirect::route('admin.ders.index');
    }

    public function show($id) {
        //Admin panelinde dersleri sırala

        $ders = $this->ders->findOrFail($id);
        return View::make('backend.ders.show', compact('ders'));
    }
    public function edit($id) {
        //dersleri güncellemek için tekar tutma

        $ders = Ders::findOrFail($id);
        return View::make('backend.ders.edit', compact('ders'));
    }
    public function update($id) {
        //dersleri güncelleme

        $this->ders = Ders::find($id);

        $input = Input::all();

        if(!$this->ders->fill($input)->isValid()) {

            return Redirect::back()
                ->withInput()
                ->withErrors($this->ders->errors);
        }

        $this->ders->save();

        Notification::success('Category was successfully updated');

        return Redirect::route('admin.ders.index');

    }

    public function destroy($id) {
            //ders silme
        $ders = Ders::findOrFail($id);
        $ders->articles()->delete($id);
        $ders->delete();

        Notification::success('Category was successfully added');

        return Redirect::route('admin.ders.index');
    }

    public function confirmDestroy($id) {
        //ders silme onayı

        $ders = Ders::findOrFail($id);
        return View::make('backend.ders.confirm-destroy', compact('ders'));
    }

}
