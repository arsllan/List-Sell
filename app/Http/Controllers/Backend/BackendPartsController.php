<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Part;
use App\Models\AutoModels;
use App\Models\Brands;
use Validator;
use DataTables;
class BackendPartsController extends Controller
{
    public function datatables(){
        $parts = auth()->user()->id == 1 ? Part::orderBy('created_at','asc')->get() :  Part::orderBy('created_at','asc')->where('user_id', auth()->user()->id)->get();
        return Datatables::of($parts)
        ->addIndexColumn()
        ->addColumn('image', function($row){
               $image = '<img src="'.asset('public/uploads/parts/'.$row->image).'" class="img-fluid" width="80px"  />';
               return $image;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/edit/part/'.$row->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/delete/part/'.$row->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }    
    public function index(){
        return view('backend.parts.index');
    }
    public function create(){
        $models = AutoModels::get();
        $brands = Brands::get();
        return view('backend.parts.create',compact('models','brands'));
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'image' => "required",
            'price' => "required"
        ]);     
        $part = new Part;
        $part->user_id = auth()->user()->id;
        $part->name = $request->name;
        $part->brand_id = $request->brand_id;
        $part->model_id = $request->model_id;
        $part->manufacture = $request->manufacture;
        $part->price = $request->price;
        $part->description = $request->desc;
        if($request->image != ''){        
            $path = public_path().'/uploads/parts/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $part->image = $filename;

        }     
        $part->save();
        return redirect()->back()->with('success', 'Part Inserted Successfully');
    }
    public function edit($id){
        $part = Part::find($id);
        $models = AutoModels::where('id',$part->model_id)->first();
        $brands = Brands::get();
        return view('backend.parts.edit',compact('part','models','brands'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'price' => 'required'
        ]);     
        $part = Part::find($id);
        $part->name = $request->name;
        $part->price = $request->price;
        $part->description = $request->desc;
        $part->brand_id = $request->brand_id;
        $part->model_id = $request->model_id;
        $part->manufacture = $request->manufacture;
        if($request->image != ''){        
            $path = public_path().'/uploads/parts/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $part->image = $filename;

        }     
        $part->update();
        return redirect('autoparts')->with('success', 'Part Updated Successfully');        
    }
    public function delete($id){
        $part = Part::find($id)->delete();
        return redirect()->back()->with('success', 'Part Deleted Successfully');
    }

}
