<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AutoModels;
use App\Models\Brands;
use Validator;
use DataTables;
class ModelController extends Controller
{
    public function datatables(){
        $models = AutoModels::with('brand')->orderBy('created_at','asc')->get();
        return Datatables::of($models)
        ->addIndexColumn()
        ->addColumn('brand', function($row){
               return $row->brand->name;
        })
        ->addColumn('image', function($row){
               $image = '<img src="'.asset('public/uploads/models/'.$row->image).'" class="img-thumbnail" width="80px"  />';
               return $image;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/model/edit/'.$row->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/model/delete/'.$row->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action','image','brand'])
        ->make(true);
    }    
    public function index(){
        return view('backend.models.index');
    }
    public function create(){
        $brands = Brands::orderBy('created_at','asc')->get();
        return view('backend.models.create',compact('brands'));
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'brand' => 'required',
            'name' => 'required',
            'image' => 'required'
        ]);     
        $model = new AutoModels;
        $model->brand_id = $request->brand;
        $model->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/models/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $model->image = $filename;

        }     
        $model->save();
        return redirect()->back()->with('success', 'Model Created Successfully');
    }
    public function edit($id){
        $model = AutoModels::find($id);
        $brands = Brands::orderBy('created_at','asc')->get();
        return view('backend.models.edit',compact('model','brands'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'brand' => 'required',
            'name' => 'required',
            'image' => 'required'
        ]);     
        $model = AutoModels::find($id);
        $model->brand_id = $request->brand;
        $model->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/models/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $model->image = $filename;

        }     
        $model->update();
        return redirect('models')->with('success', 'Model Updated Successfully');        
    }
    public function delete($id){
        AutoModels::find($id)->delete();
        return redirect()->back()->with('success', 'Model Deleted Successfully');
    }

}
