<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CaseResource;
use App\Models\CovidCase;
use App\Models\User;
use App\scopes\AncientScope;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaseController extends Controller
{
    public function index()
    {

            //  1-usul
//        return CaseResource::collection(Cache::remember('cases', 60*5, function () {
//            return CovidCase::paginate(10);
//        }));

//--------------------------------------------------------------------------------------------------------------------
//            //  2-usul
//        $names = Cache::remember('cases', 60*60*24, function () {
//            return CovidCase::all();
//        })->reject(function ($item) {
//            return $item->cases == 1;
//        })->map(function ($item) {
//            return [
//                'cases' => $item->cases,
//                'report_date' => $item->report_date->format('m/d/Y')
//            ];
//        });
//        return $names;
//--------------------------------------------------------------------------------------------------------------------

        // diff   intersect   except
//        $diff = CovidCase::all()->diff(CovidCase::whereIn('id', [1, 2, 3, 4, 5, 6, 7, 8])->get());
//        $intersect = CovidCase::all()->intersect(CovidCase::whereIn('id', [1, 2, 3, 4, 5])->get());
//        return CovidCase::all()->except([6,7]);

//--------------------------------------------------------------------------------------------------------------------
        //Applying Global Scopes
//        $global_scopes = CovidCase::all();
//        $without_global_scopes = CovidCase::withoutGlobalScope(AncientScope::class)->get();
//        return $global_scopes;

//--------------------------------------------------------------------------------------------------------------------
        //Utilizing A Local Scope
//        $scopes = CovidCase::popular()->active()->orderBy('created_at')->get();
//        return $scopes;

//--------------------------------------------------------------------------------------------------------------------
        //Dynamic Scopes
//        $dynamic_scopes = CovidCase::ofType('admin')->get();
//        return $dynamic_scopes;

//--------------------------------------------------------------------------------------------------------------------
            //Defining An Accessor

        $user = CovidCase::withoutGlobalScope(AncientScope::class)->get();


        return $user;
    }
}
