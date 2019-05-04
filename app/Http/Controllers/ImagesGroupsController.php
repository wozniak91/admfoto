<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImagesGroup;
use App\Gallery;

class ImagesGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $groups = ImagesGroup::paginate(10);

        return view('admin.images_groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images_groups.create');
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
            'name' => 'required|string|min:3|max:25',
        ]);

        ImagesGroup::create($request->all());

        return redirect('/admin/images/groups')->with('success', 'Nowa grupa została pomyślnie dodana');

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
        $group = ImagesGroup::findOrFail($id);

        return view('admin.images_groups.edit', compact('group'));
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
            'name' => 'required|string|min:3|max:25',
        ]);
        $group = ImagesGroup::findOrFail($id);
        $group->fill($request->all());
        $group->save();

        return redirect('/admin/images/groups')->with('success', 'Grupa została pomyślnie zaktualizowana');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = ImagesGroup::findOrFail($id);

        $group->delete();

        return redirect('/admin/images/groups')->with('success', 'Grupa została pomyślnie usunięta');
    }

    public function getGroups() {

        $groups = ImagesGroup::get();
        $images = Gallery::with('groups')->get();

        $imagesGroups = [
            'groups' => $groups,
            'images' => $images
        ];

        return $imagesGroups;
    }
}
