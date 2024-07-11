<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<?php    

    $ic = 0;
    if(isset($_REQUEST['ic']))
        $ic = intval($_REQUEST['ic']);

    if($ic > 0)
    {
        include_once("db_info.php");
        include_once("MySQLConnector.php");
        $db_connector = new TMySQLConnector($global_db_adress, $global_db, $global_db_user, $global_db_pass);
        
        for($i = 0; $i < $ic; $i++)
        {
            // for each invoice

            $num_items = 0;
            if(isset($_REQUEST['i'.$i]))
            {
				$invoice_no = $_REQUEST['i'.$i];
				$db_connector->Delete("WHERE ID = $invoice_no", "invoice");
				$db_connector->Delete("WHERE i_invoice = $invoice_no", "invoice_item");				
            }
        }
        
    }

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
    <br /><br />
    <p>已選發票已被刪除．</p>
    <p><a href="main.php">按此返回主頁</a></p>
    </body>
</html>
