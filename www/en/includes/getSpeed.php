<?php

        require_once("config.php");
     
 		//do {
        //foreach($db->query('(SELECT * FROM pinoccioData ORDER BY id DESC LIMIT 5) ORDER BY id ASC') as $row){
		//	 $row['type']." - ".$row['data1']."<br>";
		//}

		foreach($db->query("SELECT AVG(data1) as average, data1 as currentspeed FROM (SELECT id, data1 FROM pinoccioData WHERE type='speed' ORDER BY id DESC LIMIT 5) as sub") as $row){
			
			echo '<script> setValues('.$row['currentspeed'].','.$row['average'].'); </script>';
			//echo $row['average'];
 		};
        //} while (1 > 0);              
?>