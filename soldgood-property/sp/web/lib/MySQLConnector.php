<?php

class TMySQLConnector
{
	var $resource;
	var $locked_tables;
	
	function TMySQLConnector($db_server_location, $db_name, $login, $password)
	{
		$this->resource = mysql_connect($db_server_location, $login, $password);
		if($this->resource)
			mysql_select_db($db_name, $this->resource);
		else
			echo "Invalid DB information";
		
		$this->locked_tables = array();
		
		//register_shutdown_function(array(&$this, "__destruct"));
	}
	
	function __destruct()
	{
		if($this->resource)
			mysql_close($this->resource);
	}	
		
	function Execute($sql)
	{
		if($this->resource)
			return mysql_query($sql);
		else
			return 0;
	}
	
	function GetResultCount($result)
	{
		if($result)
			return mysql_num_rows($result);
					
		return 0;
	}
	
	function GetResults($result, &$outputs)
	{				
		if($result)
		{
			$outputs = array();
			
			$NumRows = mysql_num_rows($result);				
			for($j = 0; $j < $NumRows; $j++)
				$outputs[] = $this->_sqlf($result);
			
			return true;
		}
				
		return false;
	}
	
	function _sqlf($result)
	{
		$row = mysql_fetch_row($result);
		if($row === FALSE) return FALSE;
	   
		for ($i = 0; $i < mysql_num_fields($result); $i++) 
		{
			$meta = mysql_fetch_field($result, $i);
			
			//if($meta->table == "")
				$data[$meta->name] = $row[$i];
			//else		
				//$data[$meta->table . '.' . $meta->name] = $row[$i];
		}
		return $data;
	}	
	
	function GetOneRow(&$FieldData, $Condition, $TableName)
	{
		if($this->resource)
		{							
			if($Condition == "")
				$sql = "SELECT * FROM $TableName";
			else
				$sql = "SELECT * FROM $TableName $Condition";
	
			$result = mysql_query($sql);
			if($result)
			{
				$rrr = mysql_fetch_assoc($result);
				if($rrr == FALSE)
					return false;
					
				$FieldData = $rrr;
			}
			else
				return false;
		}
		else
			return false;
	
		return true;
	}	
	
	function JoinGetRows(&$field_data, $condition, $table_names, $distinct = FALSE)
	{
		$NumRows = 0;

		if($this->resource)
		{
			$key_names = array();
			
			$target = "";
			if($distinct == TRUE)
				$target = "DISTINCT ";
			
			$numKeys = 0;
			$bFound = false;
			foreach($field_data as $key => $val)
			{
				if(!$bFound)
				{
					$target = $target.$key;
					$bFound = true;			
				}
				else
					$target = $target.", ".$key;
				
				$key_names[$numKeys] = $key;
				$numKeys++;
			}
			
			if($condition == "")
				$sql = "SELECT $target FROM $table_names";
			else
				$sql = "SELECT $target FROM $table_names $condition";

			//echo $sql."<br>";
			
			$result = mysql_query($sql);
			if($result)
			{
				$field_data = array();								
				
				$NumRows = mysql_num_rows($result);				
				for($j = 0; $j < $NumRows; $j++)
				{							
					$row = mysql_fetch_row($result);					
					for($i = 0; $i < $numKeys; $i++)
						$keyRow[$key_names[$i]] = $row[$i];
												
					$field_data[$j] = $keyRow;
				}				
			}
			else
				return 0;
		}
		
		return $NumRows;		
	}
	
	function GetRows(&$field_data, $condition, $table_name)
	{
		$NumRows = 0;
		
		if($this->resource)
		{
			$target = "*";
			if(count($field_data) > 0)
			{
				$target = "";
				$bFound = false;
				foreach($field_data as $key => $val)
				{
					if(!$bFound)
					{
						$target = $target.$key;
						$bFound = true;					
					}
					else
						$target = $target.", ".$key;
				}
			}						
			
			if($condition == "")
				$sql = "SELECT $target FROM $table_name";
			else
				$sql = "SELECT $target FROM $table_name $condition";

			//echo $sql."<br>";
									
			$result = mysql_query($sql);
			if($result)
			{
				$field_data = array();								
				
				$NumRows = mysql_num_rows($result);
				for($j = 0; $j < $NumRows; $j++)
				{
					$row = mysql_fetch_assoc($result);
					$field_data[$j] = $row;
				}				
			}
			else
				return 0;
		}
		
		return $NumRows;
	}	
	
	function GetSum($field_name, $table_name, $condition)
	{
		if($this->resource)
		{
			if($condition == "")
				$sql = "SELECT SUM($field_name) FROM $table_name";
			else
				$sql = "SELECT SUM($field_name) FROM $table_name $condition";
		
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
			
			if($row[0] == "")
				return 0;
			else
				return $row[0];			
		}
		
		return -1;
	}
	
	function Insert(&$field_data, $table_name)
	{
		$ID = -1;
				
		if($this->resource)
		{
			$sql = "SELECT * FROM $table_name";
			$result = mysql_query($sql);						
			
			if($result)
			{
				$sql1 = "";
				$sql2 = "";
				
				$bFirst = true;
				foreach($field_data as $index => $val)
				{
					$pos = $this->GetFieldIndex($result, $index);
					
					//if($val != "" && $pos >= 0)
					if($pos >= 0)
					{
						$bChar = true;
						$FieldType = mysql_field_type($result, $pos);
						if($FieldType == "real" || $FieldType == "int")
							$bChar = false;
						
						if($bChar)
							$val = str_replace("'", "\'", $val);
						
						if($bFirst)
						{
							$sql1 = $sql1.$index;
							if($bChar)
								$sql2 = $sql2."'".$val."'";					
							else
								$sql2 = $sql2.$val;
						}
						else
						{				
							$sql1 = $sql1.", ".$index;
							if($bChar)
								$sql2 = $sql2.", "."'".$val."'";					
							else
								$sql2 = $sql2.", ".$val;															
						}
						
						$bFirst = false;
					}
				}
								
				if(!$bFirst)
				{
					$sql = "INSERT INTO $table_name (".$sql1.") VALUES (".$sql2.")";
					//echo $sql;
					$result = mysql_query($sql);
					
					if(!$result)
					{
						echo "Error to insert into DB!<br>";
						return -1;
					}
					
					$ID = mysql_insert_id();
				}
			}
			else
			{
				echo "Error to get access to DB or table name invalid!<br>";		
				return -1;
			}
		}
			
		return $ID;
	}	
	
	function JoinDelete($DeleteTableNames, $Condition, $TableNames)
	{
		if($Condition == "")
			return false;
		
		if($this->resource)
		{
			$sql = "DELETE $DeleteTableNames FROM $TableNames $Condition";
			
			$result = mysql_query($sql);
			if($result)
				return true;
		}
				
		return false;	
	}
	
	function Delete($Condition, $TableName)
	{
		if($this->resource)
		{
			if($Condition == "")
				$sql = "DELETE * FROM $TableName";
			else
				$sql = "DELETE FROM $TableName $Condition";
			
			$result = mysql_query($sql);
			
			/*
			if($result)
				return true;
			*/
			
			return mysql_affected_rows();				
		}
				
		return -1;
	}	
	
	function Update(&$FieldData, $ConditionSQL, $TableName)
	{
		if($this->resource)
		{
			//$sql = "DESCRIBE $TableName";
			$sql = "SELECT * FROM $TableName";
			$result = mysql_query($sql);
					
			
			if($result)
			{
				$str = "";
				
				$bFirst = true;
				foreach($FieldData as $index => $val)
				{										
					$pos = $this->GetFieldIndex($result, $index);					
					if($pos >= 0)
					{
						$bChar = true;
						$FieldType = mysql_field_type($result, $pos);
						if($FieldType == "real" || $FieldType == "int")
							$bChar = false;

						if($bChar)
							$val = str_replace("'", "\'", $val);
															
						if($bFirst)
						{					
							if($bChar)
								$str = $str.$index."='".$val."'";
							else
							{
								if(is_numeric($val))
									$str = $str.$index."=".$val;
							}
						}
						else
						{				
							if($bChar)
								$str = $str.", ".$index."= '".$val."'";
							else
							{
								if(is_numeric($val))						
									$str = $str.", ".$index."=".$val;
							}
						}
						
						$bFirst = false;
					}
				}
				
				if(!$bFirst)
				{
					$sql = "UPDATE $TableName SET ".$str." ".$ConditionSQL;
					//echo $sql;
					$result = mysql_query($sql);
															
					//if($result)
					if(mysql_affected_rows() > 0)
						return true;
					else
					{
						//echo "Error to update into DB!<br>";
						return false;
					}				
				}
			}
			else
			{
				//echo "Error to get access to DB or table name invalid!<br>";
				return false;
			}
		}
		
		return false;
	}	
	
	function GetCount($Condition, $TableName)
	{
		if($this->resource)
		{
			if($Condition == "")
				$sql = "SELECT COUNT(*) FROM $TableName";
			else
				$sql = "SELECT COUNT(*) FROM $TableName $Condition";
			
			//echo "$sql<br>";
						
			$result = mysql_query($sql);
			
			//echo "$result<br>";
			
			$row = mysql_fetch_row($result);
			return $row[0];			
		}
		
		return -1;
	}
	
	function GetMax($FieldName, $TableName)
	{
		$max = -1;
		if($this->resource)
		{
			$sql = "SELECT max($FieldName) FROM $TableName";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
			$max = $row[0];		
		}
		else
			return -1;
	
		return $max;
	}
	
	function GetWriteLocks($Tables)
	{
		//echo "<br>Locking tables<br>".var_dump($Tables);
		
		$numTables = count($Tables);
		
		if($this->resource && $numTables > 0)
		{
			$sql = "LOCK TABLES ";
			for($i = 0; $i < $numTables; $i++)
			{
				$this->locked_tables[] = $Tables[$i];
				
				if($i == 0)
					$sql = $sql.$Tables[$i]." WRITE";
				else
					$sql = $sql.", ".$Tables[$i]." WRITE";				
			}
			
			if(mysql_query($sql))
				return true;			
		}
		
		return false;
	}
	
	function GetWriteTableLock($TableName)
	{				
		if($this->resource && $TableName != "")
		{
			$this->locked_tables[] = $TableName;
			
			$sql = "LOCK TABLES ". $TableName ." WRITE";
			if(mysql_query($sql))
				return true;
		}
		
		return false;
	}
	
	function ReleaseTableLock()
	{
		//echo "<br>Unlocking tables<br>";
		
		if($this->resource)
		{
			$this->locked_tables = array();
			
			$sql = "UNLOCK TABLES";
			if(mysql_query($sql))
				return true;
		}
		
		return false;
	}	
	
	function IsTableLocked($TableName)
	{
		foreach($this->locked_tables as $table)
		{
			if($table == strtolower($TableName))
				return true;
		}
		
		return false;
	}	
	
	function IsLockingExecuted()
	{
		if(count($this->locked_tables) > 0)
			return true;
		
		return false;
	}
	
	function GetFieldIndex($result, $FieldName)
	{
		$NumFields = mysql_num_fields ($result);
		for($i = 0; $i < $NumFields; $i++)
		{
			if($FieldName == mysql_field_name($result, $i))
				return $i;
		}
		
		return -1;
	}
	
	function StartTransaction()
	{
		if(mysql_query("START TRANSACTION"))
			return true;
		else
			return false;
	}
	
	function CommitTransaction()
	{
		if(mysql_query("COMMIT"))
			return true;
		else
			return false;
	}
	
	function RollbackTransaction()
	{
		if(mysql_query("ROLLBACK"))
			return true;
		else
			return false;
	}
	
	function SetAutoCommit($bAuto)
	{
		if($bAuto == true)
		{
			if(mysql_query("SET AUTOCOMMIT = 1"))
				return true;
		}
		else
		{
			if(mysql_query("SET AUTOCOMMIT = 0"))
				return true;		
		}
		
		return false;
	}
}

?>