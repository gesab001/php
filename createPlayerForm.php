<!DOCTYPE html> 

<head> 

<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/><!-- <meta http-equiv="Content-type" content="text/html; charset=iso-8859-1"/> --> 
<link rel="stylesheet" href="style1.css">
<style>
.error {
	color: white; 
	font-family:arial; 
	font-size: 20px; 

	background-color: red;
	}
  </style>
<title>Create Player</title> 
<script language="JavaScript" src="formValidator.js"></script> 
</head> 

<body> 
<div>
<a href="createPlayerForm.php" class="thisPagebutton thisPagebutton1"> Create</a>
<a href="retrievePlayerForm.php" class="button button1"> Retrieve</a>
<a href="updatePlayerForm.php" class=" button button1"> Update</a>
<a href="deletePlayerForm.php" class="button button1"> Delete</a>
</div>

<div>
<h1>Create Player</h1>
</div>
<!-- Opening the form element --> 

<?php 
include 'validatePlayerAdd.php';

?>

<p class="error"> <?php echo $alreadyAMember;?></p>

<form name="form1" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" > 

<!-- Input text Boxes --> 

<p> <b>Member ID: </b><input type="text"  name="member_id"  size="30" value= "<?=$memberid?>" maxlength="30" title="please remove special characters"/> <span class="error"> <?php echo $idError;?></span></p> 


<p> <b>First name: </b><input type="text" name="first_name" size="30" maxlength="30" value= "<?=$firstname?>"title="name should not include non-alphabet characters"/> <span class="error"> <?php echo $firstnameError;?></span></p> 

<p> <b>Family name: </b><input type="text" name="family_name"  size="30" value= "<?=$familyname?>" title="name should not include non-alphabet characters" maxlength="40" /> <span class="error"> <?php echo $familynameError;?></span></p> 

<p> <b>E-mail: </b><input type="text" name="email" value= "<?=$email?>"title="for example, giovanni@gmail.com"> <span class="error"> <?php echo $emailError;?></span></p> 

<p> <b>Phone: </b><input type="tel"  name="phone"   value= "<?=$phone?>" title="the number should include area code, ie. 098286329" ><span class="error"> <?php echo $phoneError;?></span></p> 

<!-- Submit and reset buttons --> 
	
<p class="submit"><input type="submit"  name="submit"  value="Submit" /> </p>

<p class="submit"><input type="reset" name="reset" value="Reset" /></p> 

<!-- Closing the form element --> 

</form> 
</div>
</body> 

</html> 