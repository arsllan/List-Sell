<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdsSubscriptions;
use Validator;
use DataTables;
class AdsSubscriptionsController extends Controller
{
    public function index(){
        $ads = AdsSubscriptions::all();
        return view('backend.adssubscriptions.index',compact('ads'));
    }
    public function create(){
        return view('backend.adssubscriptions.create');
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required'
        ]);     
        $ads = new AdsSubscriptions;
        $ads->name = $request->name;
        $ads->seven_days_price = $request->seven_days_price;
        $ads->fifteen_days_price = $request->fifteen_days_price;
        $ads->thirty_days_price = $request->thirty_days_price;
        $ads->save();
        return redirect()->back()->with('success', 'Ads Subscription Created Successfully');
    }
    public function edit($id){
        $ads = AdsSubscriptions::find($id);
        return view('backend.adssubscriptions.edit',compact('ads'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required'
        ]);     
        $ads = AdsSubscriptions::find($id);
        $ads->name = $request->name;
        $ads->seven_days_price = $request->seven_days_price;
        $ads->fifteen_days_price = $request->fifteen_days_price;
        $ads->thirty_days_price = $request->thirty_days_price;
        $ads->update();
        return redirect('manage/adssubscriptions')->with('success', 'Ads Subscription Updated Successfully');      
    }
    public function delete($id){
        AdsSubscriptions::find($id)->delete();
        return redirect()->back()->with('success', 'Ads Subscription Deleted Successfully');
    }

}
