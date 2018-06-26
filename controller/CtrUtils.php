<?php

class CtrUtils {

	public static function printMsg() {
		if(isset($_GET['msg'])) {
            return $_GET['msg'];
        }
        return '';
	}
	
	public static function isBadge($badge) {
		if($badge > 0) {
			return "";
		}
		return "filter: grayscale(100%);";
	}
}

?>
