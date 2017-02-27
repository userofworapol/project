<html>
<head>
<script type="text/javascript" src="jquery/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
$(function(){
$( "#clickme" ).click(function() {
  $( "#book" ).slideDown( "slow", function() {
    // Animation complete.
  });
});
});

</script>
</head>
<body>
<div id="divDatas">
dasd
</div>
<div id="clickme">
  Click here
</div>
<img id="book" src="home-icon.png" alt="" width="100" height="123">

</body>
</html>
