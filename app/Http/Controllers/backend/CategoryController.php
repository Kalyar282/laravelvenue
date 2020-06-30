<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        // Validation
        $request->validate([
            'name' => 'required|min:5|max:191',
            'photo' => 'required|mimes:jpeg,bmp,png'
        ]);

        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $imageName);
        $filepath = 'images/'.$imageName;
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $filepath;

        $category->save();
        return redirect()->route('categories.index');
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
        $category = Category::find($id);
        return view('backend.categories.edit', compact('category'));
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
            'name' => 'required|min:5|max:191',
            'photo' => 'sometimes|mimes:jpeg,bmp,png'
        ]);
        if ($request->hasFile('photo')) {
           $imageName = time().'.'.$request->photo->extension();
           $request->photo->move(public_path('images'), $imageName);

           $filepath = 'images/'.$imageName;
           unlink($request->oldphoto);
       } else {
            $filepath = $request->oldphoto;
       }
       
       $category = Category::find($id);
       $category->name = $request->name;
       $category->photo =$filepath;

       $category->save();

        // Return
       return redirect()->route('categories.index');
   }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
     {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index');
    }
}
