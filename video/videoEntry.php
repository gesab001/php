<!DOCTYPE html>
<html lan="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add videos to Mysql database</title>
<body>

<h1>Add videos</h1>

<form action="add-new-videos.php" method="post">
Database location:<br>
<select name="database-location">
   <option value="localhost">localhost server</option><br>
   <option value="13.236.140.12">EC2 server</option><br>
   <option value="bibledb.cvtfhbljhzkg.ap-southeast-2.rds.amazonaws.com">Amazon RDS MySQL server</option><br>
</select>
<br><br>Database name:<br>
<select name="database-name">
   <option value="videos">Videos</option><br><br>
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

<h1>Add thumbnails</h1>

<form action="add-new-thumbnails.php" method="post">
Database location:<br>
<select name="database-location">
   <option value="localhost">localhost server</option><br>
   <option value="13.236.140.12">EC2 server</option><br>
   <option value="bibledb.cvtfhbljhzkg.ap-southeast-2.rds.amazonaws.com">Amazon RDS MySQL server</option><br>
</select>
<br><br>Database name:<br>
<select name="database-name">
   <option value="videos">Videos</option><br><br>
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

<br><h1>Get videos</h1><br>


<form action="get-videos2.php" method="post">
Database location:<br>
<select name="database-location">
   <option value="localhost">localhost server</option><br>
   <option value="13.236.140.12">EC2 server</option><br>
   <option value="bibledb.cvtfhbljhzkg.ap-southeast-2.rds.amazonaws.com">Amazon RDS MySQL server</option><br>
</select>
<br><br>Database name:<br>
<select name="database-name">
   <option value="videos">Videos</option><br><br>
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

<<<<<<< HEAD

<br><h1>Search videos</h1><br>


<form action="search-videos.php" method="post">
Database location:<br>
<select name="database-location">
   <option value="localhost">localhost server</option><br>
   <option value="13.236.140.12">EC2 server</option><br>
   <option value="bibledb.cvtfhbljhzkg.ap-southeast-2.rds.amazonaws.com">Amazon RDS MySQL server</option><br>
</select>
<br><br>Database name:<br>
<select name="database-name">
   <option value="videos">Videos</option><br><br>
</select><br>
<br>Username:<br>
<input type="text" name="username" placeholder="enter username"</input><br>
<br>Password:<br>
<input type="text" name="password" placeholder="enter password"</input><br>
<br>File directory:<br>
<input type="text" name="directory" placeholder="enter path to files"</input><br>
<br>
<br>Search by thumbnail:<br>
<input type="text" name="thumbnail" placeholder="enter keyword"</input><br>
<br>

<input type="submit" value="Submit"</input>
</form> 

=======
>>>>>>> bb8f0eabe51b3f5dca83014d280c9110b82d8c35
</body>
</html>

