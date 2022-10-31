<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('adminViews/index', compact('users'));
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
         $user = User::find($id);
        return view('adminViews/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public  function update(Request $request, $id)
    {   
        

        $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'email'=>'required',
            'cicle_id'=>'required'
        ]); 
        $user = User::find($id);
        // Getting values from the blade template form
        $user->name =  $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->cicle_id = $request->get('cicle_id');
        $user->update();

        return redirect('adminViews')->with('success', 'User updated.'); // -> resources/views/stocks/index.blade.php
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->deleted=1;
        $user->update();
        return redirect('adminViews')->with('success', 'User deleted.'); 

    }


    public function menu(){
      return  view('adminViews/adminMenu');

    } 
    public function activate($id)
    {
        return view('adminViews.adminActivated',[ 'user' => User::findOrFail($id)]);
    }

    public function showUsers()
    {
        $users = User::latest()->paginate(10);
        return view('adminViews/adminUpdate', compact('users'));

    }

    public function activateUsers()
    {
        $users = User::with([])->paginate(10);
        return view('adminViews/adminActivate', compact('users'));
    }
}
