<?php

namespace App\Http\Controllers;

use App\Trip;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Request;

class SearchController extends Controller
{
  public function filter(Request $request) {
    // Sets the parameters from the get request to the variables.
    if($request->has('area')) {
      $area = get('area');

      // Perform the query using Query Builder
      $trips = DB::table('trips')
          ->select(DB::raw("*"))
          ->where('destination_id', '=', $area)
          ->get();

      return $trips;
    }
  }
}
