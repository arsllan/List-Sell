<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use Session;
class FavController extends Controller
{
    public function compareCars(){
        $comparecars = compare_car_data();
        return view('frontend.comparecars',compact('comparecars'));
    }
    public function listingfavstore(Request $request){
        if (auth()->check()) {
				//This condition does not apply
			$favdata = Favorite::where('user_id',auth()->user()->id)->where('listing_id',$request->id)->first();
			
            if ($favdata) {
                return response()->json(["error","There are already auto in your favorites"]);                      
            } else {
                auth()->user()->favorites()->create([
                    'listing_id' => $request->id
                ]);
                $counter = Favorite::where('user_id','=',auth()->user()->id)->count();
                return response()->json(["success","Auto was successfully added to your list of favorite listing.",$counter]);    
            }
        }
        return response()->json(["error","To add to your favorites list, you must first login"]);      
    }
    public function listingfavremove(Request $request){
        if (auth()->check()) {
            Favorite::where('user_id',auth()->user()->id)->where('listing_id',$request->id)->delete();
            $counter = Favorite::where('user_id','=',auth()->user()->id)->count();
            return response()->json(["success","Auto was successfully remove to your list of favorite listing.",$counter]);  
        }else{
            return response()->json(["error","To remove item from your favorites list, you must first login"]);      
        }
    }
    public function destroycar($id){
        $comparecar = Session::get('comparecars', []);
        foreach ($comparecar as $key => $value) {
            if($value == $id) {
                session()->pull('comparecars.'.$key);
            }
        }        
        return redirect()->back();
    }

}
