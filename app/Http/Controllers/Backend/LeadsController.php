<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\ListingInquiry;
use App\Models\ListingCallBack;
use Validator;
use DataTables;
use DB;
class LeadsController extends Controller
{
    public function personalSiteLead(){
        return view('backend.leads.personalsite');
    }
    public function contactusLeads(){
        return view('backend.leads.contactusleads');
    }
    public function compaignsleads(){
        return view('backend.leads.compaignsleads');
    }
    public function emailEnquiryLeads(){
        $leads = ListingInquiry::with('list')->get();
        $chartdata = ListingInquiry::select(
                            DB::raw("(COUNT(*)) as count"),
                            DB::raw("created_at as month_name")
                        )
                        ->whereYear('created_at', date('Y'))
                        ->groupBy('month_name')
                        ->get();
        $dataPoints = array();
        if(count($chartdata)>0){
            foreach($chartdata as $key){
               // $timestimpt = strtotime($key->month_name);
             
                array_push($dataPoints, array("x"=> 1, "y"=> $key->count));
            }
        }
        return view('backend.leads.emailenquiryLeads',compact('leads','dataPoints'));
    }
    public function callbackLeads(){
        $leads = ListingCallBack::with('list')->get();
        return view('backend.leads.callbackLeads',compact('leads'));
    }
}
