<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreCategoryRequest;
use App\Http\Requests\Admin\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catagories = Category::all();
        $lang_id = Lang::getSelectedLangId();
        return view('admin.categories.index', compact('catagories', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        try {
            DB::beginTransaction();
            $category = category::create($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());


            $category->data()->create([
                'name'      => $request->name,
                'lang_id'   => Lang::getSelectedLangId(),
            ]);

            DB::commit();
            session()->flash('success', __('messages.category_created_successfully'));
            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in categoryController@store: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        try {
            DB::beginTransaction();
            $category = Category::find($id);
            $lang_id = Lang::getSelectedLangId();
            if (!$category) {
                session()->flash('error', __('messages.category_not_found'));
                return redirect()->route('admin.states.index');
            }
            DB::commit();
            return view('admin.categories.show', compact('category' , 'lang_id'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in CategoryController@show: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            DB::beginTransaction();
            $category   = Category::find($id);
            $languags   = Language::get();
            $lang_id    = Lang::getSelectedLangId();
            if (!$category) {
                session()->flash('error', __('messages.state_not_found'));
                return redirect()->route('admin.categories.index');
            }
            DB::commit();
            return view('admin.categories.edit', compact('category', 'languags' , 'lang_id'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in StateController@edit: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {

        try {
            DB::beginTransaction();
            $category   = Category::find($id);
            if (!$category) {
                session()->flash('error', __('messages.state_not_found'));
                return redirect()->route('admin.categories.index');
            }
            $category->update($request->safe()->only([
                'is_active',
            ]));

            $category->data()->updateOrCreate([
                'category_id'  => $category->id,
                'lang_id'   => $request->lang_id ??  Lang::getSelectedLangId(),
            ], [
                'name'      => $request->name,
            ]);

            DB::commit();
            session()->flash('success', __('messages.category_updated_successfully'));
            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in CategoryController@update: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $category = Category::find($id);
            if (!$category) {
                session()->flash('error', __('messages.category_not_found'));
                return redirect()->route('admin.categories.index');
            }
            $category->delete();
            $category->data()->delete();
            $category->posts()->delete();
            DB::commit();
            session()->flash('success', __('messages.state_deleted_successfully'));
            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('website')->error('error in CategoryController@destroy: ' . $e->getMessage() . ' at Line: ' . $e->getLine() . ' in File: ' . $e->getFile());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }
}
