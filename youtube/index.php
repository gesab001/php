<!DOCTYPE html>
<html>
<body>

<button onclick="goBack()">Go Back</button>

<h1>HolyTube Downloader</h1>
<label for="videoId">youtube url or videoId</label>
<input id="videoId" type="text"  value="<?php echo $_GET['videoId'];?>" placeholder="youtube url or videoId"><br>
<label for="filename">save video as</label>

<input id="filename" type="text" placeholder="output name" value="<?php echo $_GET['filename'];?>"><br>
<button onclick="download()">Download</button>
<div id="filesize"></div>
<script>
var myVar;
var filename;

function goBack() {
  window.history.back();
}

function checkDownloadProgress() {
  myVar = setInterval(checkFileSize, 1000);
}

function checkFileSize() {
   filename = document.getElementById("filename").value;

   var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {

         document.getElementById("filesize").innerHTML = this.responseText;

      }
    };
    xmlhttp.open("GET", "checkfilesize.php?filename="+filename, true);
    xmlhttp.send();
}

function download() {
   filename = document.getElementById("filename").value;

   var videoId = document.getElementById("videoId").value;
   window.location.href = "download.php?filename="+filename+"&videoId="+videoId;;
/*
   var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
	  	 clearInterval(myVar);
         document.getElementById("filesize").innerHTML = this.responseText;
		 
      }
    };
    xmlhttp.open("GET", "download.php?filename="+filename+"&videoId="+videoId, true);
    xmlhttp.send();
    checkDownloadProgress();
*/
}
</script>

</body>
</html>
