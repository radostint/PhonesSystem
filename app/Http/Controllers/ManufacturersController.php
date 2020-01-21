<?php

namespace App\Http\Controllers;

use App\Manufacturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManufacturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufacturers = Manufacturers::all();
        return view('manufacturers.index')->with('manufacturers', $manufacturers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manufacturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array('name' => 'required|min:4','image'=>'image|mimes:jpeg,png',);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('manufacturers/create')->withErrors($validator)->withInput($request->all());
        } else {
            $manufacturer = new Manufacturers(['name' => $request->get('name')]);
            $manufacturer->save();
            return redirect('manufacturers')->with('success', "Successfully added {$manufacturer->name}!");
        }
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
        $manufacturer = Manufacturers::find($id);
        return view('manufacturers.edit', compact('manufacturer', 'id'));
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
        $manufacturer = Manufacturers::find($id);
        $rules = array('name' => 'required|min:4','image'=>'image|mimes:jpeg,png',);
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('manufacturers/create')->withErrors($validator)->withInput($request->all());
        } else {
            $imageIsSet = (isset($request["image"]) ? $request["image"] : "");
            if ($imageIsSet) {
                if ($manufacturer->image != 'images/manufacturers/default.jpg') {
                    unlink(public_path("storage/$manufacturer->image"));
                }
                $path = $request->file('image')->store('images/manufacturers', 'public');
            } else {
                if ($manufacturer->image != 'images/manufacturers/default.jpg') {
                    $path = $manufacturer->image;
                } else {
                    $path = 'images/manufacturers/default.jpg';
                }
            }
            $manufacturer->name = $request->get('name');
            $manufacturer->image = $path;
            $manufacturer->save();
            return redirect('manufacturers')->with('success', "Successfully updated {$manufacturer->name}");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $manufacturer = Manufacturers::find($id);
        unlink(public_path("storage/$manufacturer->image"));
        $manufacturer->delete();
        return redirect('manufacturers')->with('success', "Successfully deleted {$manufacturer->name}!");
    }
    public function delete_image($id)
    {
        $manufacturer = Manufacturers::find($id);
        unlink(public_path("storage/$manufacturer->image"));
        $manufacturer->image = 'images/manufacturers/default.jpg';
        $manufacturer->save();
        return redirect("manufacturers/{$manufacturer->id}/edit")->with('success', "{$manufacturer->name}'s image was successfully deleted!");;
    }
}
