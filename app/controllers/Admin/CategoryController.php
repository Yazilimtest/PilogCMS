<?php
/**
 * Created by PhpStorm.
 * User: macit
 * Date: 11.05.2014
 * Time: 15:59
 */

namespace App\Controllers\Admin;

use BaseController, Redirect, View, Input, Category, Response, Notification;

class CategoryController extends BaseController {

    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
        View::share('active', 'blog');
    }

    public function index() {

        //kategorileri admin panelinde göster max15
        $categories = $this->category->paginate(15);

        return View::make('backend.category.index', compact('categories'));
    }
    public function create() {
        //kategori  ekleme

        return View::make('backend.category.create')
            ->with('active', 'category');
    }
    public function store() {
        //kategori  saklama

        $input = Input::all();

        if(!$this->category->fill($input)->isValid()) {
            return Redirect::back()->withInput()->withErrors($this->category->errors);

        }
        $this->category->save();

        Notification::success('Category was successfully added');

        return Redirect::route('admin.category.index');
    }

    public function show($id) {
        //admin kategori  show

        $category = $this->category->findOrFail($id);
        return View::make('backend.category.show', compact('category'));
    }
    public function edit($id) {
        //kategori güncellemek için tekar tutma

        $category = Category::findOrFail($id);
        return View::make('backend.category.edit', compact('category'));
    }
    public function update($id) {
        //kategori içeriğini güncelle

        $this->category = Category::find($id);

        $input = Input::all();

        if(!$this->category->fill($input)->isValid()) {

            return Redirect::back()
                ->withInput()
                ->withErrors($this->category->errors);
        }

        $this->category->save();

        Notification::success('Category was successfully updated');

        return Redirect::route('admin.category.index');

    }

    public function destroy($id) {
        //kategori sil

        $category = Category::findOrFail($id);
        $category->posts()->delete($id);
        $category->delete();

        Notification::success('Category was successfully added');

        return Redirect::route('admin.category.index');
    }

    public function confirmDestroy($id) {
        //kategori onayı sil

        $category = Category::findOrFail($id);
        return View::make('backend.category.confirm-destroy', compact('category'));
    }

}
