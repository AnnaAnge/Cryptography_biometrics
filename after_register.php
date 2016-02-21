<?php

if (isset($_REQUEST['register'])){
	require_once('mysqli.php');


	$errors = array();

	if(!empty($_REQUEST['name'])){
		 	$fn= mysqli_real_escape_string($dbc,trim($_REQUEST['name']));
	    $name=$_REQUEST['name'];
		 	echo '<p> </p>';
		} else {
		 	$errors[]= 'you forget to enter the name  ';
		 	echo '<p> </p>';
		 }// end of name controls


	 if(!empty($_REQUEST['surname'])){
		 	$sn=mysqli_real_escape_string($dbc,trim($_REQUEST['surname']));
	    $surname=$_REQUEST['surname'];
		 	echo '<p> </p>';
		 } else {
		 	$errors[]='<p> you forget to enter the lastname </p> ';
		 	echo '<p> </p>';
		 }// end of last name control


	if(!empty($_REQUEST['email']) ){
		 	$e=mysqli_real_escape_string($dbc,trim($_REQUEST['email']));
		 	echo '<p> </p>';
		 } else {
		 	$errors[]= '<p> you forget to enter the email/wrong email </p> ';
		 	echo '<p> </p>';
		 }// end of email control

	 if(!empty($_REQUEST['username'])){
	    $u=mysqli_real_escape_string($dbc,trim($_REQUEST['username']));
	    $username=$_REQUEST['username'];
	    echo '<p> </p>';
	   } else {
	    $errors[]='<p> you forget to enter the username </p> ';
	    echo '<p> </p>';
	   }// end of username control


	if (!empty($_REQUEST['password'])){
	   	if($_REQUEST['password']!=$_REQUEST['confirm_password']) {
	     		$errors[]='your password did not match ';
	     	} else{
	     		$p=mysqli_real_escape_string($dbc,trim($_REQUEST['password']));
	        $pass1=$_REQUEST['password'];
	     	}
	     } else {
	     	$errors[]='<p> you forgot to enter your password </p> ';
	     } // end of password control



	if($_REQUEST['biometric'] == 'yes'){
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
	        $query = "SELECT * FROM user  WHERE username= '$username' ";
	        $result = mysqli_query($dbc, $query); 
	        
		        if (!$result) {//checking result1
		            echo ' Database Error Occured ';
		            echo '<p> . mysqli_error($dbc) . Query: ' . $query . '</p>';
		        } //end resutlt1
		        
		        if (mysqli_num_rows($result) == 0) {//checking for double name  

		     	  $q = "INSERT INTO user (name,surname,email, username, password, biometric) VALUES ('$fn','$sn','$e','$u',SHA1('$p'),'$b') ";
		     	  $r = @mysqli_query ($dbc, $q);
		          
		            if ($r){ // cheking the r
		         echo '<h1> you are now register </h1>';
		           } else {
		         
		           echo '<h2> System error </h2>';
		           echo '<p> . mysqli_error($dbc) . Query: ' . $q . '</p>';     	
		         }//finished with r


		      } else { //if exists double username 
		        echo "<h1> errors </h1>";
		       echo ' the username you entered already exists';
		       }  
		     
		     mysqli_close($dbc);
		     exit();
	        
	     } else {// if errors exists (complete forms errors)
	       echo "<h1> errors </h1>";
	       
	       foreach($errors as $item)
	       echo  $item;
	       echo ' ';
	       echo '<p> </p>';


	        }//end of empty errors
	       
	mysqli_close($dbc);
	     
	}// end of register


?>