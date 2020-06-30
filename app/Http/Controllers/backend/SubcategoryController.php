<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $subcategory = SubCategory::all();
      return view('backend.subcategories.index',compact('subcategory'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
     {   
        $subcategories = SubCategory::all();
        $category = Category::all();
         return view('backend.subcategories.create',compact('category'));
         
        
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
            'category_id'=>'required']);

        $subcategory = new SubCategory; 
        $subcategory->name = $request->name;  
         $subcategory->category_id = $request->category_id;
        $subcategory->save(); 


        //return
        return redirect()->route('subcategories.index');
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
        $subcategories = Subcategory::find($id); 
        $category = Category::all(); 
       
 return view('backend.subcategories.edit',compact('subcategories','category'));
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
            'category_id' => 'required'
        ]);

        // dd($request);

        $subcategory = Subcategory::find($id);
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category_id;

       $subcategory->save();

        // Return
       return redirect()->route('subcategories.index');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategories = SubCategory::find($id); 
        $subcategories->delete(); 
        return redirect()->route('subcategories.index');
    }
}
