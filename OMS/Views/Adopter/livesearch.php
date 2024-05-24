<?php  
include("config.php");
if(isset($_POST['input'])){
	
	$input = $_POST['input'];

	$query ="SELECT * FROM orphan WHERE orphan_name LIKE '{$input}%' OR orphan_id LIKE '{$input}%' OR age LIKE '{$input}%' OR orphan_gender LIKE '{$input}%' OR body_color LIKE '{$input}%'  ";

	$result = mysqli_query($con,$query);

	if(mysqli_num_rows($result) > 0){?>

		<table class="table table-bordered table-striped mt-4">
			<thead>
				<tr>
					<th>orphan_id</th>
					<th>orphan_name</th>
					<th>orphan_gender</th>
					<th>age</th>
					<th>body_color</th>


				</tr>

			</thead>
			
			<tbody>
				<?php 

				while($row = mysqli_fetch_assoc($result)){

					$orphan_id = $row['orphan_id'];
					$orphan_name = $row['orphan_name'];
					$orphan_gender = $row['orphan_gender'];
					$age = $row['age'];
					$body_color = $row['body_color'];
					
					?> 
					<tr>
						<td><?php echo $orphan_id;?></td>
						<td><?php echo $orphan_name;?></td>
						<td><?php echo $orphan_gender;?></td>
						<td><?php echo $age;?></td>
						<td><?php echo $body_color;?></td> 
					</tr>
					<?php
				}

				?>


			</tbody>
			

		</table>
		
		<?php
	}else{
		echo "<h6 class='text-danger text-center mt-3'>No data Found</h6>";
	}

}

?>