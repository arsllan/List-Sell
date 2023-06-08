<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipments;
use Validator;
use DataTables;
class EquipmentsController extends Controller
{
    public function datatables(){
        $equipments = Equipments::orderBy('created_at','asc')->get();
        return Datatables::of($equipments)
        ->addIndexColumn()
        ->addColumn('image', function($row){
               $image = '<img src="'.asset('public/uploads/equipments/'.$row->image).'" class="img-thumbnail" width="80px"  />';
               return $image;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/equipment/edit/'.$row->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/equipment/delete/'.$row->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }     
    public function index(){
        $equipments = Equipments::orderBy('created_at','asc')->get();
        return view('backend.equipments.index',compact('equipments'));
    }
    public function create(){
        return view('backend.equipments.create');
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'image' => 'required'
        ]);     
        $equipment = new Equipments;
        $equipment->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/equipments/';
            //upload new file
            $equipment = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $equipment->move($path, $filename);
            //for update in table
            $equipment->image = $filename;

        }     
        $equipment->save();
        return redirect()->back()->with('success', 'Equipment Created Successfully');
    }
    public function edit($id){
        $equipment = Equipments::find($id);
        return view('backend.equipments.edit',compact('equipment'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);     
        $type = Equipments::find($id);
        $type->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/equipments/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $type->image = $filename;

        }     
        $type->update();
        return redirect('equipments')->with('success', 'Equipment Updated Successfully');        
    }
    public function delete($id){
        $type = Equipments::find($id)->delete();
        return redirect()->back()->with('success', 'Equipment Deleted Successfully');
    }

}
