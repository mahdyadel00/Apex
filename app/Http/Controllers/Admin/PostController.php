<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StorePostRequest;
use App\Http\Requests\Admin\Post\UpdatePostRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $lang_id = Lang::getSelectedLangId();
        return view('admin.posts.index', compact('posts', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $lang_id = Lang::getSelectedLangId();
        return view('admin.posts.create', compact('categories', 'lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        try {
            DB::beginTransaction();

            $post = Post::create($request->safe()->merge([
                'user_id' => auth()->user()->id,
            ])->all());

            if (count($request->files) > 0) {
                saveMedia($request, $post);
            } else{
                $post->thumb            = $post->getRawOriginal('thumb');
                $post->full_img         = $post->getRawOriginal('full_img');
            }

            DB::commit();
            session()->flash('success', __('messages.created_successfully'));
            return redirect()->route('admin.posts.index');
        } catch (\Exception $e) {
            DB::rollback();
            Log::channel('custom')->error('file: ' . $e->getFile() . ' line: ' . $e->getLine() . ' message: ' . $e->getMessage());
            session()->flash('error', __('messages.created_failed'));
            return redirect()->back()->with('error', __('messages.created_failed'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post       = Post::find($post->id);
        $lang_id    = Lang::getSelectedLangId();
        return view('admin.posts.show', compact('post', 'lang_id'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post           = Post::find($post->id);
        $categories     = Category::all();
        $lang_id        = Lang::getSelectedLangId();
        return view('admin.posts.edit', compact('post', 'categories', 'lang_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request,$id)
    {
        try{
            DB::beginTransaction();

            $post = Post::find($id);

            if(!$post){
                session()->flash('error', __('messages.not_found'));
                return redirect()->back()->with('error', __('messages.not_found'));
            }

            $post->update($request->safe()->merge([
                'user_id' => auth()->user()->id,
            ])->all());

            if (count($request->files) > 0) {
                saveMedia($request, $post);
            }else{
                    $post->passport_image   = $post->getRawOriginal('thumb');
                    $post->id_image         = $post->getRawOriginal('full_img');
            }

            DB::commit();
            session()->flash('success', __('messages.updated_successfully'));
            return redirect()->route('admin.posts.index');
        }catch(\Exception $e){
            DB::rollback();
            Log::channel('custom')->error('file: ' . $e->getFile() . ' line: ' . $e->getLine() . ' message: ' . $e->getMessage());
            session()->flash('error', __('messages.updated_failed'));
            return redirect()->back()->with('error', __('messages.updated_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
       try{
           DB::beginTransaction();

              $post = Post::find($post->id);

                if(!$post){
                    session()->flash('error', __('messages.not_found'));
                    return redirect()->back()->with('error', __('messages.not_found'));
                }

                $post->delete();
                $post->media()->delete();
                $post->comments()->delete();

                DB::commit();
                session()->flash('success', __('messages.deleted_successfully'));
                return redirect()->route('admin.posts.index');
       }catch (\Exception $e){
           DB::rollback();
           Log::channel('custom')->error('file: ' . $e->getFile() . ' line: ' . $e->getLine() . ' message: ' . $e->getMessage());
           session()->flash('error', __('messages.deleted_failed'));
           return redirect()->back()->with('error', __('messages.deleted_failed'));
       }
    }
}
