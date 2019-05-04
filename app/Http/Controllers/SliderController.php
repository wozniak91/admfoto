<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slider::get();

        return view('admin.slider.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,JPEG,PNG,JPG|max:2048',
            'title' => 'min:0|max:50|string|nullable',
            'description' => 'min:0|max:255|string|nullable',
        ]);

        if($request->has('title'))
            $slider->title = $request->input('title');

        if($request->has('description'))
            $slider->description = $request->input('description');

        $file = $request->file('image');

        if($storage = Storage::disk('local')->put('/public/images/slider', $file)) {

            $filename = basename($storage);

            $slider->image_link = Storage::url('images/slider/'.$filename);
            $slider->image_name = $filename;
            $slider->position = Slider::count()+1;

        }

        $slider->save();

        return redirect('/admin/slider')->with('success', 'Nowe slajd został dodany');
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
        $slide = Slider::findOrFail($id);
        Storage::delete('images/slider/'.$slide->name);
        $slide->delete();

        return redirect()->back()->with('success', 'Slajd został usinięty');
    }

    public function getSlides() {

        return Slider::get();
    }
}
