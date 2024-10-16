<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::get();

        return view('admin.contacts.index', compact('contacts'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            return view('admin.contacts.show', compact('contact'));
        } else {
            session()->flash('error', __('messages.Contact_not_found'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if ($contact) {
            try {
                // DB::beginTransaction();
                $contact->delete();
                session()->flash('error', __('messages.contact_deleted_successfully'));
                return back();
                DB::commit();
            } catch (\Exception $e) {
                session()->flash('error', __('messages.not_deleted'));
                DB::rollBack();
                Log::channel('admin')->error("Error in ContactController@destroy: {$e->getMessage()} at Line: {$e->getLine()} in File: {$e->getFile()}");
                return back();
            }
        } else {
            session()->flash('error', __('messages.Contact_not_found'));
            return redirect()->back();
        }
    }
}
