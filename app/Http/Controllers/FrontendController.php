<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cities;
use App\Models\Favorite;
use App\Models\AutoModels;
use App\Models\Brands;
use App\Models\BodyTypes;
use App\Models\Listing;
use App\Models\ListingInquiry;
use App\Models\ListingCallBack;
use App\Models\ListingReview;
use App\Models\DealersReview;
use App\Models\Categories;
use App\Models\Dealers;
use App\Models\State;
use App\Models\Slider;
use App\Models\Part;
use App\Models\User;
use App\Models\PersonalSiteLead;
use DB;
use Auth;
use Validator;
use Response;
use Mail;
use Str;
class FrontendController extends Controller
{
    public function index(Request $request){
        $bodytypes = BodyTypes::orderBy('created_at','asc')->get();
        $categories = Categories::orderBy('created_at','asc')->get();
        $brands = Brands::orderBy('created_at','asc')->get();
        $states = DB::table('states')->get();
        $bestsellerlisting = Listing::with('model','model_sub','equipment','body_type','media')->inRandomOrder()->limit(10)->get();
        $popularsearches = Listing::with('model','model_sub','equipment','body_type','media')->where('status',1)->orderBy('views_counter','desc')->limit(10)->get();
        $newlisting = Listing::with('model','model_sub','equipment','body_type','media')->where('status',1)->orderBy('created_at','desc')->limit(10)->get();
        $sliders = Slider::get();
        // Visitor Lead
        $ip = $request->ip();
        if (PersonalSiteLead::where('date', today())->where('ip', $ip)->count() < 1)
        {
            PersonalSiteLead::insert([
                'date' => today(),
                'ip' => $ip,
            ]);
        }
        return view('frontend.homepage',compact('bodytypes','categories','brands','states','newlisting','bestsellerlisting','sliders','popularsearches'));
    }
    public function custom(){
        // $litingdata = Listing::where('slug',null)->get();
        // foreach($litingdata as $data){
        //     $list = Listing::find($data->id);
        //     if($data->location == null){
        //         $list->slug = Str::slug($data->title).'-'.$data->mmcode;
        //     }else{
        //         $state = DB::table('states')->where('id',$data->location)->first();
        //         $list->slug = $state->slug.'-'.Str::slug($data->title).'-'.$data->mmcode;
        //     }
            
        //     $list->update();
        // }
        // die;
        
        
        $test =  '[]';
      
      $testfinal = json_decode($test);
      print_r($testfinal);
      foreach($testfinal as $final){
          $userdata = User::with('dealerdata')->where('loginid',$final->dealer_id->__cdata)->first();
        $listing = new Listing;
        $listing->mmcode = $final->id->__cdata;
        $listing->title = $final->title->__cdata;
        $listing->descriptions = $final->description->__cdata;
        $listing->uploaded_by = $userdata->id ?? 1;
        $listing->category_id = 3;
        $listing->version = null;
        $listing->year = null;
        //$listing->transmission = $final->motoring__transmission->__cdata;
        //$listing->doors = null;
        //$listing->fuel_type = $final->motoring__fuel_type->__cdata;
       // $listing->auto_condition = null;
       // $listing->auto_drive = null;
     //  $listing->color = $final->motoring__color->__cdata;
         $num = intval(preg_replace("/[^0-9]/", "", $final->price->__cdata));
        $listing->price = $num;
        $listing->sale_price = $num;
     //   $listing->mileage = $final->motoring__mileage_kilometers->__cdata;
    //    $listing->vin = null;
    //    $listing->engine = $final->motoring__engine_displacement_cubic_centimeters->__cdata;
     //   $listing->seating_capacity = null;
        // $modeldata = AutoModels::where('name',$final->motoring__model->__cdata)->first();
        // if($modeldata){
        //     $listing->model_id = $modeldata->id;
        // }else{
            
        //     $brandid = 0;
        //     $branddata = Brands::where('name',$final->motoring__make->__cdata)->first();
        //     if($branddata){
        //         $brandid = $branddata->id;
        //     }else{
        //         $brand = new Brands;
        //         $brand->name = $final->motoring__make->__cdata;
        //         $brand->save();
        //         $brandid = $brand->id;
        //     }
            
        //     $model = new AutoModels;
        //     $model->brand_id = $brandid;
        //     $model->name = $final->motoring__model->__cdata;
        //     $model->save();
        //     $listing->model_id = $model->id;
        // }
        
        $listing->variant = $final->variant->__cdata;
        $listing->model_sub_id = null;
        $branddata = Brands::where('name',$final->brand->__cdata)->first();
        if($branddata){
            $brandid = $branddata->id;
            $listing->make = $brandid;
        }else{
            $brand = new Brands;
            $brand->name = $final->brand->__cdata;
            $brand->save();
            $brandid = $brand->id;
            $listing->make = $brandid;
        }
        
        
        if($userdata){
            $listing->location = $userdata->dealerdata->region;
            $listing->city = $userdata->dealerdata->city;
        }
       // $listing->phone = $final->advertiser__phone->__cdata;
        // $bodytypedata = BodyTypes::where('name',$final->motoring__body_type->__cdata)->first();
        // if($bodytypedata){
        //     $listing->body_type_id = $bodytypedata->id;
        // }else{
        //     $bodytype = new BodyTypes;
        //     $bodytype->name = $final->motoring__body_type->__cdata;
        //     $bodytype->save();
        //     $listing->body_type_id = $bodytype->id;
        // }
        if($final->image_link != ''){
            if (($data = @file_get_contents($final->image_link[0]->__cdata)) === false) {
            } else {
                if($final->image_link[0]->__cdata == 'noimage'){
                    $listing->feature_image = 'noimage.png';
                }
                else{
                $imagename = time().'.jpg';
                $path = public_path().'/uploads/listings/'.$imagename;
                $url = $final->image_link[0]->__cdata;
                file_put_contents($path, file_get_contents($url));            
                $listing->feature_image = $imagename;
                    
                }
            }

        }
        $listing->status = 1;
        $listing->save();
            $listingid = $listing->id;
            if($final->image_link != null){
                $allimages = $final->image_link;
                if(!empty($allimages)){
                $i = 1;
                foreach($allimages as $image){
                    if (($data = @file_get_contents($image->__cdata)) === false) {
                    } else {
                        if($final->image_link[0]->__cdata == 'noimage'){
                          
                        }else{
                            $imagename = time().$listingid.$i.'.jpg';
                            $path = public_path().'/uploads/listings/listing_media/'.$imagename;
                            $url = $image->__cdata;
                            file_put_contents($path, file_get_contents($url));            
                            DB::table('listings_media')->insert([
                                "listing_id" => $listingid,
                                "image" => $imagename
                            ]);
                            $i++;
                        }
                    }                    
                }
            }     
                
            }
      }        
    }
    public function dealerships(Request $filters){
        $dealersships = Dealers::orderBy('dealership_name','asc')->get();
        $states = DB::table('states')->get();
        $categories = Categories::orderBy('created_at','asc')->get();
        $dealers = (new Dealers)->with('listing')->newQuery();

        // Search for a dealer based on their category.
        if ($filters->has('category') && $filters->category != null) {
            $category = Categories::where('slug',$filters->category)->first();
            if($category){
               $dealers->whereHas('listing', function($q) use ($category)
                {
                    $q->where('category_id', '=', $category->id);
                });
            }
            
        }
        // Search for a dealer based on their dealer name.
        if ($filters->has('dealer') && $filters->dealer != null) {
            $dealers->where('user_id', $filters->dealer);
        }
        // Search for a dealer based on their region name.
        if ($filters->has('region') && $filters->region != null) {
            $dealers->where('region', $filters->region);
        }
        // Search for a dealer based on their region name.
        if ($filters->has('city') && $filters->city != null) {
            $dealers->where('city', $filters->city);
        }
        $dealers = $dealers->with('user','citydata','statesdata')->orderBy('featured','desc')->paginate(15);
        return view('frontend.dealerships',compact('states','dealers','dealersships','categories'));
    }
    public function dealershipDetail($slug){
        $data = Dealers::with('user','citydata','reviews')->where('slug',$slug)->first();
        $listingdata = Listing::with('model','model_sub','body_type','media')->where('uploaded_by',$data->user_id)->get();
        $listingbrands = Listing::with('model','model_sub','body_type','media')->where('uploaded_by',$data->user_id)->pluck('make')->toArray();
       // $brandarray = \App\Models\AutoModels::whereIn('id',$listingbrands)->pluck('brand_id')->toArray();
        $brands = \App\Models\Brands::whereIn('id',$listingbrands)->get();
        return view('frontend.dealership-detail',compact('data','brands'));
    }
    public function autoDetail($id){
        // Update View
        $listing = Listing::where('slug',$id)->first();
        $id = $listing->id;
        $data = Listing::with('category','model','model_sub','body_type','media','reviews','user','location')->where('id',$id)->first();
        $bodytype = $data->body_type_id;
        $relatedlisting = Listing::with('model','model_sub','body_type','media')->where('body_type_id',$bodytype)->inRandomOrder()->limit(10)->get();
        $data->views_counter = $data->views_counter + 1;
        $data->update();
        return view('frontend.auto-detail',compact('data','relatedlisting'));
    }
    public function listingbybrand(Request $filters){
        $litings = (new Listing)->newQuery();

        // Search for a listing based on their brand.
        if ($filters->has('brandid') && $filters->brandid != null) {
            $models = AutoModels::where('brand_id',$filters->brandid)->pluck('id')->toArray();
            if($models){
                $litings->whereIn('model_id', $models);
            }
            
        }
        $listings = $litings->with('model','model_sub','body_type')->orderBy('created_at','asc')->paginate(15);
        $html = "";
        if(count($listings) > 0){
            $html = '<div id="testing" class="owl-carousel">';
            foreach($listings as $list){
                $html .='<div class="item">
                          <div class="item-inner">
                            <div class="item-img">
                              <div class="item-img-info"><a href="'.route('auto-detail',$list->id).'" class="" title="Retis lapen casen" class="product-image"><img style="height:197px;" src="'.asset('public/uploads/listings/'.$list->feature_image).'" alt="Retis lapen casen"></a>
                                <div class="new-label new-top-left">New</div>
                                <div class="item-box-hover">
                                  <div class="box-inner">
                                    <div class="product-detail-bnt"><a class="button detail-bnt" href="'.route('auto-detail',$list->id).'"><span>Quick View</span></a></div>
                                    <div class="actions" data-listingid="'.$list->id.'"><span class="add-to-links"><a href="#!" class="link-wishlist add-to-fav" title="Add to Wishlist"><span>Add to Wishlist</span></a> </span> </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="item-info">
                              <div class="info-inner">
                                <div class="item-title"><a href="'.route('auto-detail',$list->id).'" class="d-inline-block text-truncate" style="max-width: 150px;" title="Retis lapen casen">'.$list->title.'</a> </div>
                                <div class="item-content">
                                  <div class="rating">
                                    <div class="ratings">
                                      <div class="rating-box">
                                        <div class="rating" style="width:80%"></div>
                                      </div>
                                      <p class="rating-links"><a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Review</a> </p>
                                    </div>
                                  </div>
                                  <div class="item-price">
                                    <div class="price-box"><span class="regular-price"><span class="price">R'.$list->price.'</span> </span> </div>
                                  </div>
                                  <div class="other-info">
                                    <div class="col-km"><i class="fa fa-tachometer"></i>'.$list->mileage.'</div>
                                    <div class="col-engine"><i class="fa fa-gear"></i>'.$list->transmission.'</div>
                                    <div class="col-date"><i class="fa fa-calendar" aria-hidden="true"></i>'.$list->year.'</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>';
            }
            $html .= '</div>';            
        }else{
            $html .= "<div class='alert alert-danger m-0'>No Listing Found.</div>";
        }

        return $html;
    }
    public function listing(Request $filters){
        $litings = (new Listing)->newQuery();

        // Search for a listing based on their brand.
        if ($filters->has('brand') && $filters->brand != null) {
            $brand = Brands::where('slug',$filters->brand)->first();
            if($brand){
                $litings->where('make', $brand->id);
            }
            
        }

        // Search for a listing based on their Body type.
        if ($filters->has('bodytype') && $filters->bodytype != null) {
                $litings->where('body_type_id', $filters->bodytype);
        }

        // Search for a listing based on their transmission.
        if ($filters->has('transmission') && $filters->transmission != null) {
                $litings->where('transmission', $filters->transmission);
        }

        // Search for a listing based on their fuel_type.
        if ($filters->has('fueltype') && $filters->fueltype != null) {
                $litings->where('fuel_type', $filters->fueltype);
        }
        // Search for a listing based on their model year.
        if ($filters->has('yearmodel') && $filters->yearmodel != null) {
                $litings->where('year', $filters->yearmodel);
        }
        
        // Search for a listing based on their category.
        if ($filters->has('category') && $filters->category != null) {
            $category = Categories::where('slug',$filters->category)->first();
            if($category){
                $litings->where('category_id', $category->id);
            }
            
        }

        // Search for a listing based on their location.
        if ($filters->has('location') && $filters->location != null) {
            $location = State::where('slug',$filters->location)->first();
            if($location){
                $litings->where('location', $location->id);
            }
            
        }
        // Search for a listing based on their city.
        if ($filters->has('city') && $filters->city != null) {
            $city = Cities::where('slug',$filters->city)->first();
            if($city){
                $litings->where('city', $city->id);
            }
            
        }

        // Search for a listing based on their price.
        if ($filters->has('start_price') && $filters->start_price != null) {
            $litings->where('price','>=', $filters->input('start_price'));
        }
        // Search for a listing based on their price.
        if ($filters->has('end_price') && $filters->end_price != null) {
            $litings->where('price','<=', $filters->input('end_price'));
        }
        // Get the results and return them.
        $perPage = $filters->query('per_page', 10);
        $listings = $litings->with('model','model_sub','equipment','body_type')->where('is_ad',0)->orderBy('created_at','asc')->paginate($perPage);
        $topads = Listing::with('model','model_sub','equipment','body_type')->where('is_ad',1)->where('top_ad','!=',null)->limit(3)->get();
        $urgentads = Listing::with('model','model_sub','equipment','body_type')->where('is_ad',1)->where('urgent_ad','!=',null)->limit(3)->get();
        $highlightedads = Listing::with('model','model_sub','equipment','body_type')->where('is_ad',1)->where('high_ad','!=',null)->inRandomOrder()->limit(2)->get();
        return view('frontend.list',compact('listings','topads','urgentads','highlightedads'));
    }
    public function deallisting(Request $filters){
        $litings = (new Listing)->newQuery();

        // Search for a listing based on their brand.
        if ($filters->has('brand') && $filters->brand != null) {
            $brand = Brands::where('slug',$filters->brand)->first();
            if($brand){
                $litings->where('make', $brand->id);
            }
            
        }

        // Search for a listing based on their Body type.
        if ($filters->has('bodytype') && $filters->bodytype != null) {
                $litings->where('body_type_id', $filters->bodytype);
        }

        // Search for a listing based on their transmission.
        if ($filters->has('transmission') && $filters->transmission != null) {
                $litings->where('transmission', $filters->transmission);
        }

        // Search for a listing based on their fuel_type.
        if ($filters->has('fueltype') && $filters->fueltype != null) {
                $litings->where('fuel_type', $filters->fueltype);
        }
        // Search for a listing based on their model year.
        if ($filters->has('yearmodel') && $filters->yearmodel != null) {
                $litings->where('year', $filters->yearmodel);
        }
        
        // Search for a listing based on their category.
        if ($filters->has('category') && $filters->category != null) {
            $category = Categories::where('slug',$filters->category)->first();
            if($category){
                $litings->where('category_id', $category->id);
            }
            
        }

        // Search for a listing based on their location.
        if ($filters->has('location') && $filters->location != null) {
            $location = State::where('slug',$filters->location)->first();
            if($location){
                $litings->where('location', $location->id);
            }
            
        }

        // Search for a listing based on their city.
        if ($filters->has('city') && $filters->city != null) {
            $city = Cities::where('slug',$filters->city)->first();
            if($city){
                $litings->where('city', $city->id);
            }
            
        }
        // Search for a listing based on their price.
        if ($filters->has('start_price') && $filters->start_price != null) {
            $litings->where('price','>=', $filters->input('start_price'));
        }
        // Search for a listing based on their price.
        if ($filters->has('end_price') && $filters->end_price != null) {
            $litings->where('price','<=', $filters->input('end_price'));
        }
        // Get the results and return them.
        $listings = $litings->with('model','model_sub','equipment','body_type')->where('is_ad',0)->where('is_deal',1)->orderBy('created_at','asc')->paginate(15);
        $topads = Listing::with('model','model_sub','equipment','body_type')->where('is_ad',1)->where('top_ad','!=',null)->limit(3)->get();
        $urgentads = Listing::with('model','model_sub','equipment','body_type')->where('is_ad',1)->where('urgent_ad','!=',null)->limit(3)->get();
        $highlightedads = Listing::with('model','model_sub','equipment','body_type')->where('is_ad',1)->where('high_ad','!=',null)->inRandomOrder()->limit(2)->get();
        return view('frontend.list',compact('listings','topads','urgentads','highlightedads'));
    }
    public function grid(Request $filters){
        $litings = (new Listing)->newQuery();
        // Search for a listing based on their brand.
        if ($filters->has('brand') && $filters->brand != null) {
            $models = AutoModels::where('brand_id',$filters->brand)->pluck('id')->toArray();
            if($models){
                $litings->whereIn('model_id', $models);
            }
            
        }

        // Search for a listing based on their Body type.
        if ($filters->has('bodytype') && $filters->bodytype != null) {
                $litings->where('body_type_id', $filters->bodytype);
        }

        // Search for a listing based on their transmission.
        if ($filters->has('transmission') && $filters->transmission != null) {
                $litings->where('transmission', $filters->transmission);
        }

        // Search for a listing based on their fuel_type.
        if ($filters->has('fueltype') && $filters->fueltype != null) {
                $litings->where('fuel_type', $filters->fueltype);
        }
        // Search for a listing based on their model year.
        if ($filters->has('yearmodel') && $filters->yearmodel != null) {
                $litings->where('year', $filters->yearmodel);
        }
        // Search for a listing based on their category.
        if ($filters->has('category') && $filters->category != null) {
            $category = Categories::where('slug',$filters->category)->first();
            if($category){
                $litings->where('category_id', $category->id);
            }
            
        }

        // Search for a listing based on their location.
        if ($filters->has('location') && $filters->location != null) {
            $litings->where('location', $filters->input('location'));
        }

        // Search for a listing based on their price.
        if ($filters->has('start_price') && $filters->start_price != null) {
            $litings->where('price','>=', $filters->input('start_price'));
        }
        // Search for a listing based on their price.
        if ($filters->has('end_price') && $filters->end_price != null) {
            $litings->where('price','<=', $filters->input('end_price'));
        }
        // Get the results and return them.
        $perPage = $filters->query('per_page', 10);
        $listings = $litings->with('model','model_sub','equipment','body_type')->where('is_ad',0)->orderBy('created_at','asc')->paginate($perPage);
        $topads = Listing::with('model','model_sub','equipment','body_type')->where('is_ad',1)->where('top_ad','!=',null)->limit(3)->get();
        return view('frontend.grid',compact('listings','topads'));        
    }
    public function parts(Request $filters){
        $models = array();
        $products = (new Part)->newQuery();
        // Search for a listing based on their brand.
        if ($filters->has('brand') && $filters->brand != null) {
            $brand = Brands::where('slug',$filters->brand)->first();
            $models = AutoModels::where('brand_id',$brand->id)->get();
            $products->where('brand_id', $brand->id);
        }        
        // Search for a listing based on their model.
        if ($filters->has('model') && $filters->model != null) {
            $products->where('model_id', $filters->model);
        }        
        // Search for a listing based on their manufacture.
        if ($filters->has('manufacture') && $filters->manufacture != null) {
            $products->where('manufacture', $filters->manufacture);
        }        
        // Search for a listing based on their price.
        if ($filters->has('start_price') && $filters->start_price != null) {
            $products->where('price','>=', $filters->input('start_price'));
        }
        // Search for a listing based on their price.
        if ($filters->has('end_price') && $filters->end_price != null) {
            $products->where('price','<=', $filters->input('end_price'));
        }   
        $products = $products->orderBy('created_at','desc')->paginate(10);
        $brands = Brands::get();
        $manufactures = Part::select('manufacture')->distinct()->get();
        return view('frontend.parts', compact('products','models','brands','manufactures'));        
    }
    public function contactus(){
        return view('frontend.contact-us');
    }
    public function dealeradvertising(){
        return view('frontend.dealer-advertising');
    }
    public function support(){
        return view('frontend.support');
    }
    public function termofuse(){
        return view('frontend.term-of-use');
    }
    public function paiaManual(){
        return view('frontend.paia-manual');
    }
    public function emailDisclaimer(){
        return view('frontend.email-disclaimer');
    }
    public function newCars(){
        $newlisting = Listing::with('model','model_sub','equipment','body_type','media')->where('status',1)->orderBy('created_at','desc')->limit(10)->get();
        $brands = Brands::orderBy('created_at','asc')->get();
        $bodytypes = BodyTypes::orderBy('created_at','asc')->get();
        return view('frontend.new-cars',compact('newlisting','brands','bodytypes'));
    }
    public function newcarDeals(){
        return view('frontend.new-car-deals');
    }
    public function usedcarDeals(){
        return view('frontend.used-car-deals');
    }
    public function democarsForsale(){
        return view('frontend.demo-car-for-sale');
    }
    public function carSpecials(){
        return view('frontend.car-specials');
    }
    public function cheapestNewCars(){
        return view('frontend.cheapest-new-cars-in-south-africa');
    }
    public function compareCars(){
        return view('frontend.comparecars');
    }
    public function comparePart(){
        return view('frontend.compareparts');
    }
    public function shoppingCart(){
        return view('frontend.shopping-cart');
    }
    public function checkOut(){
        return view('frontend.checkout');
    }
    public function register(){
        return view('frontend.register');
    }
    public function webLogin(){
        return view('frontend.web-login');
    }
    public function forgotPassword(){
        return view('frontend.forgot-password');
    }
    public function createAcccount(){
        return view('frontend.create-acccount');
    }
    public function fetchcities(Request $request){
        $data['cities'] = DB::table('cities')->where("state_id",$request->state_id)->get(["name", "id"]);
        return response()->json($data);        
    }
    public function getmodelBybrand(Request $request){
        $data['models'] = AutoModels::where("brand_id",$request->brand_id)->get(["name","id"]);
        return response()->json($data);   
    }
    public function getcityBystate(Request $request){
        $data['models'] = Cities::where("state_id",$request->state_id)->get(["name","id"]);
        return response()->json($data);   
    }
    public function getdealerbycat(Request $request){
        $category = Categories::where('slug',$request->category_id)->first();
        $dealersships = Listing::where('category_id',$category->id)->pluck('uploaded_by')->toArray();
        $data['dealers'] = Dealers::whereIn('user_id', $dealersships)->get();
        return response()->json($data);   
    }
    public function webadpost(){
        if(Auth::check()){
            return view('frontend.webadpost');
        }else{
             session(['link' => url()->previous()]);
             return view('frontend.web-login');
        }
    }
    public function webpostaddstore(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'title' => 'required',
            'descriptions' => 'required',
            'category_id' => 'required',
            'location' => 'required',
            'auto_condition' => 'required',
            'price' => 'required',
            'phone' => 'required',
            'image' => 'required',
            'document_id' => 'required',
        ]);     
        $listing = new Listing;
        $listing->title = $request->title;
        $listing->mmcode = rand('11111111','99999999');
        $listing->descriptions = $request->descriptions;
        $listing->uploaded_by = auth()->user()->id;
        $listing->category_id = $request->category_id;

        $listing->auto_condition = $request->auto_condition;
        $listing->location = $request->location;

        $listing->price = $request->price;
        $listing->phone = $request->phone;
        $listing->status = 1;
        $listing->start_date = date('Y-m-d');
        $listing->end_date = date("Y-m-d", strtotime('+30' , strtotime(date('Y-m-d'))));
        $listing->is_ad = 1;
        
        
        if($request->image != ''){        
            $path = public_path().'/uploads/listings/';
            //upload new file
            $file = $request->image;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $listing->feature_image = $filename;
        }     
        if($request->document_id != ''){        
            $path = public_path().'/uploads/listingsdocs/';
            //upload new file
            $file = $request->document_id;
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $listing->document_id = $filename;
        }     
        $listing->save();
        return redirect('webadpost/success');
    }
    public function favListing(){
        if(Auth::check()){
            $favlisting = Favorite::with('listing')->where('user_id',auth()->user()->id)->get();
            return view('frontend.favlisting',compact('favlisting'));
        }else{
             session(['link' => url()->previous()]);
             return view('frontend.web-login');
        }
    }
    public function webadpostsuccess(){
        return view('frontend.webadpost-success');
    }
    public function postReview(Request $request,$id){
        if(Auth::check()){
            $review = new ListingReview;
            $review->user_id = auth()->user()->id;
            $review->listing_id = $id;
            $review->stars = 4;
            $review->text = $request->text;   
            $review->save();
            return redirect()->back()->with('success','Your review successfully submitted');
        }else{
             session(['link' => url()->previous()]);
             return view('frontend.web-login');
        }
    }
    public function postdealerReview(Request $request,$id){
        if(Auth::check()){
            $review = new DealersReview;
            $review->user_id = auth()->user()->id;
            $review->dealer_id = $id;
            $review->stars = 4;
            $review->text = $request->text;   
            $review->save();
            return redirect()->back()->with('success','Your review successfully submitted');
        }else{
             session(['link' => url()->previous()]);
             return view('frontend.web-login');
        }
    }
    public function submitinquiry(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'listingid' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'radio' => 'required'
        ]);     
        $listingdata = Listing::with('user')->where('id',$request->listingid)->first();
        $inquiry = new ListingInquiry;
        $inquiry->listing_id = $request->listingid;
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->message = $request->message;
        $inquiry->cash_or_finance = $request->radio;
        $inquiry->licence = ($request->license) ? '1' : '0';
        $inquiry->blanklist = ($request->blanklist) ? '1' : '0';
        $inquiry->insurance = ($request->insurance) ? '1' : '0';
        $inquiry->notify = ($request->notify) ? '1' : '0';
        $inquiry->save();
        $data = array('name'=>$request->name, 'email'=> $request->email, 'phone' => $request->phone, 'messages' => $request->message, 'cash_or_finance' => $request->radio);
        Mail::send('emails.sendinquiry', $data, function($message) {
             $message->to('arslanuog53@gmail.com', 'List & Sell')->subject('List & Sell Inquiry Request');
        });  
        $messageString = 'Name: '.$request->name.'%0aEmail:'.$request->email.'%0aPhone:'.$request->phone.'%0aMessage:'.$request->message.'%0aCash of Finance:'.$request->radio;
        $mobileNumber = $listingdata->user->phone;
        return redirect()->away('https://api.whatsapp.com/send?text='.$messageString.'&phone='.$mobileNumber);
    }
    public function submitcallback(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'listingid' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'time' => 'required'
        ]);     
        $listingdata = Listing::with('user')->where('id',$request->listingid)->first();
        $inquiry = new ListingCallBack;
        $inquiry->listing_id = $request->listingid;
        $inquiry->name = $request->name;
        $inquiry->email = $request->email;
        $inquiry->phone = $request->phone;
        $inquiry->time = $request->time;
        $inquiry->insurance = ($request->insurance) ? '1' : '0';
        $inquiry->notify = ($request->notify) ? '1' : '0';
        $inquiry->save();
        $data = array('name'=>$request->name, 'email'=> $request->email, 'phone' => $request->phone, 'time' => $request->time);
        Mail::send('emails.callbackrequest', $data, function($message) {
             $message->to('arslanuog53@gmail.com', 'List & Sell')->subject('List & Sell Call Back Request');
        });  
        $messageString = 'Name: '.$request->name;
        $mobileNumber = $listingdata->user->phone;
        return redirect()->away('https://api.whatsapp.com/send?text='.$messageString.'&phone='.$mobileNumber);
    }
    public function facebookleads(Request $request){
        $leadData = $request->all();
        print_r($leadData);
    }
}
