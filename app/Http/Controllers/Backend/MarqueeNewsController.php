<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MarqueeNews;
use Validator;
use DataTables;
class MarqueeNewsController extends Controller
{
    public function index(){
        $news = MarqueeNews::all();
        return view('backend.marqueenews.index',compact('news'));
    }
    public function create(){
        return view('backend.marqueenews.create');
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required'
        ]);     
        $news = new MarqueeNews;
        $news->title = $request->title;
        $news->save();
        return redirect()->back()->with('success', 'Marquee News Created Successfully');
    }
    public function edit($id){
        $news = MarqueeNews::find($id);
        return view('backend.marqueenews.edit',compact('news'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required'
        ]);     
        $news = MarqueeNews::find($id);
        $news->title = $request->title;
        $news->update();
        return redirect('manage/marqueenews')->with('success', 'Marquee News Updated Successfully');      
    }
    public function delete($id){
        MarqueeNews::find($id)->delete();
        return redirect()->back()->with('success', 'Marquee News Deleted Successfully');
    }

}
