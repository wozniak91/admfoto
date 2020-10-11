<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Gallery;
use App\ImagesGroup;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::get();

        return view('admin.gallery.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $groups = ImagesGroup::get();

        return view('admin.gallery.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Gallery $gallery)
    {
        
        $this->validate($request, [
            'groups' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
            'title' => 'min:0|max:50|string|nullable',
            'description' => 'min:0|max:255|string|nullable',
        ]);



        if($request->has('title'))
            $gallery->title = $request->input('title');

        if($request->has('description'))
            $gallery->description = $request->input('description');

        $file = $request->file('image');

        if($storage = Storage::disk('local')->put('/public/images/gallery', $file)) {

            $filename = basename($storage);

            $gallery->image_link = Storage::url('images/gallery/'.$filename);
            $gallery->image_name = $filename;
            $gallery->position = Gallery::count()+1;
            
        }

        $gallery->save();

        $groups = ImagesGroup::find($request->input('groups'));
        $gallery->groups()->attach($groups);

        return redirect('/admin/gallery')->with('success', 'Nowe zdjęcie galerii zostało pomyślnie dodane');
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
        
        $gallery = Gallery::findOrFail($id);
        $gallery->groups()->detach();
        $gallery->delete();

        return redirect('/admin/gallery')->with('success', 'Zdjęcie galerii zostało pomyślnie usinięte');
    }
}
