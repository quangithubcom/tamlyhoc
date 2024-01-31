<?php
function ip_wifi(){
		    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		        //check ip from share internet
		        $ip = $_SERVER['HTTP_CLIENT_IP'];
		    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		        //to check ip is pass from proxy
		        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    }else{
		        $ip = $_SERVER['REMOTE_ADDR'];
		    }
		    return $ip;
		}
function convert_number_to_words($number) {	
		$hyphen      = ' ';
		$conjunction = ' ';
		$separator   = ' ';
		$negative    = 'âm ';
		$decimal     = ' phẩy ';
		$one		 = 'mốt';
		$ten         = 'lẻ';
		$dictionary  = array(
		0                   => 'Không',
		1                   => 'Một',
		2                   => 'Hai',
		3                   => 'Ba',
		4                   => 'Bốn',
		5                   => 'Năm',
		6                   => 'Sáu',
		7                   => 'Bảy',
		8                   => 'Tám',
		9                   => 'Chín',
		10                  => 'Mười',
		11                  => 'Mười một',
		12                  => 'Mười hai',
		13                  => 'Mười ba',
		14                  => 'Mười bốn',
		15                  => 'Mười lăm',
		16                  => 'Mười sáu',
		17                  => 'Mười bảy',
		18                  => 'Mười tám',
		19                  => 'Mười chín',
		20                  => 'Hai mươi',
		30                  => 'Ba mươi',
		40                  => 'Bốn mươi',
		50                  => 'Năm mươi',
		60                  => 'Sáu mươi',
		70                  => 'Bảy mươi',
		80                  => 'Tám mươi',
		90                  => 'Chín mươi',
		100                 => 'trăm',
		1000                => 'ngàn',
		1000000             => 'triệu',
		1000000000          => 'tỷ',
		1000000000000       => 'nghìn tỷ',
		1000000000000000    => 'ngàn triệu triệu',
		1000000000000000000 => 'tỷ tỷ'
		);
		 
		if (!is_numeric($number)) {
			return false;
		}
		 
		// if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
		// 	// overflow
		// 	trigger_error(
		// 	'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
		// 	E_USER_WARNING
		// 	);
		// 	return false;
		// }
		 
		if ($number < 0) {
			return $negative . convert_number_to_words(abs($number));
		}
		 
		$string = $fraction = null;
		 
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
		 
		switch (true) {
			case $number < 21:
				$string = $dictionary[$number];
			break;
			case $number < 100:
				$tens   = ((int) ($number / 10)) * 10;
				$units  = $number % 10;
				$string = $dictionary[$tens];
				if ($units) {
					$string .= strtolower( $hyphen . ($units==1?$one:$dictionary[$units]) );
				}
			break;
			case $number < 1000:
				$hundreds  = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if ($remainder) {
					$string .= strtolower( $conjunction . ($remainder<10?$ten.$hyphen:null) . convert_number_to_words($remainder) );
				}
			break;
			default:
				$baseUnit = pow(1000, floor(log($number, 1000)));
				$numBaseUnits = (int) ($number / $baseUnit);
				$remainder = $number - ($numBaseUnits*$baseUnit);
				$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
				if ($remainder) {
					$string .= strtolower( $remainder < 100 ? $conjunction : $separator );
					$string .= strtolower( convert_number_to_words($remainder) );
				}
			break;
		}
		 
		if (null !== $fraction && is_numeric($fraction)) {
			$string .= $decimal;
			$words = array();
			foreach (str_split((string) $fraction) as $number) {
				$words[] = $dictionary[$number];
			}
			$string .= implode(' ', $words);
		}
		 
		return $string;
	}

	function sw_get_current_weekday($ngay,$thang,$nam) {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngay = $thang.'/'.$ngay.'/'.$nam;
    $sttime = strtotime(date($ngay));
    $weekday = date("l", $sttime);
    $weekday = strtolower($weekday);
    switch($weekday) {
        case 'monday':
            $weekday = 'Thứ hai';
            break;
        case 'tuesday':
            $weekday = 'Thứ ba';
            break;
        case 'wednesday':
            $weekday = 'Thứ tư';
            break;
        case 'thursday':
            $weekday = 'Thứ năm';
            break;
        case 'friday':
            $weekday = 'Thứ sáu';
            break;
        case 'saturday':
            $weekday = 'Thứ bảy';
            break;
        default:
            $weekday = 'Chủ nhật';
            break;
    }
    return $weekday;
}

function number_month($t,$year) {
	$d;
	switch ($t) {
	    case 1:
	    case 3:
	    case 5:
	    case 7:
	    case 8:
	    case 10:
	    case 12:
	        $d    = 31;
	        break;
	    case 4:
	    case 6:
	    case 9:
	    case 11:
	        $d    = 30;
	        break;
	    case 2:
	        if( $year % 100 != 0 && $year % 4 == 0 ) {
	            $d    = 29;
	        } else {
	            $d    = 28;
	        }
	        break;
	    default: $d    = 0;
	}
	return $d;
}

function convert_gio($time1,$time2){
	$diff = abs($time2 - $time1);
	$hours = floor(($diff) / (60*60));
	$minutes = floor(($diff -  $hours*60*60) / 60);
	if ($hours >= 4) {
		$loai1 = 'Đ';
	}else{
		$loai1 = "TH";
	}
	return $hours."h, ".$minutes."p"."<br>".$loai1;
}

function convert_gio_ne($time1,$time2){
	$diff = abs($time2 - $time1);
	$hours = floor(($diff) / (60*60));
	$minutes = floor(($diff -  $hours*60*60) / 60);
	return ($hours * 60 * 60) + ($minutes * 60);
}

function convert_gio_one_time($time1){
	$diff = abs($time1);
	$hours = floor(($diff) / (60*60));
	$minutes = floor(($diff -  $hours*60*60) / 60);
	return $hours."h, ".$minutes."p";
}