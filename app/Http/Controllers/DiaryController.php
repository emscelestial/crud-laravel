<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diary = Diary::latest()->paginate('5');

        return view('diary.index', compact('diary'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diaries.create');
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
            'Title' => 'required' ,
            'Body' => 'required'

        ]);

        // create a new product in the database

        Diary::create($request->all());

        //redirect the user and send friendly message

        return redirect()->route('diaries.index')->with('success','Diary created successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function show(diary $diary)
    {
        return view('diary.show', compact('diary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(diary $diary)
    {
        return view('diary.edit' , compact ('diary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diary $diary)
    {

        //validate the input
        $request->validate([
            'title'=>'required',
            'Body'=> 'required'

        ]);

        //create a new diary in database
        $diary->update($request->all());

        // redirect the user and send friendly message
        return redirect()->route('diary.index')->with('success','Diary updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(diary $diary)
    {
        //delete the diary
        $diary->delete();

        //redirect the user and display success message
        return redirect()->route('diary.index')->with('success','Diary deleted successfully');

    }
}