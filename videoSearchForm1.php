<!DOCTYPE html>
<html>
<body>

<script type='text/javascript'>
   var count=1;
   var player=document.getElementById('myVideo');
   var mp4Vid = document.getElementById('mp4Source');
   player.addEventListener('ended',myHandler,false);

   function myHandler(e)
   {

      if(!e) 
      {
         e = window.event; 
      }
      count++;
      $(mp4Vid).attr('src', "/videos/seagate/alreadyInAWS/may_27_2018/MP_ROOT/100ANV01/resize/"+count+".mp4");
      player.load();
      player.play();
   }

</script>

<h2>Video library search</h2>

<form action="/videoSearch.php" method="post">
  keyword:<br>
  <input type="text" name="keyword" value = <?php echo $_POST['nextKey']; ?> >
  <input type="number" name="next" value = <?php echo $id; ?> placeholder = "word or phrase">
  <br>
  <br>
  <input type="submit" value="Submit">
  <button type="submit"  formaction="videoSearchNext.php">Next</button>

</form> 

<h2>Update Video Info</h2>

<form action="/videoUpdate.php" method="post">
  Video ID:<br>
  <input type="text" name="videoID" placeholder = "word or phrase">
  <br>
  Title:<br>
  <input type="text" name="title" placeholder = "word or phrase">
  <br>
  Category:<br>
  <input type="text" name="category" placeholder = "word or phrase">
  <br>
  Description:<br>
  <input type="text" name="description" placeholder = "word or phrase">
  <br>
  Location:<br>
  <input type="text" name="location" placeholder = "word or phrase">
  <br>

  <br>
  <input type="submit" value="Submit">
</form> 


<?php

include 'videoFilesDisplayAll.php'; 

?>

</body>
</html>

