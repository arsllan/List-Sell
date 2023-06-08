<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use DataTables;
use Hash;
class UsersController extends Controller
{
    public function datatables(){
        $users = User::where('role_id',3)->orderBy('created_at','asc')->get();
        return Datatables::of($users)
        ->addIndexColumn()
        ->addColumn('name', function($row){
               return $row->fname.' '.$row->lname;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/user/edit/'.$row->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/user/delete/'.$row->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        ->addColumn('document', function($row){
               if($row->document_id == null){
                   return "Not Upload Yet!";
               }else{ 
                return '<a href="'.asset('public/uploads/userdocs/'.$row->document_id).'" target="_blank" class="btn btn-sm mr-1 edit">View Document</a>';
               }            
               
        })
        ->addColumn('status', function($row){
            $class = $row->verify_status == 1 ? 'drop-success' : 'drop-danger';
            $s = $row->verify_status == 1 ? 'selected' : '';
            $ns = $row->verify_status == 0 ? 'selected' : '';
            return '<div class="action-list"><select class="process select vendor-droplinks userstatus form-control fitContent ' .$class.'">'.
                    '<option value="'. route('user-status',['id' => $row->id, 'status' => 1]).'" '.$s.'>Verified</option>'.
                    '<option value="'. route('user-status',['id' => $row->id, 'status' => 0]).'" '.$ns.'>Pending</option></select>
                    </div>';
        })
        ->rawColumns(['action','name','document','status'])
        ->make(true);
    }
    public function index(){
        $users = User::orderBy('created_at','asc')->get();
        return view('backend.users.index',compact('users'));
    }
    public function create(){
        return view('backend.users.create');
    }
    public function store(Request $request){
        $user = User::create([
            'role_id' => 3,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);
        
        if($request->document != ''){        
            $path = public_path().'/uploads/userdocs/';
            //upload new file
            $file = $request->document;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            User::where('id',$user->id)->update([ "document_id" => $filename ]);

        }     
        if($request->image != ''){        
            $path = public_path().'/uploads/profile/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            User::where('id',$user->id)->update([ "image" => $filename ]);

        }  
        return redirect('manage/users')->with('success','User Created Succesfully');
    }
    public function edit($id){
        $user = User::where('id',$id)->first();
        return view('backend.users.edit',compact('user'));
    }
    public function update(Request $request, $id){

        $user = User::where('id',$id)->update([
            'role_id' => 3,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
        ]);
        
        if($request->document != ''){        
            $path = public_path().'/uploads/userdocs/';
            //upload new file
            $file = $request->document;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            User::where('id',$id)->update([ "document_id" => $filename ]);

        }     
        if($request->image != ''){        
            $path = public_path().'/uploads/profile/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            User::where('id',$id)->update([ "image" => $filename ]);

        }  
        return redirect('manage/users')->with('success','User Updated Succesfully');
    }    
    public function delete($id){
        User::find($id)->delete();
        Listing::where('uploaded_by',$id)->delete();
        return redirect()->back()->with('success','User Deleted Succesfully');
    }
    public function status($id,$status){
        User::find($id)->update([ "verify_status" => $status ]);
        return redirect()->back()->with('success','User Status Updated Succesfully');        
    }

}
