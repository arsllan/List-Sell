<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BodyTypes;
use Validator;
use DataTables;
class BodyTypeController extends Controller
{
    public function datatables(){
        $bodytypes = BodyTypes::orderBy('created_at','asc')->get();
        return Datatables::of($bodytypes)
        ->addIndexColumn()
        ->addColumn('image', function($row){
               $image = '<img src="'.asset('public/uploads/bodytypes/'.$row->image).'" class="img-thumbnail" width="80px"  />';
               return $image;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/bodytype/edit/'.$row->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/bodytype/delete/'.$row->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }    
    public function index(){
        $bodytypes = BodyTypes::orderBy('created_at','asc')->get();
        return view('backend.cartypes.index',compact('bodytypes'));
    }
    public function create(){
        return view('backend.cartypes.create');
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'image' => "required"
        ]);     
        $type = new BodyTypes;
        $type->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/bodytypes/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $type->image = $filename;

        }     
        $type->save();
        return redirect()->back()->with('success', 'Body Type Inserted Successfully');
    }
    public function edit($id){
        $type = BodyTypes::find($id);
        return view('backend.cartypes.edit',compact('type'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);     
        $type = BodyTypes::find($id);
        $type->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/bodytypes/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $type->image = $filename;

        }     
        $type->update();
        return redirect('body/types')->with('success', 'Body Type Updated Successfully');        
    }
    public function delete($id){
        $type = BodyTypes::find($id)->delete();
        return redirect()->back()->with('success', 'Body Type Deleted Successfully');
    }

}
