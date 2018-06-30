<!DOCTYPE html>
<html>
<body>

<h2>KJV bible search</h2>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  keyword:<br>
  <input type="text" name="keyword">
  <br>
  <br>
  <input type="submit" value="Submit">
</form> 

<?php
include 'bibleSearch.php';
?>
</body>
</html>

