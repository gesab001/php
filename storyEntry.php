<!DOCTYPE html>
<html lan="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add videos to Mysql database</title>
<body>

<h1>Add story</h1>

<form action="add-new-story.php" method="post">
Database location:<br>
<select name="database-location">
   <option value="localhost">localhost server</option><br>
   <option value="13.236.140.12">EC2 server</option><br>
   <option value="bibledb.cvtfhbljhzkg.ap-southeast-2.rds.amazonaws.com">Amazon RDS MySQL server</option><br>
</select>
<br><br>Database name:<br>
<select name="database-name">
   <option value="homeschooling">homeschooling</option><br><br>
</select><br>
<br>Username:<br>
<input type="text" name="username" placeholder="enter username"</input><br>
<br>Password:<br>
<input type="text" name="password" placeholder="enter password"</input><br>
<br>title:<br>
<input type="text" name="title" placeholder="title"</input><br>
<br>
<br>image:<br>
<input type="text" name="image" placeholder="image"</input><br>
<br>
<br>sentence:<br>
<input type="text" name="sentence" placeholder="sentence"</input><br>
<br>

<input type="submit" value="Submit"</input>
</form> 


<br><h1>Get story</h1><br>


<form action="get-story2.php" method="post">
Database location:<br>
<select name="database-location">
   <option value="localhost">localhost server</option><br>
   <option value="13.236.140.12">EC2 server</option><br>
   <option value="bibledb.cvtfhbljhzkg.ap-southeast-2.rds.amazonaws.com">Amazon RDS MySQL server</option><br>
</select>
<br><br>Database name:<br>
<select name="database-name">
   <option value="homeschooling">homeschooling</option><br><br>
</select><br>
<br>Username:<br>
<input type="text" name="username" placeholder="enter username"</input><br>
<br>Password:<br>
<input type="text" name="password" placeholder="enter password"</input><br>
<br>File directory:<br>
<input type="text" name="directory" placeholder="enter path to files"</input><br>
<br>
<input type="submit" value="Submit"</input>
</form> 

</body>
</html>

