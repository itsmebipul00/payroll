<?php
	
		require("db.php");
		
		@$id 			= $_POST['ot_id'];
		@$salary		= $_POST['rate'];


		$sql = mysqli_query($con,"UPDATE overtime SET rate='$salary' WHERE ot_id='1'");

		if($sql)
		{
			?>
		        <script>
		            alert('overtime rate successfully changed...');
		            window.location.href='home_employee.php';
		        </script>
		    <?php 
		}
		else {
			echo "Not Successfull!"; 
		}
 ?>