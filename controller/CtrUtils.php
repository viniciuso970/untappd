<?php

class CtrUtils {

	public static function printMsg() {
		if(isset($_GET['msg'])) {
            return $_GET['msg'];
        }
        return '';
	}
}

?>
