<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
		include_once("./../db_info.php");
		include_once("./../MySQLConnector.php");
		$db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);

        $shop_f_code = "";
		if(isset($_REQUEST['shop_f_code']))
			$shop_f_code = strtoupper($_REQUEST['shop_f_code']);

		$product_f_code = "";
		if(isset($_REQUEST['product_f_code']))
			$product_f_code = strtoupper($_REQUEST['product_f_code']);

        if($shop_f_code != "" && $product_f_code != "")
        {
            $data = array();
            $data['price.unit'] = 0;
            if($db_connector->JoinGetRows($data, "WHERE client_shop.i_group = price.i_group AND price.i_product = product.ID AND product.f_code = '$product_f_code' AND client_shop.f_code = '$shop_f_code'", "product, price, client_shop") > 0)
            {
                echo $global_zzz[$data[0]['price.unit']];
            }
            else
                echo "---";
        }
        else
            echo "---";
?>
