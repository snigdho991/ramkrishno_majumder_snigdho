<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IpChecker;

class ProblemSolverController extends Controller
{
	public function __construct() {
        $this->ipchecker = new IpChecker();
    }

	public function problem_one_solution()
	{
		$ch = curl_init('http://103.219.147.17/api/json.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$response = curl_exec($ch);
		curl_close($ch);

		//dd(json_decode($response));
		$word = 'speed=';

		foreach (json_decode($response) as $key => $value) {
			echo 'Total: (int)"Total count of the speeds those crossed 60" <br><br> List:';
			$get_array = explode(", ", $value);
			$matches = array_filter($get_array, function($var) use ($word) { return preg_match("/\b$word\b/i", $var); });
			//dd($matches);

			foreach ($matches as $k => $match) {
				$number = filter_var($match, FILTER_SANITIZE_NUMBER_INT);
			
				if($number > 60) {
					echo '<br>'.$number;
				}
			}

		}
	}

	public function problem_two_solution()
	{
		$array = array('0'=>'z1', '1'=>'Z10', '2'=>'z12', '3'=>'Z2', '4'=>'z3');

		natcasesort($array);
		
		//var_export($array);
		echo "<pre>";
			var_export($array);
		echo "</pre>";
	}

	public function problem_three_solution() 
	{
	    $ip_check = $this->ipchecker->checkIpAddress($ip = '192.168.0.1'); 
	    return $ip_check;
	}
}
