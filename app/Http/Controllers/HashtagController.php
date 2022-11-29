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
    public function index(Request $request)
    {
        $URL = $request->root();

        $search = $request->search;
        $results = Hashtag::orderBy('id')->orWhere('title','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%')->paginate(5);
        $artilces = '';
        if ($request->ajax()) {
                foreach ($results as $result) {
                    $artilces.='<div class="col-12 hastag-details-box">
                    <div class="details-date-view mb-3">
                        <h5>'.$result->created_at->format('d M Y').'</h5>
                    </div>';
    
                    if ($result->title) {
                        $artilces.='<div class="title-details-view mb-3">
                            <p class="details-pera">'.$result->title.'</p>
                        </div>';
                    }
                    if ($result->description) {
                        $artilces.='<div class="descrip-details-view mb-3">
                            <p class="details-pera">'.$result->description .'</p>
                        </div>';
                    }
                    if ($result->photos) {
                        $artilces.='<div class="photo-details-view">
                            <img src="'.$URL.'/storage/Hashtag/'.$result->photos.'" alt="">
                        </div>';
                    }
                        $artilces.='<div class="hashtag-details-view">
                            <h5 class="hashtag-text">'.$result->hashtag.'</h5>
                        </div>
                    </div>';
                }
            return $artilces;
        }
        return view('View.index', compact('results'));
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
        $amenity->photos = $filename;
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
