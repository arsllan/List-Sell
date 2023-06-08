<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class CompareController extends Controller
{
    public function compareCars(){
        $comparecars = compare_car_data();
        return view('frontend.comparecars',compact('comparecars'));
    }
    public function storecar(Request $request){
        $listingid = $request->id;
        if (Session::get('comparecars',[])) {
            $comparecar = Session::get('comparecars', []);
            $index = in_array($listingid, $comparecar);
            if ($index == false){
                if(count($comparecar) == 3){
                    return response()->json(["error","Only three item can be in compare."]);
                }else{
                    Session::push('comparecars', $listingid);
                }
                
            }else{
                return response()->json(["error","already added to compare"]);
            }
        }else{
            Session::put('comparecars',[]);
            Session::push('comparecars', $listingid);
        }
        return response()->json(["success","added to compare"]);
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
