<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Listing;
use App\Models\Categories;
use App\Models\PersonalSiteLead;
use Carbon\Carbon;
use DB;
class BackendController extends Controller
{
    public function index(){
      $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $users->keys();
        $data = $users->values();
        $personalsite = array(
            "alltime" => PersonalSiteLead::count(),
            "yesterday" => PersonalSiteLead::whereDate('created_at',Carbon::yesterday())->count(),
            "currentweek" => PersonalSiteLead::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count(),
            "lastweek" => PersonalSiteLead::whereBetween('created_at', [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()])->count(),
            "thismonth" => PersonalSiteLead::whereMonth('created_at', Carbon::now()->month)->count(),
            "lastmonth" => PersonalSiteLead::whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])->count(),
            "thisyear" => PersonalSiteLead::whereYear('created_at', Carbon::now()->year)->count(),
            "today" => PersonalSiteLead::whereDate('created_at', Carbon::today())->count(),
        );
        $catcount = Categories::count();
        $listingcount = Listing::where('status',1)->count();
        return view('backend.dashboard', compact('labels', 'data','personalsite','listingcount','catcount'));
    }

}
