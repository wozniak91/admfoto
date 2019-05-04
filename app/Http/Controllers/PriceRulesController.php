<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PriceRule;

class PriceRulesController extends Controller
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
    public function create($combination_id)
    {
        return view('admin.price_rules.create', compact('combination_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($combination_id, Request $request)
    {
        
        $this->validate($request, [
            'combination_id' => 'required|numeric',
            'price' => 'required|numeric|gt:0',
            'min_images_count' => 'required|numeric|gt:0',
            'max_images_count' => 'required|numeric|gt:0',
        ]);

        PriceRule::create($request->all());
        
        return redirect('/admin/combinations/'.$combination_id.'/edit')->with('success', 'Nowa przecena została dodana pomyślnie');
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
    public function edit($combination_id, $id_rule)
    {
        $rule = PriceRule::findOrFail($id_rule);
        
        return view('admin.price_rules.edit', compact('combination_id', 'rule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $combination_id, $id_rule)
    {
        $this->validate($request, [
            'combination_id' => 'required|numeric',
            'price' => 'required|numeric|gt:0',
            'min_images_count' => 'required|numeric|gt:0',
            'max_images_count' => 'required|numeric|gt:0',
        ]);

        $rule = PriceRule::findOrFail($id_rule);
        $rule->fill($request->all());
        $rule->save();
        
        return redirect('/admin/combinations/'.$combination_id.'/edit')->with('success', 'Przecena została pomyślnie zaktualizowana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($combination_id, $id_rule)
    {
        
        $rule = PriceRule::findOrFail($id_rule);
        $rule->delete();

        return redirect('/admin/combinations/'.$combination_id.'/edit');
    }
}
