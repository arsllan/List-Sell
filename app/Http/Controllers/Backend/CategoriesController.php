<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Validator;
use DataTables;
class CategoriesController extends Controller
{
    public function datatables(){
        $categories = Categories::orderBy('created_at','asc')->get();
        return Datatables::of($categories)
        ->addIndexColumn()
        ->addColumn('image', function($row){
               $image = '<img src="'.asset('public/uploads/categories/'.$row->image).'" class="img-thumbnail" width="80px"  />';
               return $image;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/category/edit/'.$row->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/category/delete/'.$row->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }
    public function index(){
        $categories = Categories::orderBy('created_at','asc')->get();
        return view('backend.categories.index',compact('categories'));
    }
    public function create(){
        return view('backend.categories.create');
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'image' => "required"
        ]);     
        $type = new Categories;
        $type->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/categories/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $type->image = $filename;

        }     
        $type->save();
        return redirect()->back()->with('success', 'Category Inserted Successfully');
    }
    public function edit($id){
        $category = Categories::find($id);
        return view('backend.categories.edit',compact('category'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);     
        $category = Categories::find($id);
        $category->name = $request->name;
        if($request->image != ''){        
            $path = public_path().'/uploads/categories/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $category->image = $filename;

        }     
        $category->update();
        return redirect('categories')->with('success', 'Category Updated Successfully');        
    }
    public function delete($id){
        $type = Categories::find($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }

}
