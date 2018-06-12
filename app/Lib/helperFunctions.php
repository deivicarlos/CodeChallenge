<?php

  if ( ! function_exists('getFactorial')) {  
  
    /**
     * Return true if the distance between the given latitudes 
     * and longitudes is less then 50m.
     *
     * @param $lat1, $lon2, $lat2, $lon2
     * @return boolean
     */
    function distance($lat1, $lon1, $lat2, $lon2) {
      $theta = $lon1 - $lon2;
      $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
      $dist = acos($dist);
      $dist = rad2deg($dist);
      $miles = $dist * 60 * 1.1515 * 0.8684;
      
      if ($miles < 50) {
        return true;
      }
      return false;
    }
  }
