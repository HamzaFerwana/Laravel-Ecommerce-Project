<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest('id')->paginate(3);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.sliders.create')->withErrors($validator)->withInput();
        }
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider->save();
        return redirect()->route('admin.sliders.index')->with(['msg' => 'Slider created.', 'type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   $slider = Slider::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);
        $validator->validate();
        $slider->update($request->all());
        return redirect()->route('admin.sliders.index')->with(['msg' => 'Slider updated.', 'type' => 'info']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Slider::destroy($id);
        return redirect()->route('admin.sliders.index')->with(['msg' => 'Slider deleted.', 'type' => 'danger']);
    }

    public function sliders_bg_image() {
        return view('admin.sliders.bg-image');
    }

    public function sliders_bg_image_data(Request $request) {
        $validator = Validator::make($request->all(), [
            'bg_image' => 'required|image'
        ]);
        $validator->validate();
        $image = settings()->get('bg_image');
        if($request->hasFile('bg_image')) {
            $image = $request->file('bg_image')->store('uploads/sliders', 'custom');
            settings()->set('bg_image', $image);
            settings()->save();
        }
        return redirect()->route('admin.sliders-bg-image')->with(['msg' => 'BG image updated.', 'type' => 'info']);
    }
}
