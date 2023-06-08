<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AutoModels;
use App\Models\Slider;
use Validator;
use DataTables;
class SliderController extends Controller
{
    public function index(){
        $sliders = Slider::all();
        return view('backend.slider.index',compact('sliders'));
    }
    public function create(){
        return view('backend.slider.create');
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'subtitle' => 'required',
            'underline' => 'required',
            'image' => 'required'
        ]);     
        $slider = new Slider;
        $slider->title = $request->title;
        $slider->sub_title = $request->subtitle;
        $slider->underline = $request->underline;
        if($request->image != ''){        
            $path = public_path().'/uploads/sliders/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $slider->image = $filename;

        }     
        $slider->save();
        return redirect()->back()->with('success', 'Slide Created Successfully');
    }
    public function edit($id){
        $slider = Slider::find($id);
        return view('backend.slider.edit',compact('slider'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'subtitle' => 'required',
            'underline' => 'required',
            'image' => 'required'
        ]);     
        $slider = Slider::find($id);
        $slider->title = $request->title;
        $slider->sub_title = $request->subtitle;
        $slider->underline = $request->underline;
        if($request->image != ''){        
            $path = public_path().'/uploads/sliders/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $slider->image = $filename;

        }     
        $slider->update();
        return redirect('manage/slider')->with('success', 'Slide Updated Successfully');      
    }
    public function delete($id){
        Slider::find($id)->delete();
        return redirect()->back()->with('success', 'Slide Deleted Successfully');
    }

}
