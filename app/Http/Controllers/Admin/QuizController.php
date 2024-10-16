<?php

namespace App\Http\Controllers\Admin;

use App\Bll\Lang;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Quiz\StoreRequestQuiz;
use App\Http\Requests\Admin\Quiz\UpdateRequestQuiz;
use App\Models\Language;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::get();
        $lang_id = Lang::getSelectedLangId();

        return view('admin.quizzes.index', compact('quizzes', 'lang_id'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lang_id = Lang::getSelectedLangId();
        return view('admin.quizzes.create', compact('lang_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestQuiz $request)
    {
        try{
            DB::beginTransaction();

            $quiz = Quiz::create($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());

            $quiz->data()->create([
                'name'          => $request->name,
                'description'   => $request->description,
                'lang_id'   => Lang::getSelectedLangId(),
            ]);

            DB::commit();
            session()->flash('success', __('messages.quiz_created_successfully'));
            return redirect()->route('admin.quizzes.index');
        }catch(\Exception $ex){
            DB::rollback();
            Log::channel('custom')->error('Error QuizController@store: ' . $ex->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            DB::beginTransaction();

            $quiz = Quiz::find($id);

            if(!$quiz){
                session()->flash('error', __('messages.quiz_not_found'));
                return redirect()->back();
            }
            $lang_id = Lang::getSelectedLangId();
            DB::commit();
            return view('admin.quizzes.show', compact('quiz', 'lang_id'));
        }catch(\Exception $ex){
            DB::rollback();
            Log::channel('custom')->error('Error QuizController@show: ' . $ex->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            DB::beginTransaction();

            $quiz = Quiz::find($id);

            if(!$quiz){
                session()->flash('error', __('messages.quiz_not_found'));
                return redirect()->back();
            }

            $lang_id    = Lang::getSelectedLangId();
            $languags  = Language::get();

            DB::commit();
            return view('admin.quizzes.edit', compact('quiz', 'lang_id', 'languags'));
        }catch(\Exception $ex){
            DB::rollback();
            Log::channel('custom')->error('Error QuizController@edit: ' . $ex->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestQuiz $request, string $id)
    {
        try{
            DB::beginTransaction();

            $quiz = Quiz::find($id);

            if(!$quiz){
                session()->flash('error', __('messages.quiz_not_found'));
                return redirect()->back();
            }

            $quiz->update($request->safe()->merge([
                'is_active' => $request->is_active ?? '0',
            ])->all());

            $quiz->data()->updateOrCreate([
                'quiz_id'       => $quiz->id,
                'lang_id'       => $request->lang_id ??  Lang::getSelectedLangId(),
            ], [
                'name'          => $request->name,
                'description'   => $request->description,
            ]);

            DB::commit();
            session()->flash('success', __('messages.quiz_updated_successfully'));
            return redirect()->route('admin.quizzes.index');
        }catch(\Exception $ex){
            DB::rollback();
            Log::channel('custom')->error('Error QuizController@update: ' . $ex->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();

            $quiz = Quiz::find($id);

            if(!$quiz){
                session()->flash('error', __('messages.quiz_not_found'));
                return redirect()->back();
            }

            $quiz->delete();

            DB::commit();
            session()->flash('success', __('messages.quiz_deleted_successfully'));
            return redirect()->route('admin.quizzes.index');
        }catch(\Exception $ex){
            DB::rollback();
            Log::channel('custom')->error('Error QuizController@destroy: ' . $ex->getMessage());
            session()->flash('error', __('messages.error'));
            return redirect()->back();
        }
    }
}
