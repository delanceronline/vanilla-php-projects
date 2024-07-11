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
			$f_code = $_REQUEST['f_code'];

        $bHasAll = false;
        if(isset($_REQUEST['all']))
            $bHasAll = true;

        if($f_code != "")
        {
            $data = array();
            $data['client_department.department_name'] = "";
            $data['client_department.code'] = "";
            $data['client_department.ID'] = "";
            $db_connector->JoinGetRows($data, "WHERE client_shop.f_code = '$f_code' AND shop_dept.i_dept = client_department.ID AND shop_dept.i_shop = client_shop.ID", "client_shop, client_department, shop_dept");

            if(count($data) > 0)
            {
?>
<select name="department_id" id="department_id">
<?php
    if($bHasAll == true)
    {
?>
    <option value = "0">所有</option>
<?php
    }

    foreach($data as $single)
    {
?>
    <option value="<?php echo $single['client_department.ID']; ?>"><?php echo $single['client_department.code']." ".$single['client_department.department_name']; ?></option>
<?php
			}
?>
</select>
<?php
            }
            else
                echo '<select id="department_id" name="department_id"><option value="0">沒有</option></select>';
        }
        else
        {
            echo '<select id="department_id" name="department_id"><option value="0">沒有</option></select>';
        }
?>
