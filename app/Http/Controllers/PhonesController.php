<?php

namespace App\Http\Controllers;

use App\Phones;
use App\Manufacturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use function foo\func;

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
        $manufacturers = Manufacturers::all();
        return view('phones.index')->with('phones', $phones)->with('manufacturers', $manufacturers);
    }

    public function filter()
    {
        if (!request()->filled('model') && !request()->filled('year') && !request()->filled('manufacturerId')) {
            return redirect()->action('PhonesController@index')->with('noParams', 'No filters were applied!');
        }
        $manufacturers = Manufacturers::all();
        $phones = Phones::query()->when(request()->filled('manufacturerId'), function ($query) {
            return $query->where('manufacturerId', '=', request('manufacturerId'));
        })->when(request()->filled('model'), function ($query) {
            return $query->where('model', 'like', '%' . request('model') . '%');
        })->when(request()->filled('year'), function ($query) {
            return $query->where('year', '=', request('year'));
        })->get();
        if (!$phones->count()) {
            return view('phones.index')->with('phones', $phones)->with('manufacturers', $manufacturers)->with('no_results', 'No results found.');
        }
        return view('phones.index')->with('phones', $phones)->with('manufacturers', $manufacturers);
    }
    public function search(){
        $manufacturers = Manufacturers::all();
        $phones = Phones::query()->when(request()->filled('query'), function ($query) {
            return $query->where('model', 'like', '%' . request('query') . '%');
        })->get();
        return view('phones.index')->with('phones', $phones)->with('manufacturers',$manufacturers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $rules = array('model' => 'required', 'year' => 'required|integer', 'manufacturerId' => 'required|integer', 'image' => 'mimes:jpeg,png');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect('phones/create')->withErrors($validator)->withInput($request->all());
        } else {
            $imageIsSet = (isset($request["image"]) ? $request["image"] : "");
            if ($imageIsSet) {
                $path = $request->file('image')->store('images/phones', 'public');
            } else {
                $path = 'images/phones/default.jpg';
            }
            $phone = new Phones(['model' => $request->get('model'), 'year' => $request->get('year'), 'manufacturerId' => $request->get('manufacturerId'), 'image' => $path]);
            $phone->save();
            return redirect()->action('PhonesController@index');
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
        $manufacturers = Manufacturers::all();
        $phone = Phones::find($id);
        return view('phones.edit', compact('phone', 'id'))->with('manufacturers', $manufacturers);
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
        $phone = Phones::find($id);
        $rules = array('model' => 'required', 'year' => 'required|integer', 'manufacturerId' => 'required|integer', 'image' => 'image|mimes:jpeg,png');
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect("phones/{$phone->id}/edit")->withErrors($validator)->withInput($request->all());
        } else {
            $imageIsSet = (isset($request["image"]) ? $request["image"] : "");
            if ($imageIsSet) {
                if ($phone->image != 'images/phones/default.jpg') {
                    unlink(public_path("storage/$phone->image"));
                }
                $path = $request->file('image')->store('images/phones', 'public');
            } else {
                if ($phone->image != 'images/phones/default.jpg') {
                    $path = $phone->image;
                } else {
                    $path = 'images/phones/default.jpg';
                }
            }
            $phone->model = $request->get('model');
            $phone->year = $request->get('year');
            $phone->manufacturerId = $request->get('manufacturerId');
            $phone->image = $path;
            $phone->save();
            return redirect('phones')->with('success', "{$phone->manufacturer->name} {$phone->model} was successfully updated!");
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
        $phone = Phones::find($id);
        if ($phone->image != 'images/phones/default.jpg') {
            unlink(public_path("storage/$phone->image"));
        }
        $phone->delete();
        return redirect('phones')->with('success', "Successfully deleted {$phone->manufacturer->name}  {$phone->model}!");
    }

    public function delete_image($id)
    {
        $phone = Phones::find($id);
        unlink(public_path("storage/$phone->image"));
        $phone->image = 'images/phones/default.jpg';
        $phone->save();
        return redirect("phones/{$phone->id}/edit")->with('success', "{$phone->manufacturer->name} {$phone->model}'s image was successfully deleted!");;
    }
}
