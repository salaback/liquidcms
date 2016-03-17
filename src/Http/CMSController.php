<?php

namespace Salaback\LiquidCMS\Http;

use App\Http\Controllers\Controller;
use CityNexus\CityNexus\Property;
use CityNexus\CityNexus\DatasetQuery;
use CityNexus\CityNexus\GenerateScore;
use CityNexus\CityNexus\Score;
use CityNexus\CityNexus\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use CityNexus\CityNexus\Table;
use CityNexus\CityNexus\ScoreBuilder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Salaback\LiquidCMS\Route;


class CMSController extends Controller
{
    public function postCreatePage(Request $request)
    {

    }

}