<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Models\Nomenclator;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('notes.index', ['user' => User::getCurrentUser()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create', ['categories' => Nomenclator::getCategories()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'min:1|string|max:50|required|unique:notes,title',
            'category_id' => 'required|',
            'content' => 'required|min:1|max:500|string'
            ]
        );
        $note = new Note();
        $user = User::getCurrentUser();
        $note->user_id = $user->id;
        $note->title = $request->input('title');
        $note->category_id = $request->input('category_id');
        $note->content = $request->input('content');
        $note->save();
        return to_route('note-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.show', ['note' => $note, 'categories' => Nomenclator::getCategories()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:1|string|max:50|required',
            'category_id' => 'required|',
            'content' => 'required|min:1|max:500|string'
            ]
        );

        $note = Note::findOrFail($id);
        $user = User::getCurrentUser();
        $note->user_id = $user->id;
        $note->title = $request->input('title');
        $note->category_id = $request->input('category_id');
        $note->content = $request->input('content');
        $note->save();
        return to_route('note-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
