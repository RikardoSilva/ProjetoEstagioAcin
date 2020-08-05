<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Club;
use App\Category;

class ClubsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubs = Club::orderBy('club_name', 'asc')->paginate(5);
        return view('clubs.index')->with('clubs', $clubs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        return view('clubs.create', ['cat' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'club_name' => 'required',
            'body' => 'required',
            'logo' => 'image|nullable|max:1999'
        ]);

        //Handle Logo Upload
        if($request->hasFile('logo')){
            //Get filename with extension
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension =$request->file('logo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Logo
            $path = $request->file('logo')->storeAs('public/logo', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        //Add Club
        $club = new Club;
        $club->club_name = $request->input('club_name');
        $club->body = $request->input('body');
        $club->category_id = $request->input('category_id');
        $club->user_id = auth()->user()->id;
        $club->logo = $fileNameToStore;
        $club->save();

        return redirect('/clubs')->with('success', 'Club added with success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $club = Club::find($id);
        return view('clubs.show')->with('club', $club);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = Club::find($id);
        $cat = Category::all();

        //Check if the user is the one who added the club
        if(auth()->user()->id !==$club->user_id){
            return redirect('/clubs')->with('error', "No no no no, no editing today! You can't edit this post!");
        }

        // return view('clubs.edit')->with('club', $club);
        return view('clubs.edit', ['club' => $club, 'cat' => $cat]);
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
        $this->validate($request, [
            'club_name' => 'required',
            'body' => 'required',
            'logo' => 'image|nullable|max:1999'
        ]);

        //Handle Logo Upload
        if($request->hasFile('logo')){
            //Get filename with extension
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();
            //Get just filename
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension =$request->file('logo')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //Upload Logo
            $path = $request->file('logo')->storeAs('public/logo', $fileNameToStore);
        }

        //Add Club
        $club = Club::find($id);
        $club->club_name = $request->input('club_name');
        $club->body = $request->input('body');
        $club->category_id = $request->input('category_id');
        if($request->hasFile('logo')){
            $club->logo = $fileNameToStore;
        }
        $club->save();

        return redirect('/clubs')->with('success', 'Club edited with success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $club = Club::find($id);

        //Check if the user is the one who added the club
        if(auth()->user()->id !==$club->user_id){
            return redirect('/clubs')->with('error', "No no no no, no removing today! You can't remove this club!");
        }

        if ($club->logo != 'noimage.jpg') {
            //Delete Image
            Storage::delete('public/logo/'.$club->logo);
        }

        $club->delete();
        return redirect('/clubs')->with('success', 'Club removed!');
    }

    public function search()
    {
        $search = $_GET['search'];
        $clubs = Club::where('club_name', 'LIKE', '%'.$search.'%')->get();

        return view('clubs.search', compact('clubs'));
    }
}
