<?php
		$connect = mysqli_connect("gamamdkfoodtruck.mysql.db", "gamamdkfoodtruck", "RootFoodTruck1", "gamamdkfoodtruck");

		if(!$connect){
			echo"Echec de connection : ".mysqli_connect_error();
			exit();
		}

        $connect -> set_charset("utf8mb4");


	?>
	