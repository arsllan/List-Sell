<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\Brands;
use App\Models\AutoModels;
use App\Models\BodyTypes;
use App\Models\Equipments;
use App\Models\AutoDetails;
use App\Models\Categories;
use Validator;
use DataTables;
class AdsController extends Controller
{
    public function datatables(){
        $listings = Listing::with('user','category','model','model_sub','body_type')->where('is_ad',1)->orderBy('created_at','asc')->get();
        return Datatables::of($listings)
        ->addIndexColumn()
        ->addColumn('refno', function($row){
               return $row->id;
        })
        ->addColumn('mmcode', function($row){
               return $row->mmcode.' '.$row->color;
        })
        ->addColumn('title', function($row){
               return $row->title;
        })
        ->addColumn('siteclick', function($row){
               return $row->views_counter;
        })
        ->addColumn('leads', function($row){
               return $row->views_counter + $row->tel_counter;
        })
        ->addColumn('price', function($row){
               return "<span class='price'>".$row->price."</span>";
        })
        ->addColumn('document', function($row){
               return '<a href="'.asset('public/uploads/listingsdocs/'.$row->document_id).'" target="_blank" class="btn btn-sm mr-1 edit">View Document</a>';
        })
        ->addColumn('created', function($row){
               return $row->created_at;
        })
        ->addColumn('action', function($row){
            $class = $row->status == 1 ? 'drop-success' : 'drop-danger';
            $s = $row->status == 1 ? 'selected' : '';
            $ns = $row->status == 2 ? 'selected' : '';
            return '<div class="action-list"><select class="process select vendor-droplinks '.$class.'">'.
                    '<option value="'. route('ads-status',['id' => $row->id, 'status' => 1]).'" '.$s.'>Approved</option>'.
                    '<option value="'. route('ads-status',['id' => $row->id, 'status' => 2]).'" '.$ns.'>Decline</option></select></div>';
        })
        ->rawColumns(['action','refno','mmcode','document','title','siteclick','leads','created','price'])
        ->make(true);
    }  
    public function index(){
        return view('backend.ads.index');
    }

}
