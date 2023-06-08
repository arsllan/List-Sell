<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cities;
use Validator;
use DataTables;
use DB;
class CityController extends Controller
{
    public function datatables(){
        $cities = Cities::with('state')->get();
        return Datatables::of($cities)
        ->addIndexColumn()
        ->addColumn('state', function($row){
               return $row->state->name;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/city/edit/'.$row->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/city/delete/'.$row->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }    
    public function index(){
        return view('backend.cities.index');
    }
    public function create(){
        $states = DB::table('states')->get();
        return view('backend.cities.create',compact('states'));
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'state' => 'required',
            'name' => "required"
        ]);     
        $type = new Cities;
        $type->state_id = $request->state;
        $type->name = $request->name;
        $type->save();
        return redirect()->back()->with('success', 'City Created Successfully');
    }
    public function edit($id){
        $city = Cities::find($id);
        $states = DB::table('states')->get();
        return view('backend.cities.edit',compact('city','states'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'state' => 'required',
            'name' => 'required'
        ]);     
        $type = Cities::find($id);
        $type->state_id = $request->state;
        $type->name = $request->name;
        $type->update();
        return redirect('city')->with('success', 'City Updated Successfully');        
    }    
    public function delete($id){
        $type = City::find($id)->delete();
        return redirect()->back()->with('success', 'City Deleted Successfully');
    }

}
