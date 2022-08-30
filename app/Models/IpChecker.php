<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpChecker extends Model
{
    use HasFactory;

    public function checkIpAddress($ip) {

    	if(!$ip or strlen(trim($ip)) == 0){
	        return 'FALSE';
	    }

	    $ip = trim($ip);

	    if (preg_match("/^[0-9]{1,3}(.[0-9]{1,3}){3}$/", $ip)) {
	    	$ip_array = explode(".", $ip);

	    	if (sizeof($ip_array) == 4) {

			        foreach($ip_array as $block) {
			            if ($block < 0 || $block > 255 ) {
			                return 'FALSE';
			            }
			        }

		        return 'TRUE';
		    } else {
		    	return 'FALSE';
		    }
	    }
	    return 'FALSE';
    }
}
