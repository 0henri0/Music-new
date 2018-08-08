<?php
// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/string.php"
// ]

// Chạy cmd : composer  dumpautoload
// 
function cutString($str, $num){
	if($num < strlen($str)){
		$i = $num;
		while($str[$i] != ' '){
			$i--;
			if($i <= 0) return substr($str, 0, $num);
		}
		$subs = substr($str, 0, $i);	
		return $subs .'...';
	}

	return $str ;
}
?>