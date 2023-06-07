<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;



class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.typess.index', compact('types'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *  @param  \App\Models\Type  $type  
     * @return \Illuminate\Http\Response
     */
    //     public function show($id)
    // {
    //     $type = Type::findOrFail($id);
    //     return view('admin.typess.show', compact('type'));
    // }


    public function show($slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        return view('admin.typess.show', compact('type'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }
    public function edit($slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        return view('admin.typess.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request, $slug)
    {
        $type = Type::where('slug', $slug)->firstOrFail();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

        $type->name = $validatedData['name'];
        $type->save();
        return redirect()->route('admin.typess.index', $type->slug)->with('success', 'Type updated successfully');
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
