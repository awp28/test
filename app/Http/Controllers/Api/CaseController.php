<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CaseResource;
use App\Models\CovidCase;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index()
    {
        return CaseResource::collection(Cache::remember('cases', 60*60*24, function () {
            return CovidCase::all();
        }));
    }
}
