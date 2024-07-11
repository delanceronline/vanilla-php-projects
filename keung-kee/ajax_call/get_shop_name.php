<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
		include_once("./../db_info.php");
		include_once("./../MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

		$f_code = "";
		if(isset($_REQUEST['f_code']))
			$f_code = strtoupper($_REQUEST['f_code']);

        if($f_code != "")
        {
            $data = array();
            if($db_connector->GetOneRow($data, "WHERE f_code = '$f_code'", "client_shop"))
                echo $data['shop_name'];
            else
                echo "---";
        }
        else
            echo "---";
?>
