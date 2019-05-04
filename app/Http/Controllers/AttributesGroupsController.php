<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AttributesGroup;

class AttributesGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = AttributesGroup::paginate(10);

        return view('admin.attributes_groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attributes_groups.create');
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
            'type' => 'required|string|min:3|max:25',
        ]);

        AttributesGroup::create($request->all());

        return redirect('/admin/attributes_groups')->with('success', 'Nowa grupa została pomyślnie dodana');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = AttributesGroup::findOrFail($id);

        $attributes = $group->attributes;

        return view('admin.attributes_groups.show', compact('group', 'attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = AttributesGroup::findOrFail($id);

        return view('admin.attributes_groups.edit', compact('group'));
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
            'type' => 'required|string|min:3|max:25',
        ]);

        $group = AttributesGroup::findOrFail($id);

        $group->fill($request->all());
        $group->save();

        return redirect('/admin/attributes_groups')->with('success', 'Grupa została pomyślnie zaktualizowana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = AttributesGroup::findOrFail($id);
        $group->delete();

        return redirect('/admin/attributes_groups')->with('success', 'Grupa została pomyślnie usunięta');
    }
}
