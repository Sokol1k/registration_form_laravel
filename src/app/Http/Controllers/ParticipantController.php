<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Http\Requests\Requests\RegistrationFormRequest;
use App\Http\Requests\AddingInformationFormRequest;
use Auth;
use Config;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $members = Participant::withTrashed()->orderBy('id', 'desc')->paginate(10);
        } else {
            $members = Participant::orderBy('id', 'desc')->paginate(10);
        }
        return view('pages.all_members', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $userCount = Participant::withTrashed()->count();
        } else {
            $userCount = Participant::count();
        }
        return view('pages.start', compact('userCount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Requests\RegistrationFormRequest; $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrationFormRequest $request)
    {
        $result = Participant::create($request->all());
        $userID = $result->id;
        if (Auth::check()) {
            $userCount = Participant::withTrashed()->count();
        } else {
            $userCount = Participant::count();
        }
        return response([
            'status' => $result ? 'ok' : 'error',
            'url' => route('participant.update', $userID),
            'userCount' => $userCount
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AddingInformationFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddingInformationFormRequest $request, $id)
    {
        $participant = Participant::findOrFail($id);
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store(Config::get('const.PATH_PHOTO'), 'public');
            $path = explode('/', $path);
        } else {
            $path = null;
        }
        $data = $request->all();
        $data['photo'] = $path[count($path) - 1];
        $participant->update($data);
        return response([
            'message' => 'Data has been updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::withTrashed()->find($id);
        if ($participant->trashed()) {
            $participant->restore();
        } else {
            $participant->delete();
        }
        return response([
            'message' => 'Data has been updated'
        ], 200);
    }
}
