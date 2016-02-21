<?php

if (isset($_REQUEST['log_in'])){
	require_once('mysqli.php');  //connection with database
	
	$errors = array();

	if(!empty($_REQUEST['username'])){
	   		$u=mysqli_real_escape_string($dbc,trim($_REQUEST['username']));
	    $username=$_REQUEST['username'];
	    	echo '<p> </p>';
	   } else {
	    	$errors[]='<p> you forget to enter the username </p> ';
	    	echo '<p> </p>';
	   }// end of username control


	if (!empty($_REQUEST['password'])){
			$p=mysqli_real_escape_string($dbc,trim($_REQUEST['password']));
	    $password=$_REQUEST['password'];
	     } else {
	     	$errors[]='<p> you forgot to enter your password </p> ';
	     	echo '<p> </p>';
	     }
	      // end of password control
	      



	if(!empty($_REQUEST['biometric'])){
	    $b=mysqli_real_escape_string($dbc,trim($_REQUEST['biometric']));
	    $biometric=$_REQUEST['biometric'];
	    echo '<p> </p>';
	   } else {
	    $errors[]='<p> you forget to enter the biometric </p> ';
	    echo '<p> </p>';
	   }// end of username control



	   // ending of valid inputs

	if (empty($errors)) { // if errors array is empty 
	     	// login 
	        $query = "SELECT * FROM user  WHERE username= '$username' and password= SHA1('$password') and biometric='$biometric' ";
	        $result = mysqli_query($dbc, $query);
	        $num_rows = @mysqli_num_rows($result);
	        
		        
		       //$result = @mysqli_query ($dbc, $q);
		 	    if ($num_rows == 0){ // cheking the r
		 	    	echo ' Information you have entered is incorrect ';
		 	    	echo " back to <a href = 'main_page.html'> main page ";
		      
		           } else {
		           echo '<h1> Successful log in </h1>';
		           echo " back to <a href = 'main_page.html'> main page ";     	
		         }//finished with r
	        
     } else {// if errors exists (complete forms errors)
       echo "<h1> errors </h1>";
       echo "<p> back to <a href = 'main_page.html'> main page ";
       
       foreach($errors as $item)
       echo  $item;
       echo ' ';
       echo '<p> </p>';


	     //end of empty errors
	       
	mysqli_close($dbc);
	     
	}// end of register

}


?>