<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Combination;
use App\AttributesGroup;

class CombinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combinations = Combination::paginate(25);

        return view('admin.combinations.index', compact('combinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = AttributesGroup::with('attributes')->get();

        return view('admin.combinations.create', compact('groups'));
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
            'attributes.*' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $combination = new Combination;
        $combination->price = $request->input('price');
        
        if($request->has('default')) {
            $combination->setDefault();
        }

        $combination->save();

        $combination->attributes()->attach($request->input('attributes'));

        return redirect('/admin/combinations')->with('success', 'Nowa kombinacja została pomyślnie dodana.');
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
        $combination = Combination::findOrFail($id);

        return view('admin.combinations.edit', compact('combination'));
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
            'price' => 'required|numeric',
        ]);

        $combination = Combination::findOrFail($id);
        $combination->price = $request->input('price');
        
        if($request->has('default')) {
            $combination->setDefault();
        }

        $combination->save();

        return redirect('/admin/combinations')->with('success', 'Kombinacja została pomyślnie zaktualizowana.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $combination = Combination::findOrFail($id);

        $combination->options()->detach();
        $combination->delete();

        return redirect('/admin/combinations')->with('success', 'Kombinacja została pomyślnie usunięta.');
    }

    public function getCombinations()
    {
        $combinations = Combination::with('options', 'priceRules')->get();

        foreach ($combinations as $combination) {
            
            $options = [];
            $rules = count($combination->priceRules) > 0 ? [] : false;

            foreach ($combination->options as $attribute) {
                $options[] = $attribute->id;
            }

            foreach ($combination->priceRules as $rule) {
                $rules[] = [
                    'min_images_count' => $rule->min_images_count,
                    'max_images_count' => $rule->max_images_count,
                    'price' => $rule->price
                ];
            }
            unset($combination->priceRules);
            
            $combination->attributes = $options;
            $combination->price_rules = $rules;
        }

        return $combinations;
    }
}
