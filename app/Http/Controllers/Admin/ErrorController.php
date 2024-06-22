<?php

namespace App\Http\Controllers\Admin;

use App\Error;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Error::paginate(10);
        // dd($data);
        return view('la.error_qa.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('la.error_qa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $form_data = array(
            'question'             =>      $request->question,
            'answer'             =>      $request->answer,
            
        );

        Error::create($form_data);

        return redirect('/admin/error_qa/create')->with('success', 'Data Created successfully.');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Error  $error
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $error = Error::find($id);
        return view('la.error_qa.show')->with('error',$error);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Error  $error
     * @return \Illuminate\Http\Response
     */
    public function edit(Error $error,$id)
    {
        $data = Error::Find($id);
        return view('la.error_qa.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Error  $error
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Error $error,$id)
    {
        $form_data = array(
            'question'             =>      $request->question,
            'answer'             =>      $request->answer,
            
           
        );

        error::whereId($id)->update($form_data);
        return redirect('/admin/error_qa')->with('info', 'Data Updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Error  $error
     * @return \Illuminate\Http\Response
     */
    public function destroy(Error $error,$id)
    {
        $data = Error::Find($id);
        $data -> delete();
        return redirect('/admin/error_qa')->with('danger', 'Data Deleted successfully.');
    }
}
