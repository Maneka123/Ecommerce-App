<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
class SliderController extends Controller
{

    public function index(){
        $sliders=Slider::get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function create(){
        return view('admin.slider.create');
    }

    public function store(Request $request)
{
    // Fix: $this->validate() needs the request as the first argument
    $request->validate([
        'image' => 'required|mimes:jpeg,png,jpg|max:2048', // optional: max size added
    ]);

    // Store the image and get the path
    $imagePath = $request->file('image')->store('public/slider');

    // Save the record to DB
    Slider::create([
        'image' => $imagePath,
    ]);

    // Show success message and redirect
    notify()->success('Image uploaded successfully');
    return redirect()->back();
}

public function destroy($id){
    Slider::find($id)->delete();
    notify()->success('Image deleted successfully');
    return redirect()->back();
}

}
