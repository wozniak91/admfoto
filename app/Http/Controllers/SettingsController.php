<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.edit');
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
    public function update(Request $request)
    {
        

    $user = Auth::user();
        
        if ($request->input('name') != $user->name || $request->input('email') != $user->email) {
            $this->validate($request, [
                    'name' => 'required|min:5|string',
                    'email' => 'required|min:5|email',
            ]);
        
            $user->name = $request->input('name');
            $user->email = $request->input('email');
        }

        if ($request->input('password') || $request->input('password_confirmation')) {

            $this->validate($request, [
                'password'              => 'min:5|confirmed',
                'password_confirmation' => 'required_with:password|min:5'
            ]);

            $user->password = bcrypt($request->input('password'));
        }
  
        $user->save();

        return redirect()->back()->with('success', 'Dane zostały pomyślnie zaktualizowane.');
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
