<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use Validator;
use DataTables;
class BrandsController extends Controller
{
    public function datatables(){
        $brands = Brands::orderBy('created_at','asc')->get();
        return Datatables::of($brands)
        ->addIndexColumn()
        ->addColumn('image', function($row){
               $image = '<img src="'.asset('public/uploads/brands/'.$row->image).'" class="img-fluid" width="80px"  />';
               return $image;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/brand/edit/'.$row->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/brand/delete/'.$row->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }    
    public function index(){
        return view('backend.brands.index');
    }
    public function create(){
        return view('backend.brands.create');
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'image' => "required"
        ]);     
        $type = new Brands;
        $type->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/brands/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $type->image = $filename;

        }     
        $type->save();
        return redirect()->back()->with('success', 'Brand Created Successfully');
    }
    public function edit($id){
        $brand = Brands::find($id);
        return view('backend.brands.edit',compact('brand'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);     
        $type = Brands::find($id);
        $type->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/brands/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $type->image = $filename;

        }     
        $type->update();
        return redirect('brands')->with('success', 'Brand Updated Successfully');        
    }
    public function delete($id){
        $type = Brands::find($id)->delete();
        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    }

}
