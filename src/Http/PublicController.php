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


class PublicController extends Controller
{
    public function getIndex($a = null, $b = null, $c = null, $d = null, $e = null, $f = null)
    {
        $slugs = [$a, $b, $c, $d, $e, $f, 'null'];

        $route = $this->findRoute($slugs);

        if($route == 404)
        {
            if(Auth::getUser() && Auth::getUser()->admin == true)
            {

            }
            else{
                return response('Route does not exist', 404);
            }
        }

        return view('liquid::' . $route->template)
            ->with('page', $route->page);
    }


    private function findRoute($slugs)
    {
        $return = null;
        // Check each slug for existing route info
        foreach($slugs as $depth => $slug)
        {
            // If there is a slug at this depth
            if($slug != null)
            {
                // Find the first route of the same slug and depth

                $route = Route::where('slug', $slug)->where('depth', $depth)->first();

                // If no route exists matching the slug and depth return a 404 error
                if($route == null)
                {
                    $return = 404;
                }

                // If a route does exist, save it to the return variable and start the loop at the next depth
                else
                {
                 $return = $route;
                }
            }

            // If there is no slug, return the last route model found.
            else
            {
                return $return;
            }
        }
    }

}