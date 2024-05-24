<?php
$con = mysqli_connect("localhost","root","","orphanage_management_system");
if(!$con){
	echo "Connection Failed" . mysqli_connect_error() ;
}
?>