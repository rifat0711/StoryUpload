<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\StoryRequest;
 


class StoriesController extends Controller
{
    public function __construct(){
        $this->authorizeResource(Story::class, 'story');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stories = Story::where('user_id',auth()->user()->id)
        ->orderBy('id','DESC')
        ->simplePaginate(3);
            
        return view('stories.index', [
            'stories'=>$stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$this->authorize('create');
        $story = new Story();
    return view('stories.create', [
        'story' => $story
    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoryRequest $request)
    {
      

         auth()->user()->stories()->create($request->all());
         return redirect()->route('stories.index')->with('status','Story created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        //$story = Story::find($id);
        return view('stories.show ', [
            'story'=>$story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //
        $this->authorize('update', $story);
        //Gate::authorize('edit.story', $story);
        return view('stories.edit ', [
            'story'=>$story]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(StoryRequest $request, Story $story)
    {
        //
       
         $story->update($request->all());
         return redirect()->route('stories.index')->with('status','Story Uploaded Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        //
        $story->delete();
    return redirect()->route('stories.index')->with('status', 'Story deleted successfully');
    }
}
