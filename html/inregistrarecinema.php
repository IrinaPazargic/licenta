<?php 
require_once'config.php';
$nume=$_POST['nume'];

if($nume){
 

    if(empty($nume)){
        echo("You have to fill an username!");
        
	}
	else{
                 $insert=" INSERT INTO `cinema` (`nume`)  VALUES ('$nume') ";
                 if(mysql_query($insert))
                echo ("Inserted!!!");
               
                    
                    
             
        }
}

?>