<?php
class DataProvider
{
	public static function executeQuery($sql)
	{
		include ('db.inc');
		//include_once('error.inc');
		// 1. Tao ket noi CSDL
		if (!($connection = mysqli_connect($hostName,$username,$password,$databaseName)))
			die ("Kết nối dữ liệu thất bại");
		mysqli_select_db($connection, $databaseName);
			
		//2. Thiet lap font Unicode
		mysqli_set_charset($connection,'UTF8');
		
		// Thuc thi cau truy van
		$result = mysqli_query($connection, $sql);
			
		// Dong ket noi CSDL
		mysqli_close($connection);
			
		return $result;
	}
}
?>