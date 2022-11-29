<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hashtag;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $filename = null;
        
        if($request->hasfile('photo')) {
            $file = $request->file('photo');
            $filename = 'img_'.rand(100000,999999).".".$file->GetClientOriginalExtension();

            // File extension
            $extension = $file->getClientOriginalExtension();

            // File upload location
            $location = 'storage/Hashtag';

            // Upload file
            $file->move($location,$filename);
            
            // File path
            $filepath = url('storage/Hashtag/'.$filename);
        }


        $amenity = new Hashtag();
        $amenity->title = $request->title;
        $amenity->hashtag = $request->tag;
        $amenity->description = $request->description;
        $amenity->Photos = $filename;
        $amenity->save();

        return response()->json(["success" => "Hashtag Inserted Successfully"], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
