<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hashtag;
use Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class HashtagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Session::get('Login')){
            $URL = $request->root();
            $search = $request->search;
            $ids = [];
            if($search){
                $hashtags = Hashtag::select('id', 'hashtag')->get();
                foreach($hashtags as $hashtag){
                    $array = explode(',', $hashtag->hashtag);
                    if(in_array($search, $array)) array_push($ids, $hashtag->id);
                }
            }
            
            $results = Hashtag::orderBy('id', 'DESC');
            if($search){
                $results = $results->whereIn('id', $ids)->orWhere('title','LIKE','%'.$search.'%')->orWhere('description','LIKE','%'.$search.'%');
            }
            $results = $results->paginate(5);
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
                                <div class="download-icon">
                                <a href="'.$URL.'/image-download/'.$result->photos.'")">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </div>
                            </div>';
                        }
                            $artilces.='<div class="hashtag-details-view">
                                <h5 class="hashtag-text">';
                                foreach(explode(',', $result->hashtag) as $hash) { 
                                    $artilces.='#'.$hash.' ';
                                }
                            $artilces.='</h5>
                            </div>
                        </div>';
                    }
                return $artilces;
            }
            return view('View.index', compact('results'));
        } else {
            return redirect()->route("login.view");
        }
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
        if(Session::get('Login')){ 
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

        return redirect()->route("login.view");
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

    public function downloadImage($image)
    {
        $imagePath = Storage::url('Hashtag/'.$image);
        return response()->download(public_path($imagePath));
    }

    public function hashtagList()
    {
        if(Session::get('Login')){

            $ids = [];
            $hashtags = Hashtag::select('id', 'hashtag')->get();
            foreach($hashtags as $hashtag){
                $array = explode(',', $hashtag->hashtag);
                array_push($ids, $array);
            }
                
            $results = [];
            foreach ($ids as $key => $value) { 
                if (is_array($value)) { 
                    $results = array_unique(array_merge($results, $value));
                } 
                else { 
                    $results[$key] = $value; 
                } 
            } 
                
            return view('Home.index', compact('results'));
        } else {
            return redirect()->route("login.view");
        }
    }

    public function form()
    {
        if(Session::get('Login')){
            return view('Form.index');
        }

        return view('login');
    }
    public function loginView()
    {
        if(Session::get('Login')){
            return redirect()->route("home.index");
        }

        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        
        $password = $request->password;
        $user = User::where('id', 1)->select('password')->first();
        
        if(Hash::check($request->password, $user->password)) {
            Session::put('Login', 'yes');
            return redirect()->route("home.index");
        }
        // redirect password not match
        return redirect()->back()->withErrors(['msg' => 'password not match']);
    }
}