<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dealers;
use App\Models\Listing;
use App\Models\Cities;
use Validator;
use DataTables;
use Hash;
use DB;
use Str;
class DealersController extends Controller
{
    public function datatables(){
        $users = User::where('role_id',2)->orderBy('created_at','asc')->get();
        return Datatables::of($users)
        ->addIndexColumn()
        ->addColumn('name', function($row){
               return $row->name;
        })
        ->addColumn('action', function($row){
               $dealer = Dealers::where('user_id',$row->id)->first();
               $btn = '<div class="d-flex align-items-center">';
               $btn .= '<a href="/dealer/edit/'.$dealer->id.'" class="btn btn-sm mr-1 edit">Edit</a>';
               $btn .= '<a href="/dealer/delete/'.$dealer->id.'" class="btn btn-sm dell delete-confirm">Delete</a>';
               $btn .='</div>';
                return $btn;
        })
        
        ->addColumn('document', function($row){
               if($row->document_id == null){
                   return "Not Upload Yet!";
               }else{ 
                return '<a href="'.asset('public/uploads/dealers/docs/'.$row->document_id).'" target="_blank" class="btn btn-sm mr-1 edit">View Document</a>';
               }
        })
        ->addColumn('status', function($row){
            $dealer = Dealers::where('user_id',$row->id)->first();
            $class = $dealer->verify_status == 1 ? 'drop-success' : 'drop-danger';
            $s = $dealer->verify_status == 1 ? 'selected' : '';
            $ns = $dealer->verify_status == 0 ? 'selected' : '';
            return '<div class="action-list"><select class="process select vendor-droplinks dealerstatus form-control fitContent '.$class.'">'.
                    '<option value="'. route('dealer-status',['id' => $dealer->id, 'status' => 1]).'" '.$s.'>Verified</option>'.
                    '<option value="'. route('dealer-status',['id' => $dealer->id, 'status' => 0]).'" '.$ns.'>Pending</option></select>
                    </div>';
        })        
        ->rawColumns(['action','name','document','status'])
        ->make(true);
    }
    public function index(){
        $users = User::orderBy('created_at','asc')->get();
        return view('backend.dealers.index',compact('users'));
    }
    public function create(){
        $states = DB::table('states')->get();
        return view('backend.dealers.create',compact('states'));
    }
    public function store(Request $request){
        $users  = User::count();
        $counter = $users + 1;
        $random = rand('111','999');
        $loginid = $counter.''.$random;
        $user = User::create([
            'role_id' => 2,
            'name' => $request->dealername,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'loginid' => $loginid
        ]);
        
        
        $dealer = new Dealers;
        $dealer->user_id = $user->id;
        $dealer->dealership_name = $request->dealername;
        $dealer->slug = Str::slug($request->dealername).'-'.$loginid;
        $dealer->contact_person = $request->contactperson;
        $dealer->contactpersonaccount = $request->contactpersonaccount;
        $dealer->region	 = $request->region; 
        $dealer->city = $request->city;
        $dealer->telephone = $request->telephone;
        $dealer->cell = $request->cell;
        $dealer->featured = $request->featured;
        $dealer->trackingno = $request->trackingno;
        $dealer->physical_address = $request->physical_address;
        $dealer->zipcode = $request->zipcode;
        $dealer->emailaccounts = $request->emailaccounts;
        $dealer->registered_company_name = $request->registered_company_name;
        $dealer->company_registration_number = $request->company_registration_number;
        $dealer->postal_address_details = $request->postal_address_details;
        if($dealer->postal_address_details == 1){
            $dealer->postal_address_details = 1;
            $dealer->postal_region = $request->postal_region;
            $dealer->postal_city = $request->postal_city;
            $dealer->postal_address = $request->postal_address;
            $dealer->post_zipcode = $request->post_zipcode;            
        }else{
            $dealer->postal_address_details = 0;
            $dealer->postal_region = $request->region;
            $dealer->postal_city = $request->city;
            $dealer->postal_address = $request->physical_address;
            $dealer->post_zipcode = $request->zipcode;               
        }
        $dealer->vat_number = $request->vat_number;
        $dealer->notes = $request->notes;
        $dealer->vat_number = $request->vat_number;
        $dealer->trail_period = $request->trail_period;
        $dealer->dealer_type = $request->dealer_type;
        $dealer->facebook = $request->facebook;
        $dealer->twitter = $request->twitter;
        $dealer->linkedin = $request->linkedin;
        $dealer->instagram = $request->instagram;
        
        if($request->bannerimage != ''){        
            $path = public_path().'/uploads/dealers/banners/';
            //upload new file
            $file = $request->bannerimage;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $dealer->banner_image = $filename;

        }     
        if($request->document != ''){        
            $path = public_path().'/uploads/dealers/docs/';
            //upload new file
            $file = $request->document;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $dealer->document_id = $filename;

        }     
        $dealer->save();
        if($request->image != ''){        
            $path = public_path().'/uploads/profile/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            User::where('id',$user->id)->update([ "image" => $filename ]);

        }  
        return redirect('manage/dealers')->with('success','Dealer Created Succesfully');
    }
    public function edit($id){
        $states = DB::table('states')->get();
        $dealer = Dealers::with('user')->where('id',$id)->first();
        $city = Cities::where('id',$dealer->city)->first();
        $postalcity = Cities::where('id',$dealer->postal_city)->first();
        return view('backend.dealers.edit',compact('dealer','states','city','postalcity'));
    }
    public function update(Request $request, $id){

        
        $dealer = Dealers::find($id);
        $dealer->dealership_name = $request->dealername;
        $dealer->contact_person = $request->contactperson;
        $dealer->contactpersonaccount = $request->contactpersonaccount;
        $dealer->region	 = $request->region;
        $dealer->city = $request->city;
        $dealer->telephone = $request->telephone;
        $dealer->cell = $request->cell;
        $dealer->featured = $request->featured;
        $dealer->trackingno = $request->trackingno;
        $dealer->physical_address = $request->physical_address;
        $dealer->zipcode = $request->zipcode;
        $dealer->emailaccounts = $request->emailaccounts;
        $dealer->registered_company_name = $request->registered_company_name;
        $dealer->company_registration_number = $request->company_registration_number;
        if($dealer->postal_address_details == 1){
            $dealer->postal_address_details = 1;
            $dealer->postal_region = $request->postal_region;
            $dealer->postal_city = $request->postal_city;
            $dealer->postal_address = $request->postal_address;
            $dealer->post_zipcode = $request->post_zipcode;            
        }else{
            $dealer->postal_address_details = 0;
            $dealer->postal_region = $request->region;
            $dealer->postal_city = $request->city;
            $dealer->postal_address = $request->physical_address;
            $dealer->post_zipcode = $request->zipcode;               
        }
        $dealer->vat_number = $request->vat_number;
        $dealer->notes = $request->notes;
        $dealer->vat_number = $request->vat_number;
        $dealer->trail_period = $request->trail_period;
        $dealer->dealer_type = $request->dealer_type;
        $dealer->facebook = $request->facebook;
        $dealer->twitter = $request->twitter;
        $dealer->linkedin = $request->linkedin;
        $dealer->instagram = $request->instagram;        
        if($request->bannerimage != ''){        
            $path = public_path().'/uploads/dealers/banners/';
            //upload new file
            $file = $request->bannerimage;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $dealer->banner_image = $filename;

        }     
        $dealer->update();
        if($request->image != ''){        
            $path = public_path().'/uploads/profile/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            User::where('id',$dealer->user->id)->update([ "image" => $filename ]);

        }  
        $user = User::where('id',$dealer->user->id)->update([
            'role_id' => 2,
            'fname' => $request->dealername,
            'email' => $request->email,
        ]);
                
        return redirect('manage/dealers')->with('success','Dealer Updated Succesfully');
    }    
    public function delete($id){
        $dealer = Dealers::find($id);
        User::find($dealer->user_id)->delete();
        Listing::where('uploaded_by',$dealer->user_id)->delete();
        $dealer->delete();
        return redirect()->back()->with('success','Dealer Deleted Succesfully');
    }
    public function status($id,$status){
        Dealers::where('id',$id)->update([ "verify_status" => $status ]);
        return redirect()->back()->with('success','Dealer Status Updated Succesfully');        
    }
}
