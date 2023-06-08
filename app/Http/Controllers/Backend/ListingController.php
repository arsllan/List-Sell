<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Listing;
use App\Models\ListingMedia;
use App\Models\Brands;
use App\Models\AutoModels;
use App\Models\BodyTypes;
use App\Models\Equipments;
use App\Models\AutoDetails;
use App\Models\Categories;
use App\Models\AdsSubscriptions;
use App\Models\ListingInquiry;
use App\Models\ListingCallBack;
use App\Models\Dealers;
use Validator;
use DataTables;
use Carbon\Carbon;
use DB;
class ListingController extends Controller
{
    public function datatables($id){
        $listings = auth()->user()->id == 1 ? Listing::with('user','category','model','model_sub','body_type')->where('category_id',$id)->orderBy('created_at','asc')->get() : Listing::with('user','category','model','model_sub','body_type')->where('category_id',$id)->where('uploaded_by',auth()->user()->id)->orderBy('created_at','asc')->get();
        return Datatables::of($listings)
        ->addIndexColumn()
        ->addColumn('refno', function($row){
               return $row->id;
        })
        ->addColumn('mmcode', function($row){
               return $row->mmcode.' '.$row->color;
        })
        ->addColumn('manufacturemodel', function($row){
            if($row->model_id != null){
                $bodytypedata = Brands::where('id',$row->model->brand_id)->first();
                $deal = '';
                if($row->is_deal == 1){
                    $deal = 'style="color:red;"';
                }
               return '<a href="/auto-detail/'.$row->slug.'" target="_blank" '.$deal.'>'.$bodytypedata->name.' & '.$row->model->name.'</a>';
            }else{
                return "N/A";
            }
        })
        ->addColumn('dealershipname', function($row){
            if($row->user->id == 1){
                return "Admin";
            }else{
                $user = Dealers::where('user_id',$row->user->id)->first();
                return $user->dealership_name;
            }
        })
        ->addColumn('mileage', function($row){
               return $row->mileage;
        })
        ->addColumn('year', function($row){
               return $row->year;
        })
        ->addColumn('siteclick', function($row){
               return $row->views_counter;
        })
        ->addColumn('leads', function($row){
                $emailinquiry =  ListingInquiry::where('listing_id', $row->id)->count();
                $callbacklead =  ListingCallBack::where('listing_id', $row->id)->count();
               return $emailinquiry + $callbacklead;
        })
        ->addColumn('price', function($row){
               
               return '<div class="editable">
                        <div class="text" >'.$row->price.'</div>
                        <input type="text" placeholder="enter price" class="in_text"/>
                       </div>';
        })
        ->addColumn('created', function($row){
               return $row->created_at;
        })
        ->addColumn('action', function($row){
               $btn = '<div class="d-flex align-items-center justify-content-center">';
               $btn .= '<button class="btn py-2 px-3" style="background-color: #ffffff; width:100%; height:100%; min-height:40px; min-width:40px; max-height:40px; max-width:40px;" data-toggle="dropdown" aria-expanded="false"><img class="img-fluid" src="https://cars.alliftech.com/public/front/images/verticalBar.svg" alt="icon"/></button>';
                $btn .= '<ul class="dropdown-menu">
                    <li><a href="/listing/edit/'.$row->id.'" class="dropdown-item btn-sm">Edit</a></li>
                    <li><a href="/listing/delete/'.$row->id.'" class="dropdown-item btn-sm">Delete</a></li>
                    <li><a class="dropdown-item btn-sm socialsharing" data-id="'.$row->id.'" data-title="'.$row->title.'" href="#!">Social Sharing</a></li>
                    <li><a class="dropdown-item btn-sm converttoads" href="#!" data-id="'.$row->id.'" data-title="'.$row->title.'">Convert to Ads</a></li>
                    <li><a class="dropdown-item btn-sm converttospecial" href="#!" data-id="'.$row->id.'" data-title="'.$row->title.'">Convert to Special Deal</a></li>
                    <li><a class="dropdown-item btn-sm markassold" href="#!" data-id="'.$row->id.'" data-title="'.$row->title.'">Mark as Sold</a></li>
                </ul>';
               $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action','refno','mmcode','manufacturemodel','mileage','year','siteclick','leads','created','price','dealershipname'])
        ->make(true);
    }  
    public function datatablesofdeals($id){
        $listings = auth()->user()->id == 1 ? Listing::with('user','category','model','model_sub','body_type')->where('is_deal',1)->orderBy('created_at','asc')->get() : Listing::with('user','category','model','model_sub','body_type')->where('is_deal',1)->where('uploaded_by',auth()->user()->id)->orderBy('created_at','asc')->get();
        return Datatables::of($listings)
        ->addIndexColumn()
        ->addColumn('refno', function($row){
              return $row->id;
        })
        ->addColumn('mmcode', function($row){
              return $row->mmcode.' '.$row->color;
        })
        ->addColumn('manufacturemodel', function($row){
            if($row->model_id != null){
                $bodytypedata = Brands::where('id',$row->model->brand_id)->first();
                $deal = '';
                if($row->is_deal == 1){
                    $deal = 'style="color:red;"';
                }
              return '<a href="/auto-detail/'.$row->slug.'" target="_blank" '.$deal.'>'.$bodytypedata->name.' & '.$row->model->name.'</a>';
            }else{
                return "N/A";
            }
        })
        ->addColumn('dealershipname', function($row){
            if($row->user->id == 1){
                return "Admin";
            }else{
                $user = Dealers::where('user_id',$row->user->id)->first();
                return $user->dealership_name;
            }
        })
        ->addColumn('mileage', function($row){
              return $row->mileage;
        })
        ->addColumn('year', function($row){
              return $row->year;
        })
        ->addColumn('siteclick', function($row){
              return $row->views_counter;
        })
        ->addColumn('leads', function($row){
                $emailinquiry =  ListingInquiry::where('listing_id', $row->id)->count();
                $callbacklead =  ListingCallBack::where('listing_id', $row->id)->count();
              return $emailinquiry + $callbacklead;
        })
        ->addColumn('price', function($row){
               
              return '<div class="editable">
                        <div class="text" >'.$row->price.'</div>
                        <input type="text" placeholder="enter price" class="in_text"/>
                      </div>';
        })
        ->addColumn('created', function($row){
              return $row->created_at;
        })
        ->addColumn('action', function($row){
              $btn = '<div class="d-flex align-items-center justify-content-center">';
              $btn .= '<button class="btn py-2 px-3" style="background-color: #ffffff; width:100%; height:100%; min-height:40px; min-width:40px; max-height:40px; max-width:40px;" data-toggle="dropdown" aria-expanded="false"><img class="img-fluid" src="https://cars.alliftech.com/public/front/images/verticalBar.svg" alt="icon"/></button>';
                $btn .= '<ul class="dropdown-menu">
                    <li><a href="/listing/edit/'.$row->id.'" class="dropdown-item btn-sm">Edit</a></li>
                    <li><a href="/listing/delete/'.$row->id.'" class="dropdown-item btn-sm">Delete</a></li>
                    <li><a class="dropdown-item btn-sm socialsharing" data-id="'.$row->id.'" data-title="'.$row->title.'" href="#!">Social Sharing</a></li>
                    <li><a class="dropdown-item btn-sm converttoads" href="#!" data-id="'.$row->id.'" data-title="'.$row->title.'">Convert to Ads</a></li>
                    <li><a class="dropdown-item btn-sm markassold" href="#!" data-id="'.$row->id.'" data-title="'.$row->title.'">Mark as Sold</a></li>
                </ul>';
              $btn .='</div>';
                return $btn;
        })
        ->rawColumns(['action','refno','mmcode','manufacturemodel','mileage','year','siteclick','leads','created','price','dealershipname'])
        ->make(true);
    }  
    public function index(){
        $listings = auth()->user()->id == 1 ? Listing::with('model','model_sub','body_type')->orderBy('created_at','asc')->get() : Listing::with('model','model_sub','body_type')->where('uploaded_by',auth()->user()->id)->orderBy('created_at','asc')->get();
        $adssubcriptions = AdsSubscriptions::all();
        return view('backend.listings.index',compact('listings','adssubcriptions'));
    }
    public function indeals(){
        $adssubcriptions = AdsSubscriptions::all();
        return view('backend.listings.indeals',compact('adssubcriptions'));
    }
    public function create(){
        $models = AutoModels::get();
        $bodytypes = BodyTypes::get();
        $equipment = Equipments::get();
        $categories = Categories::get();
        $makes = Brands::get();
        return view('backend.listings.create',compact('models','bodytypes','makes','categories'));
    }
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'descriptions' => 'required',
            'category_id' => 'required',
            'model' => 'required',
            'model_sub' => 'required',
            'make' => 'required',
            'bodytype' => 'required',
            'version' => 'required',
            'year' => 'required',
            'transmission' => 'required',
            'doors' => 'required',
            'fuel_type' => 'required',
            'auto_condition' => 'required',
            'auto_drive' => 'required',
            'color' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'mileage' => 'required',
            'vin' => 'required',
            'engine' => 'required',
            'seating_capacity' => 'required',
            'image' => 'required',
        ]);     
        $listing = new Listing;
        $listing->title = $request->title;
        $listing->descriptions = $request->descriptions;
        $listing->uploaded_by = auth()->user()->id;
        $listing->category_id = $request->category_id;
        $listing->version = $request->version;
        $listing->year = $request->year;
        $listing->transmission = $request->transmission;
        $listing->doors = $request->doors;
        $listing->fuel_type = $request->fuel_type;
        $listing->auto_condition = $request->auto_condition;
        $listing->auto_drive = $request->auto_drive;
        $listing->color = $request->color;
        $listing->price = $request->price;
        $listing->sale_price = $request->sale_price;
        $listing->mileage = $request->mileage;
        $listing->vin = $request->vin;
        $listing->engine = $request->engine;
        $listing->seating_capacity = $request->seating_capacity;
        $listing->model_id = $request->model;
        $listing->model_sub_id = $request->model_sub;
        $listing->make = $request->make;
        $listing->body_type_id = $request->bodytype;
        $listing->airbags = ($request->airbags) ? '1' : '0';
        $listing->tracker = ($request->tracker) ? '1' : '0';
        $listing->alloywheels = ($request->alloywheels) ? '1' : '0';
        $listing->abs = ($request->abs) ? '1' : '0';
        $listing->bluetooth = ($request->bluetooth) ? '1' : '0';
        $listing->central = ($request->central) ? '1' : '0';
        $listing->cruise_control = ($request->cruise_control) ? '1' : '0';
        $listing->eco_stop_start = ($request->eco_stop_start) ? '1' : '0';
        $listing->mirrors = ($request->mirrors) ? '1' : '0';
        $listing->elec_seats = ($request->elec_seats) ? '1' : '0';
        $listing->windows = ($request->windows) ? '1' : '0';
        $listing->heated_seats = ($request->heated_seats) ? '1' : '0';
        $listing->isofix = ($request->isofix) ? '1' : '0';
        $listing->immobilizer = ($request->immobilizer) ? '1' : '0';
        $listing->mf_steering = ($request->mf_steering) ? '1' : '0';
        $listing->navigation = ($request->navigation) ? '1' : '0';
        $listing->park_distance = ($request->park_distance) ? '1' : '0';
        $listing->steering = ($request->steering) ? '1' : '0';
        $listing->rain_sensors = ($request->rain_sensors) ? '1' : '0';
        $listing->stability_control = ($request->stability_control) ? '1' : '0';
        $listing->sun_roof = ($request->sun_roof) ? '1' : '0';
        $listing->traction_control = ($request->traction_control) ? '1' : '0';
        
        
        
        
        if($request->image != ''){        
            $path = public_path().'/uploads/listings/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $listing->feature_image = $filename;

        }     
        $listing->save();
        if($file = $request->file('images')){
            foreach($file as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploade_path = public_path('/uploads/listings/listing_media/');
                
                $file->move($uploade_path,$image_full_name);
                DB::table('listings_media')->insert([
                    'listing_id' => $listing->id,
                    'image' => $image_full_name,
                ]);
            }    
        }
        return redirect()->back()->with('success','listing add succesfully');
    }
    
    public function edit($id){
        $models = AutoModels::get();
        $bodytypes = BodyTypes::get();
        $equipment = Equipments::get();
        $categories = Categories::get();
        $makes = Brands::get();
        $listing = Listing::with('model','model_sub','body_type','category')->where('id',$id)->first();
        $listingmedia = ListingMedia::where('listing_id',$id)->get();
        return view('backend.listings.edit',compact('models','bodytypes','makes','categories','listing','listingmedia'));
    }
    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'descriptions' => 'required',
            'category_id' => 'required',
            'model' => 'required',
            'model_sub' => 'required',
            'make' => 'required',
            'bodytype' => 'required',
            'version' => 'required',
            'year' => 'required',
            'transmission' => 'required',
            'doors' => 'required',
            'fuel_type' => 'required',
            'auto_condition' => 'required',
            'auto_drive' => 'required',
            'color' => 'required',
            'price' => 'required',
            'sale_price' => 'required',
            'mileage' => 'required',
            'vin' => 'required',
            'engine' => 'required',
            'seating_capacity' => 'required',
            'image' => 'required',
        ]);     
        $listing = Listing::find($id);
        $listing->title = $request->title;
        $listing->descriptions = $request->descriptions;
        $listing->uploaded_by = auth()->user()->id;
        $listing->category_id = $request->category_id;
        $listing->version = $request->version;
        $listing->year = $request->year;
        $listing->transmission = $request->transmission;
        $listing->doors = $request->doors;
        $listing->fuel_type = $request->fuel_type;
        $listing->auto_condition = $request->auto_condition;
        $listing->auto_drive = $request->auto_drive;
        $listing->color = $request->color;
        $listing->price = $request->price;
        $listing->sale_price = $request->sale_price;
        $listing->mileage = $request->mileage;
        $listing->vin = $request->vin;
        $listing->engine = $request->engine;
        $listing->seating_capacity = $request->seating_capacity;
        $listing->model_id = $request->model;
        $listing->model_sub_id = $request->model_sub;
        $listing->make = $request->make;
        $listing->body_type_id = $request->bodytype;
        $listing->airbags = ($request->airbags) ? '1' : '0';
        $listing->tracker = ($request->tracker) ? '1' : '0';
        $listing->alloywheels = ($request->alloywheels) ? '1' : '0';
        $listing->abs = ($request->abs) ? '1' : '0';
        $listing->bluetooth = ($request->bluetooth) ? '1' : '0';
        $listing->central = ($request->central) ? '1' : '0';
        $listing->cruise_control = ($request->cruise_control) ? '1' : '0';
        $listing->eco_stop_start = ($request->eco_stop_start) ? '1' : '0';
        $listing->mirrors = ($request->mirrors) ? '1' : '0';
        $listing->elec_seats = ($request->elec_seats) ? '1' : '0';
        $listing->windows = ($request->windows) ? '1' : '0';
        $listing->heated_seats = ($request->heated_seats) ? '1' : '0';
        $listing->isofix = ($request->isofix) ? '1' : '0';
        $listing->immobilizer = ($request->immobilizer) ? '1' : '0';
        $listing->mf_steering = ($request->mf_steering) ? '1' : '0';
        $listing->navigation = ($request->navigation) ? '1' : '0';
        $listing->park_distance = ($request->park_distance) ? '1' : '0';
        $listing->steering = ($request->steering) ? '1' : '0';
        $listing->rain_sensors = ($request->rain_sensors) ? '1' : '0';
        $listing->stability_control = ($request->stability_control) ? '1' : '0';
        $listing->sun_roof = ($request->sun_roof) ? '1' : '0';
        $listing->traction_control = ($request->traction_control) ? '1' : '0';        
        if($request->image != ''){        
            $path = public_path().'/uploads/listings/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $listing->feature_image = $filename;

        }     
        $listing->update();
        if($file = $request->file('images')){
            foreach($file as $file){
                $image_name = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $uploade_path = public_path('/uploads/listings/listing_media/');
                
                $file->move($uploade_path,$image_full_name);
                DB::table('listings_media')->insert([
                    'listing_id' => $listing->id,
                    'image' => $image_full_name,
                ]);
            }    
        }        
        if($request->removefromgallery != null || $request->removefromgallery != ''){
            $preremove = ltrim($request->removefromgallery, ',');
            $preremovearray = explode (",", $preremove); 
            foreach($preremovearray as $pre => $value){
                DB::table('listings_media')->where('id', $value)->delete();
            }    
        }        
        return redirect('listings/'.$listing->category_id)->with('success','listing updated succesfully');
    }
    public function delete($id){
        $listing = Listing::find($id)->delete();
        return redirect()->back();
    }
    public function paynow(Request $request){
        $adid = $request->adid;
        $listing = Listing::find($adid);
        $listing->top_ad = $request->top_ad;
        $listing->urgent_ad = $request->urgent_ad;
        $listing->high_ad = $request->highlight_ad;
        $listing->ad_start_date = Carbon::now();
        $listing->is_ad = 1;
        $listing->update();
        return redirect('listings/'.$listing->category_id)->with('success','your listing convert to ads succesfully');
    }
    public function converttospecialdeal(Request $request){
        $adid = $request->adid;
        $listing = Listing::find($adid);
        $listing->is_deal = 1;
        $listing->deal_price = $request->deal_price;
        $listing->update();
        return redirect('listings/'.$listing->category_id)->with('success','your listing convert to special deal succesfully');
    }
    public function updategalleryimageorder(Request $request){
        $litingmedia = DB::table('listings_media')->where('listing_id',$request->listingid)->get();        
        $position = $request->position;
        $i=1;
        foreach($position as $k=>$v){
            $array = array(
                "position" => $i
            );
            DB::table('system_category')->where('id',$v)->update($array);
            $i++;
        }        
        $msg = 'Position Updated Successfully.';
        return response()->json($msg);        
    }
}
