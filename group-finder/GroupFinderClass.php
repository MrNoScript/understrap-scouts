<?php
/**
 * Group Finder Helper
 * 
 * @package understrap
 * @author Tom Roberts
 */

defined('ABSPATH') || die();

class GroupFinder {
    public function get_location_from_postcode(string $postcode){
        $result = file_get_contents("https://api.postcodes.io/postcodes/{$postcode}");
        return json_decode($result)->result;
    }

    public function groups(){
        return unserialize(file_get_contents(__DIR__ . '/groups.dat'));
    }

    public function lookup($lat, $lng, $take = null){
        $groups = $this->groups();

        foreach($groups as &$group){
            
            $group->distance = $this->distance_to($lat, $lng, $group->loc->lat, $group->loc->lng);
        }

        usort($groups, function($a, $b){
            if ($a->distance == $b->distance)
                return 0;
            return ($a->distance < $b->distance) ? -1 : 1;
        });
        
        if($take === null){
            return array_values($groups);
        }

        $values = array_values($groups);
        return array_slice($values, 0, $take);
    }

    private function distance_to($lat1, $lng1, $lat2, $lng2, $unit = 'K'){
        if (($lat1 == $lat2) && ($lng1 == $lng2)) {
            return 0;
        } else {
            $theta = $lng1 - $lng2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);
            $out;
            if ($unit == "K") {
                $out = ($miles * 1.609344);
            } else if ($unit == "N") {
                $out = ($miles * 0.8684);
            } else {
                $out = $miles;
            }
            return round($out, 1);
        }
    }
}



function get_location_from_postcode(string $postcode){
    $url = "https://api.postcodes.io/postcodes/" . $postcode;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);

    return json_decode($output);

}
