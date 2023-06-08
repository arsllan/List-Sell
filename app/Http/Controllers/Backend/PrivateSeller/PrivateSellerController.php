<?php

namespace App\Http\Controllers\Backend\PrivateSeller;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listing;
use App\Models\Dealers;
use Auth;
use DB;
class PrivateSellerController extends Controller
{
    public function myads(){
        $listings = Listing::with('user','category','model','model_sub','equipment','body_type')->where('uploaded_by',auth()->user()->id)->orderBy('created_at','desc')->paginate(10);
        $activelistings = Listing::with('user','category','model','model_sub','equipment','body_type')->where('uploaded_by',auth()->user()->id)->where('status',1)->orderBy('created_at','desc')->paginate(10);
        $inactivelistings = Listing::with('user','category','model','model_sub','equipment','body_type')->where('uploaded_by',auth()->user()->id)->where('status',2)->orderBy('created_at','desc')->paginate(10);
        return view('frontend.PrivateSeller.myads',compact('listings','activelistings','inactivelistings'));
    }
    public function profile(){
        $user = User::where('id',Auth::user()->id)->first();
        $states = DB::table('states')->get();
        return view('frontend.PrivateSeller.profile',compact('user','states'));
    }
    public function updateProfile(Request $request){
        $user = User::find(auth()->user()->id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        if($request->document_id != ''){        
            $path = public_path().'/uploads/userdocs/';
            //upload new file
            $file = $request->document_id;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $user->document_id = $filename;
        } 
        $user->update();
        return redirect()->back()->with('success', 'Profile Updated Successfully');
        
    }

}
