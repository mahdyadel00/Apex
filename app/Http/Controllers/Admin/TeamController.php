<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Team\StoreTeamRequest;
use App\Http\Requests\Admin\Team\UpdateTeamReques;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::get();

        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeamRequest $request)
    {
        try {
            DB::beginTransaction();

            $team = Team::create($request->safe()->all());

            if (count($request->files) > 0) {
                saveMedia($request , $team);
            }

            DB::commit();
            return redirect()->route('admin.teams.index')->with('success', 'Team created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::channel('error')->error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            DB::beginTransaction();

            $team = Team::find($id);
            if(!$team){
                session()->flash('error', __('messages.team_not_found'));
                return redirect()->back()->with('error', 'Team not found');
            }

            DB::commit();
            return view('admin.teams.edit', compact('team'));
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeamReques $request, string $id)
    {
        try{
            DB::beginTransaction();

            $team = Team::find($id);
            if(!$team){
                session()->flash('error', __('messages.team_not_found'));
                return redirect()->back()->with('error', 'Team not found');
            }

            $team->update($request->safe()->all());

            if (count($request->files) > 0) {
                saveMedia($request , $team);
            }

            DB::commit();
            return redirect()->route('admin.teams.index')->with('success', 'Team updated successfully');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            DB::beginTransaction();

            $team = Team::find($id);
            if(!$team){
                session()->flash('error', __('messages.team_not_found'));
                return redirect()->back()->with('error', 'Team not found');
            }

            $team->delete();

            DB::commit();
            return redirect()->route('admin.teams.index')->with('success', 'Team deleted successfully');
        }catch(\Exception $e){
            DB::rollBack();
            Log::channel('error')->error($e->getMessage());
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
