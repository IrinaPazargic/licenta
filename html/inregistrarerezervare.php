<?php
require_once'config.php';
$nume=$_POST['nume'];
$prenume=$_POST['prenume'];
$titlu=$_POST['titlu'];
$data=$_POST['data'];

function isValid( $what, $data ) {

	switch( $what ) {
	
			// validate nume 
		case 'nume':
			$pattern = "/^[a-z\s]+$/";
		break;

			// validate prenume 
		case 'prenume':
			$pattern = "/^[a-z\s]+$/";
		break;
		
		case 'titlu':
			$pattern = "/^[a-z\s]+$/";
		break;
		

		default:
			return false;
		break;

	}
	return preg_match($pattern, $data) ? true : false;
}

$errors = array();
if( isset($_POST['insert']) ) {

	if( !isValid( 'nume', $_POST['nume'] ) ) {
		$errors[] = 'Introduceti numele ';
	}

	if( !isValid( 'prenume', $_POST['prenume'] ) ) {
		$errors[] = 'Introduceti prenumele';
	}

	if( !isValid( 'titlu', $_POST['titlu'] ) ) {
		$errors[] = 'Introduceti titlul filmului';
	}


}

if( !empty($errors) ) {
	foreach( $errors as $e ) echo "$e <br />";
}

if($nume&&$prenume&&$titlu&&$data){
 

    if(empty($nume)){
        echo("Trebuie sa introduceti prenumele dvs!");
        
    }else{if(empty($prenume)){
        echo("Introduceti numele dvs!");
    }else{if(empty($titlu)){
        echo("Introduceti titlu filmului!");
    }else{if(empty($data)){
         echo("Introduceti data dorita");
    }
    else{
				$query="Select   * from `persoane`, `filme` where persoane.nume='$nume' and persoane.prenume='$prenume' and filme.titlu='$titlu'";
                $rez=mysql_query($query);
				
                while($row=mysql_fetch_array($rez)){
                $idPersoana=$row['idPersoana'];
				$idFilm=$row['idFilm'];
				
                 $insert=" INSERT INTO `rezervare` (`idPersoana`,`idFilm`, `data`) VALUES ('.$idPersoana.', '.$idFilm.', '$data')";
                 if(!mysql_query($insert)){
                    echo("fail");
                    
                 }else{
					echo ("Inserted!!!");}
               
                    
                    
                }
            }
        }
    }
}
}

?>