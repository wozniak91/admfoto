<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Attribute;
use App\AttributesGroup;

class AttributesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = AttributesGroup::get();

        return view('admin.attributes.create', compact('groups'));
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
            'attributes_group_id' => 'required|numeric',
            'value' => 'required|string|min:3|max:25',
        ]);

        Attribute::create($request->all());

        return redirect('/admin/attributes_groups/'.$request->input('attributes_group_id'))->with('success', 'Nowy atrybut został pomyślnie dodany');
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
        $attribute = Attribute::findOrFail($id);
        $groups = AttributesGroup::get();

        return view('admin.attributes.edit', compact('attribute', 'groups'));
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
            'attributes_group_id' => 'required|numeric',
            'value' => 'required|string|min:3|max:25',
        ]);

        $attribute = Attribute::findOrFail($id);
        $attribute->fill($request->all());
        $attribute->save();

        return redirect('/admin/attributes_groups/'.$request->input('attributes_group_id'))->with('success', 'Atrybut został pomyślnie zaktualizowany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        return redirect('/admin/attributes_groups/'.$attribute->attributes_group_id)->with('success', 'Atrybut został pomyślnie usunięty');
    }
}
