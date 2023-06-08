<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BodyTypeController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\ModelController;
use App\Http\Controllers\Backend\EquipmentsController;
use App\Http\Controllers\Backend\ListingController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\Backend\DealersController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\LeadsController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\AdsSubscriptionsController;
use App\Http\Controllers\Backend\MarqueeNewsController;
use App\Http\Controllers\Backend\Dealer\DealerController;
use App\Http\Controllers\Backend\Dealer\DealerListingController;
use App\Http\Controllers\Backend\PrivateSeller\PrivateSellerController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BackendPartsController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\FavController;
use App\Http\Controllers\Frontend\PartsController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Backend\AdsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [FrontendController::class,'index'])->name('homepage');
Route::get('/dealerships', [FrontendController::class,'dealerships'])->name('dealerships');
Route::get('/dealership-detail/{slug}', [FrontendController::class,'dealershipDetail'])->name('dealership-detail');
Route::get('/auto-detail/{id}', [FrontendController::class,'autoDetail'])->name('auto-detail');
Route::get('/listing', [FrontendController::class,'listing'])->name('listing');
Route::get('/deallisting', [FrontendController::class,'deallisting'])->name('deallisting');
Route::post('/listingbybrand', [FrontendController::class,'listingbybrand'])->name('listingbybrand');
Route::get('/grid', [FrontendController::class,'grid'])->name('grid');
Route::get('/parts', [FrontendController::class,'parts'])->name('parts');
Route::get('/custom', [FrontendController::class,'custom'])->name('custom');
Route::post('/modelbybrand', [FrontendController::class,'getmodelBybrand'])->name('get-model-by-brand');
Route::post('/citybystate', [FrontendController::class,'getcityBystate'])->name('get-city-by-state');
Route::post('/getdealerbycat', [FrontendController::class,'getdealerbycat'])->name('get-dealer-by-cat');

Route::get('/compare/parts', [FrontendController::class,'comparePart'])->name('compare-parts');
Route::get('/shopping-cart', [FrontendController::class,'shoppingCart'])->name('shoppingCart');
Route::get('/checkout', [FrontendController::class,'checkOut'])->name('checkOut');
Route::get('/register', [FrontendController::class,'register'])->name('register');
Route::get('/webLogin', [FrontendController::class,'webLogin'])->name('webLogin');
Route::get('/weblogout', [AuthController::class,'weblogout'])->name('weblogout');
Route::get('/webadpost', [FrontendController::class,'webadpost'])->name('webadpost');
Route::get('/webadpost/success', [FrontendController::class,'webadpostsuccess'])->name('webadpostsuccess');
Route::post('/webpostadd/store', [FrontendController::class,'webpostaddstore'])->name('webpostadd-store');
Route::post('/fetch-cities', [FrontendController::class,'fetchcities'])->name('fetch-cities');
Route::get('/dealerLogin', [AuthController::class,'dealerLogin'])->name('dealerLogin');
Route::get('/dealerRegister', [AuthController::class,'dealerRegister'])->name('dealerRegister');
Route::post('/registerdealerindb', [AuthController::class,'registerdealerindb'])->name('registerdealer-indb');
Route::get('/forgot-password', [FrontendController::class,'forgotPassword'])->name('forgot-password');
Route::get('/create-acccount', [FrontendController::class,'createAcccount'])->name('create-acccount');
Route::post('/register', [AuthController::class,'register'])->name('register');
Route::post('/logincheck', [AuthController::class,'logincheck'])->name('logincheck');
Route::post('/logindealercheck', [AuthController::class,'logindealercheck'])->name('logindealercheck');

// Common Route
Route::get('/contact-us', [FrontendController::class,'contactus'])->name('contact-us');
Route::get('/dealer-advertising', [FrontendController::class,'dealeradvertising'])->name('dealer-advertising');
Route::get('/term-of-use', [FrontendController::class,'termofuse'])->name('term-of-use');
Route::get('/support', [FrontendController::class,'support'])->name('support');
Route::get('/paia-manual', [FrontendController::class,'paiaManual'])->name('paia-manual');
Route::get('/email-disclaimer', [FrontendController::class,'emailDisclaimer'])->name('email-disclaimer');

// Parts & Cart
Route::get('cart', [PartsController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [PartsController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [PartsController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [PartsController::class, 'remove'])->name('remove.from.cart');

// Compare Routes
Route::get('compare-cars', [CompareController::class,'compareCars'])->name('compare-cars');
Route::post('compare-car-store', [CompareController::class,'storecar'])->name('compare-car-store');
Route::post('compare-part-store', [CompareController::class,'storepart'])->name('compare-part-store');
Route::get('compare-car/{listingid}', [CompareController::class,'destroycar'])->name('compare-car-destroy');
// Fav Routes
Route::post('listing-fav-store', [FavController::class,'listingfavstore'])->name('listing-fav-store');
Route::post('listing-fav-remove', [FavController::class,'listingfavremove'])->name('listing-fav-remove');

// New Car Guide
Route::get('new-cars', [FrontendController::class,'newCars'])->name('new-cars');
Route::get('cheapest-new-cars-in-south-africa', [FrontendController::class,'cheapestNewCars'])->name('cheapest-new-cars-in-south-africa');
// Special Deals
Route::get('car-specials', [FrontendController::class,'carSpecials'])->name('car-specials');
Route::get('new-car-deals', [FrontendController::class,'newcarDeals'])->name('new-car-deals');
Route::get('used-car-deals', [FrontendController::class,'usedcarDeals'])->name('used-car-deals');
Route::get('demo-car-for-sale', [FrontendController::class,'democarsForsale'])->name('demo-car-for-sale');

Route::get('/admin', [AuthController::class,'adminlogin'])->name('login');
Route::get('/adminlogout', [AuthController::class,'adminlogout'])->name('adminlogout');
Route::post('/checkadminlogin', [AuthController::class,'checkadminlogin'])->name('check-admin-login');

// Newsletter 
Route::get('newsletter',[NewsletterController::class,'index'])->name('newsletter');
Route::post('newsletter/store',[NewsletterController::class,'store'])->name('newsletter-store');

// Send Inquiry
Route::post('submit/inquiry',[FrontendController::class,'submitinquiry'])->name('submit-inquiry');
Route::post('submit/callback',[FrontendController::class,'submitcallback'])->name('submit-callback');
Route::get('facebook/leads', [FrontendController::class,'facebookleads']);
Route::middleware('auth')->group( function () {
    // Ads
    Route::get('/ads/datatables', [AdsController::class,'datatables'])->name('ads-datatables');
    Route::get('ads', [AdsController::class,'index'])->name('ads');
    Route::get('ads/status/{id}/{status}', [AdsController::class,'status'])->name('ads-status');
    
    Route::get('favorite', [FrontendController::class,'favListing'])->name('fav-listing');
    Route::post('post/review/{id}', [FrontendController::class,'postReview'])->name('post-review');
    Route::post('post/dealer/review/{id}', [FrontendController::class,'postdealerReview'])->name('post-dealer-review');
    // Dashboard
    Route::get('admin/profile', [BackendController::class,'profile'])->name('admin.profile');
    Route::get('/dashboard', [BackendController::class,'index'])->name('dashboard');
    Route::get('/dealer-dashboard', [DealerController::class,'index'])->name('dealer-dashboard');
    // Models
    Route::get('/models/datatables', [ModelController::class,'datatables'])->name('models-datatables');
    Route::get('/models', [ModelController::class,'index'])->name('models');
    Route::get('/model/create', [ModelController::class,'create'])->name('create-model');
    Route::post('/model/store', [ModelController::class,'store'])->name('store-model');
    Route::get('/model/edit/{id}', [ModelController::class,'edit'])->name('edit-model');
    Route::post('/model/update/{id}', [ModelController::class,'update'])->name('update-model');
    Route::get('/model/delete/{id}', [ModelController::class,'delete'])->name('delete-model');
    // Equipments
    Route::get('/equipments/datatables', [EquipmentsController::class,'datatables'])->name('equipments-datatables');
    Route::get('/equipments', [EquipmentsController::class,'index'])->name('equipments');
    Route::get('/equipment/create', [EquipmentsController::class,'create'])->name('create-equipment');
    Route::post('/equipment/store', [EquipmentsController::class,'store'])->name('store-equipment');
    Route::get('/equipment/edit/{id}', [EquipmentsController::class,'edit'])->name('edit-equipment');
    Route::post('/equipment/update/{id}', [EquipmentsController::class,'update'])->name('update-equipment');
    Route::get('/equipment/delete/{id}', [EquipmentsController::class,'delete'])->name('delete-equipment');
    // Listings
    Route::get('/listings/datatables/{id}', [ListingController::class,'datatables'])->name('listing-datatables');
    Route::get('/listings/{id}', [ListingController::class,'index'])->name('listings');
    Route::post('/updategalleryimageorder', [ListingController::class,'updategalleryimageorder'])->name('updategalleryimageorder');
    Route::get('/listing/create', [ListingController::class,'create'])->name('create-listing');
    Route::get('/listing/edit/{id}', [ListingController::class,'edit'])->name('edit-listing');
    Route::post('/listing/update/{id}', [ListingController::class,'update'])->name('update-listing');
    Route::post('/listing/delete/{id}', [ListingController::class,'delete'])->name('delete-listing');
    Route::post('/listing/store', [ListingController::class,'store'])->name('store-listing');
    Route::post('/listing/paynow', [ListingController::class,'paynow'])->name('paynow');
    Route::post('/listing/converttospecialdeal', [ListingController::class,'converttospecialdeal'])->name('converttospecialdeal');
    Route::get('/indeals', [ListingController::class,'indeals'])->name('indeals');
    Route::get('/listings/datatablesofdeals/{id}', [ListingController::class,'datatablesofdeals'])->name('listing-datatablesofdeals');
    
    // Brands
    Route::get('/brands/datatables', [BrandsController::class,'datatables'])->name('brands-datatables');
    Route::get('/brands', [BrandsController::class,'index'])->name('manage-brands');
    Route::get('/brand/create', [BrandsController::class,'create'])->name('create-brand');
    Route::post('/brand/store', [BrandsController::class,'store'])->name('store-brand');
    Route::get('/brand/edit/{id}', [BrandsController::class,'edit'])->name('edit-brand');
    Route::post('/brand/update/{id}', [BrandsController::class,'update'])->name('update-brand');
    Route::get('/brand/delete/{id}', [BrandsController::class,'delete'])->name('delete-brand');    
    // City
    Route::get('/city/datatables', [CityController::class,'datatables'])->name('city-datatables');
    Route::get('/city', [CityController::class,'index'])->name('manage-city');
    Route::get('/city/create', [CityController::class,'create'])->name('create-city');
    Route::post('/city/store', [CityController::class,'store'])->name('store-city');
    Route::get('/city/edit/{id}', [CityController::class,'edit'])->name('edit-city');
    Route::post('/city/update/{id}', [CityController::class,'update'])->name('update-city');
    Route::get('/city/delete/{id}', [CityController::class,'delete'])->name('delete-city');        
    
    // Users
    Route::get('/users/datatables', [UsersController::class,'datatables'])->name('users-datatables');
    Route::get('/manage/users', [UsersController::class,'index'])->name('manage-users');
    Route::get('/user/create', [UsersController::class,'create'])->name('create-user');
    Route::post('/user/store', [UsersController::class,'store'])->name('store-user');
    Route::get('/user/edit/{id}', [UsersController::class,'edit'])->name('edit-user');
    Route::post('/user/update/{id}', [UsersController::class,'update'])->name('update-user');
    Route::get('/user/delete/{id}', [UsersController::class,'delete'])->name('delete-user');      
    Route::get('user/status/{id}/{status}', [UsersController::class,'status'])->name('user-status');
    // Dealers
    Route::get('/dealers/datatables', [DealersController::class,'datatables'])->name('dealers-datatables');
    Route::get('/manage/dealers', [DealersController::class,'index'])->name('manage-dealers');
    Route::get('/dealer/create', [DealersController::class,'create'])->name('create-dealer');
    Route::post('/dealer/store', [DealersController::class,'store'])->name('store-dealer');
    Route::get('/dealer/edit/{id}', [DealersController::class,'edit'])->name('edit-dealer');
    Route::post('/dealer/update/{id}', [DealersController::class,'update'])->name('update-dealer');
    Route::get('/dealer/delete/{id}', [DealersController::class,'delete'])->name('delete-dealer');    
    Route::get('dealer/status/{id}/{status}', [DealersController::class,'status'])->name('dealer-status');
    // Categories 
    Route::get('/categories/datatables', [CategoriesController::class,'datatables'])->name('categories-datatables');
    Route::get('/categories', [CategoriesController::class,'index'])->name('categories');
    Route::get('/categories/create', [CategoriesController::class,'create'])->name('create-category');
    Route::post('/categories/store', [CategoriesController::class,'store'])->name('store-category');
    Route::get('/category/edit/{id}', [CategoriesController::class,'edit'])->name('edit-category');
    Route::post('/category/update/{id}', [CategoriesController::class,'update'])->name('update-category');
    Route::get('/category/delete/{id}', [CategoriesController::class,'delete'])->name('delete-category');
    
    // Body Types
    Route::get('/bodytypes/datatables', [BodyTypeController::class,'datatables'])->name('bodytypes-datatables');   
    Route::get('/body/types', [BodyTypeController::class,'index'])->name('body-types');
    Route::get('/bodytype/create', [BodyTypeController::class,'create'])->name('create-body-type');
    Route::post('/bodytype/store', [BodyTypeController::class,'store'])->name('store-body-type');
    Route::get('/bodytype/edit/{id}', [BodyTypeController::class,'edit'])->name('edit-body-type');
    Route::post('/bodytype/update/{id}', [BodyTypeController::class,'update'])->name('update-body-type');
    Route::get('/bodytype/delete/{id}', [BodyTypeController::class,'delete'])->name('delete-body-type');
    
    //Leads
    Route::get('/personal/site/leads', [LeadsController::class,'personalSiteLead'])->name('personal-site-leads');
    Route::get('/contactus/leads', [LeadsController::class,'contactusLeads'])->name('contactus-leads');
    Route::get('/compaigns/leads', [LeadsController::class,'compaignsleads'])->name('compaigns-leads');
    Route::get('/email/enquiries/leads', [LeadsController::class,'emailEnquiryLeads'])->name('email-enquiry-leads');
    Route::get('/callback/leads', [LeadsController::class,'callbackLeads'])->name('callback-leads');
    
    // Manage Slider
    Route::get('/manage/slider', [SliderController::class,'index'])->name('manage-sliders');
    Route::get('/create/slider', [SliderController::class,'create'])->name('create-slide');
    Route::post('/store/slider', [SliderController::class,'store'])->name('store-slider');
    Route::get('/slider/delete/{id}', [SliderController::class,'delete'])->name('delete-slider');
    Route::get('/slider/edit/{id}', [SliderController::class,'edit'])->name('edit-slider');
    Route::post('/slider/update/{id}', [SliderController::class,'update'])->name('update-slider');

    // Manage Marquee News
    Route::get('/manage/marqueenews', [MarqueeNewsController::class,'index'])->name('manage-marqueenews');
    Route::get('/create/marqueenews', [MarqueeNewsController::class,'create'])->name('create-marqueenews');
    Route::post('/store/marqueenews', [MarqueeNewsController::class,'store'])->name('store-marqueenews');
    Route::get('/marqueenews/delete/{id}', [MarqueeNewsController::class,'delete'])->name('delete-marqueenews');
    Route::get('/marqueenews/edit/{id}', [MarqueeNewsController::class,'edit'])->name('edit-marqueenews');
    Route::post('/marqueenews/update/{id}', [MarqueeNewsController::class,'update'])->name('update-marqueenews');
    
    // Manage Ads Subscriptions
    Route::get('/manage/adssubscriptions', [AdsSubscriptionsController::class,'index'])->name('manage-adssubscriptions');
    Route::get('/create/adssubscription', [AdsSubscriptionsController::class,'create'])->name('create-adssubscription');
    Route::post('/store/adssubscription', [AdsSubscriptionsController::class,'store'])->name('store-adssubscription');
    Route::get('/adssubscription/delete/{id}', [AdsSubscriptionsController::class,'delete'])->name('delete-adssubscription');
    Route::get('/adssubscription/edit/{id}', [AdsSubscriptionsController::class,'edit'])->name('edit-adssubscription');
    Route::post('/adssubscription/update/{id}', [AdsSubscriptionsController::class,'update'])->name('update-adssubscription');

    // Dealer Vendor
    
    // Dealer Profile
    Route::get('dealer/profile', [DealerController::class,'profile'])->name('dealer.profile');
    Route::post('dealer/update-dealer-profile', [DealerController::class,'updateProfile'])->name('update-dealer-profile');
    
    
    // User Private Seller
    Route::get('/myads', [PrivateSellerController::class,'myads'])->name('my-ads');    
    Route::get('/ad/edit/{id}', [PrivateSellerController::class,'adedit'])->name('ad-edit');    
    Route::get('/ad/deactivate/{id}', [PrivateSellerController::class,'addeactivate'])->name('ad-deactivate'); 
    Route::post('/webpostad/update', [FrontendController::class,'webpostadupdate'])->name('webpostadd-update');
    Route::get('/user/profile', [PrivateSellerController::class,'profile'])->name('my-profile');    
    Route::post('/update/user/profile', [PrivateSellerController::class,'updateProfile'])->name('update-user-profile');    
    
    // Auto Parts Routes
    Route::get('/parts/datatables', [BackendPartsController::class,'datatables'])->name('parts-datatables');   
    Route::get('/autoparts', [BackendPartsController::class,'index'])->name('autoparts');
    Route::get('/add/part',[BackendPartsController::class,'create'])->name('add-new-part');
    Route::post('/submit/addpart',[BackendPartsController::class,'store'])->name('submit-addpart');
    Route::post('/submit/updatepart/{id}',[BackendPartsController::class,'update'])->name('submit-updatepart');
    Route::get('/edit/part/{id}',[BackendPartsController::class,'edit'])->name('edit-part');
    Route::get('/delete/part/{id}',[BackendPartsController::class,'delete'])->name('delete-part');    
    
    
});
