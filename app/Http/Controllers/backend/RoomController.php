<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
use App\Category; 
use App\SubCategory;
use App\Location; 


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rooms = Room::all();
      $subcategories = SubCategory::all();
      $locations = Location::all();
      return view('backend.rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $rooms = Room::all(); 
        $subcategories = SubCategory::all();
        $locations = Location::all();
        return view('backend.rooms.create',compact('rooms','subcategories','locations'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //validation
        $request->validate([
            'name' => 'required|min:5|max:191',
            'photo'=> 'required|mimes:jpeg,bmp,png']);

        //File Upload
        $imageName = time().'.'.$request->photo->extension(); 
        $request->photo->move(public_path('images'), $imageName);
        $filepath = "images/".$imageName; 

        //data insert
        $rooms = new Room; 
       
        $rooms->name = $request->name;
        $rooms->price = $request->price;
        $rooms->discount = $request->discount;
        $rooms->description = $request->description;
        $rooms->deposit = $request->deposit;

        $rooms->subcategory_id = $request->subcategory;
        $rooms->location_id = $request->location;

        $rooms->photo=$filepath; 

        $rooms->save(); 

        //return
        return redirect()->route('rooms.index');
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
        $room = Room::find($id); 
        $locations = Location::all(); 
        $subcategories = Subcategory::all(); 
       
 return view('backend.rooms.edit',compact('room','subcategories','locations'));
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
        // Validation
        $request->validate([
            'name' => 'required|min:5|max:191',
            'subcategory' => 'required',
            'location' => 'required',
            'photo' => 'required|mimes:jpeg,bmp,png'

        ]);

        if ($request->hasFile('photo')) {
           $imageName = time().'.'.$request->photo->extension();
           $request->photo->move(public_path('images'), $imageName);

           $filepath = 'images/'.$imageName;
           unlink($request->oldphoto);
       } else {
            $filepath = $request->oldphoto;
       }
       
    
     

        $room = Room::find($id);
        $room->name = $request->name;
        $room->deposit = $request->deposit;
        $room->discount = $request->discount;
        $room->price = $request->price;
        $room->photo =$filepath;

     
        $room->subcategory_id = $request->subcategory;
        $room->location_id = $request->location;

       $room->save();

        // Return
       return redirect()->route('rooms.index');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
   {
        $rooms = Room::find($id); 
        $rooms->delete(); 
        return redirect()->route('rooms.index');
    }
}
