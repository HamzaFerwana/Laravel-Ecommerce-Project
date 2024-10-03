<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   $abouts = About::latest('id')->paginate(3);
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'title' => 'required',
        'description' => 'required',
        'icon' => 'required'
      ]);
      $validator->validate();

      About::create([
        'title' => $request->title,
        'description' => $request->description,
        'icon' => $request->icon
      ]);

      return redirect()->route('admin.about.index')->with(['msg' => 'About info created.', 'type' => 'success']);
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
    {
        $about = About::findOrFail($id);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   $about = About::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required'
          ]);
          $validator->validate();

          $about->update([
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon
          ]);

          return redirect()->route('admin.about.index')->with(['msg' => 'About info updated.', 'type' => 'info']);
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        About::destroy($id);
        return redirect()->route('admin.about.index')->with(['msg' => 'About info deleted.', 'type' => 'danger']);
    }
}
