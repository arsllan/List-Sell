<?php

namespace App\Http\Controllers\Backend\Dealer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dealers;
use App\Models\Cities;
use App\Models\Listing;
use App\Models\ListingCallBack;
use App\Models\ListingInquiry;
use Auth;
use DB;
class DealerController extends Controller
{
    public function index(){
         $listingcount = Listing::where('uploaded_by', auth()->user()->id)->where('status',1)->count();
         $leadscount = ListingCallBack::with('list')->whereHas('list', function ($query) { $query->where('uploaded_by', auth()->user()->id); })->count() + ListingInquiry::with('list')->whereHas('list', function ($query) { $query->where('uploaded_by', auth()->user()->id); })->count();
        return view('backend.dealer.dashboard',compact('listingcount','leadscount'));
    }
    public function profile(){
        $user = User::with('dealerdata')->where('id',Auth::user()->id)->first();
        $states = DB::table('states')->get();
        $city = Cities::where('id',$user->dealerdata->city)->first();
        return view('backend.dealer.profile',compact('user','states','city'));
    }
    public function updateProfile(Request $request){
        $dealer = Dealers::where('user_id',Auth::user()->id)->first();
        $dealer->dealership_name = $request->dealername;
        $dealer->contact_person = $request->contactperson;
        $dealer->region	 = $request->region;
        $dealer->city = $request->city;
        $dealer->telephone = $request->telephone;
        $dealer->cell = $request->cell;
        $dealer->featured = $request->featured;
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
        return redirect()->back()->with('success', 'Profile Updated Successfully');
        
    }

}
