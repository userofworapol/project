<!DOCTYPE html>
<html lang="en">
  <head><?
  $servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "shop";?>

	<link rel="stylesheet" type="text/css" href="css/page1.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <?
    $page_start=1;
	if($_GET['page_start']!=null)$page_start=$_GET['page_start'];
 
 ?>
    
	<nav class="navbar navbar-default">
	<div class="row">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
	<div class="col-sm-9">&nbsp;</div>
    <div class="navbar-header col-sm-9">
	 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <br>
   <img class="navbar-brand" alt="Brand" src="images/company_logo3.GIF" >
      <a class="navbar-brand" href="#"><font color="white">Brand</font></a>
    </div>
	
	<div class="navbar-brand  ">
	
	<a href="#" class="navbar-link"><font color="white">sdsd</font></a>
	|
	<a href="#" class="navbar-link"><font color="white">sdsd</font></a>
	|
	<a href="#" class="navbar-link"><font color="white">sdsd</font></a>
	</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
	<div class="col-sm-0">&nbsp;</div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	
      
	  
      <div class="navbar-form navbar-left ">
         <form ">
          <input type="text" class="form-control" placeholder="Search">
        
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
	  </div>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
 
</div>
</nav>
<ul class="nav1 nav nav-tabs">

<div class="col-sm-5">&nbsp;</div>
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation" class="noactive "><a href="#">Profile</a></li>
  <li role="presentation" class="noactive"><a href="#">Messages</a></li>
  
</ul>
<ul class="menustack">
  <li class="menustack"><a class="active2" href="#home">Home</a></li>
  <li class="menustack" id="menustack2"><a href="#news">News</a>
  <ul class="menustack2" >
  <div class="dropdown-menustack2">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
  </ul>
  </li>
  <li class="menustack"><a href="#contact">Contact</a></li>
  <li class="menustack" ><a href="#about">About</a></li>
  
</ul>

<div class="border_table_andpagition">
 <?
/*เชื่อมต่อ sql แสดงสินค้าเป็นตาราง*/
	
	$conn = new mysqli($servername,$username,$password,$dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);} 
	
$sql = "SELECT * FROM product";
$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$num=0;
    echo "<table >";
	$countproduct=0;
    while($row = $result->fetch_assoc()) {
		$countproduct++;
		if($countproduct>($page_start-1)*12&&$countproduct<=($page_start*12)){
		if($num==0)echo "<tr>";
		echo "<td class=\"td_product\">";
		echo "<a  href=\"homepage.php\">";
		echo "<img src=\"".$row['product_image']."\" width=\"300px\" height=\"300px\"><br>";
		if($num!=1)echo "<div class=\"bg_table_td\">";else{echo "<div class=\"bg_table_td2\">";}
		
		
		echo "<font class=\"font_in_table\">".$row['product_name']."</font><br>";
		
		echo "<font class=\"font_in_table\">"."ราคา ".$row['product_price']." ฿"."</font>";
		
		echo "</div>";
		echo "</a>";
		echo "</td>";
      /*  echo "<td>".$row['product_code'].$row['product_name'].$row['product_type'].$row['product_price'].$row['product_count'].$row['product_date_sale']."<img src=\"".$row['product_image']."\" width=\"50px\" height=\"50px\"></td>";*/
			if($num==2){echo "</tr>";$num=0;}
			else{$num++;}
		}
	}
	echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
/*จบเชื่อมต่อ sql แสดงสินค้าเป็นตาราง*/
?>
<!--pagination-->
<ul class="paginations">
<?

 
$n=$page_start;
if($page_start==1){
	echo "<li><a class=\"active\" href=\"homepage.php?page_start=".$page_start."\">".$page_start."</a></li>";
	echo "<li><a class=\"\" href=\"homepage.php?page_start=".($page_start+1)."\">".($page_start+1)."</a></li>";
	echo "<li><a class=\"\" href=\"homepage.php?page_start=".($page_start+2)."\">".($page_start+2)."</a></li>";
	echo "<li><a href=\"homepage.php?page_start=".($page_start+1)."\">>></a></li>";
}
else{
	echo "<li><a href=\"homepage.php?page_start=".($page_start-1)."\">«</a></li>";
	echo "<li><a class=\"\" href=\"homepage.php?page_start=".($page_start-1)."\">".($page_start-1)."</a></li>";
	echo "<li><a class=\"active\" href=\"homepage.php?page_start=".$page_start."\">".$page_start."</a></li>";
	if(($page_start*12)<=$countproduct){
	echo "<li><a class=\"\" href=\"homepage.php?page_start=".($page_start+1)."\">".($page_start+1)."</a></li>";
	echo "<li><a href=\"homepage.php?page_start=".($page_start+1)."\">>></a></li>";
	                                   }
}
	
	
	/*$n1=floor($page_start/10);
	echo "\np".$page_start."\n";
	if(($page_start%10)!=0)$n1++;
     if($n1==0){$n1=1;}	
	if($n==$page_start){

	echo "<li><a class=\"active\" href=\"homepage.php?page_start=".($page_start+10)."\">".$n1."</a></li>";
	                   }
else{ echo "<li><a  href=\"homepage.php?page_start=".($page_start+10)."\">".$n1."</a></li>";

  }
  $page_start=$page_start+10;
                      */
					  
					  
 ?>


 
  
  
</ul>


</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>