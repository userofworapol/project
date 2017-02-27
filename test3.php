<!DOCTYPE html>
<html>
<head>
<script>
function showHint(str) {
	
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "test2.php?q="+str, true);
  
  xhttp.send();   
  
}
</script>
</head>
<body>
<?$q=$_GET['q'];?>

<div id="my">

<h1>The XMLHttpRequest Object</h1>

<h3>Start typing a name in the input field below:</h3>

<form action=""> 
First name: <input type="text" id="txt1" onkeyup="showHint(this.value)">
</form>

<?$q++;?>
<p>Suggestions: <span id="txtHint"></span></p> 


</div>


</body>
</html>
