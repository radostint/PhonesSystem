<?php

namespace App\Http\Controllers;

use App\Phones;
use App\Manufacturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PhonesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phones::all();
        return view('phones.index') ->with('phones', $phones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $manufacturers = Manufacturers::all();
        return view('phones.create')->with('manufacturers', $manufacturers);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array('model' => 'required|min:6',);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('phones/create')->withErrors($validator)->withInput($request->all());
        } else {
            $phone = new Phones(['model' => $request->get('model'),'year' => $request->get('year'),'manufacturerId'=>$request->get('manufacturerId')]);
            $phone->save();
            return redirect('phones');
        }
        //print '<pre>';
        //print_r($request->all());
        //die;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
