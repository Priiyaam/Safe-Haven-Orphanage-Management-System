<?php

$conn = mysqli_connect("localhost", "root", "", "orphanage_management_system");
$sql = "SELECT * FROM donation WHERE name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
		echo "	<tr>
		          <td>".$row['name']."</td>
		          <td>".$row['organization']."</td>
		          <td>".$row['purpose']."</td>
		          <td>".$row['amount']."</td>
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>