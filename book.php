<?php require('user_session.php');  
	  require_once('../assets/include/config.php');
	  $con = connectTo();
?>

<!DOCTYPE HTML>
<html>
<head>
<title>User View Books :: LIBRARY AUTOMATION</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<link href="../assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="../assets/css/style.css" rel="stylesheet" type="text/css" media="all"/>
 <!-- js-->
<script src="../assets/js/jquery.min.js"></script>
<!-- Validation -->
<script src="../assets/js/bootbox.min.js"></script>
<script>
$(document).ready(function () {
	$("#tblbook").dataTable(); //for data table
});
</script>
<!-- //Validation -->
    <!-- DATATABLE STYLE  -->
    <link href="../assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- DATATABLE SCRIPTS  -->
    <script src="../assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../assets/plugins/datatables/dataTables.bootstrap.js"></script>
<!--icons-css-->
<link href="../assets/css/font-awesome.css" rel="stylesheet"> 
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Carrois+Gothic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Work+Sans:400,500,600' rel='stylesheet' type='text/css'>
</head>
<body>	
<div class="page-container">
   <div class="left-content">
	   <div class="mother-grid-inner">
<?php require('user_header.php'); ?>
<!--inner block start here-->
<div class="inner-block">
<!--main page chart start here-->
<div class="main-page">
    <div class="blank">
    	<h2>Books List</h2>
    	<div class="blankpage-main">	
						<div class="table table-responsive">
						<h4>Books Details Table:</h4><br>
							<table class="table table-hover" id="tblbook">
							<thead> <tr> <th>S.No</th><th>Book Name</th> <th>Edition</th> <th>Publisher</th><th>Author</th> <th>Category</th><th>ISBN</th></tr> </thead>
							<tbody> 
						

<?php 
//taking data from database
        $query = "SELECT * FROM `book` ORDER BY `name`";
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$c=1;
		while($obj=mysqli_fetch_object($result))
		{	$pu = mysqli_query($con,"SELECT * FROM `publisher` WHERE `pid` = $obj->pubid") or die(mysqli_error($con));
			$pu1 = mysqli_fetch_object($pu);
			$au = mysqli_query($con,"SELECT * FROM `author` WHERE `aid` = $obj->authid") or die(mysqli_error($con));
			$au1 = mysqli_fetch_object($au);
			$ca = mysqli_query($con,"SELECT * FROM `category` WHERE `cid` = $obj->catid") or die(mysqli_error($con));
			$ca1 = mysqli_fetch_object($ca);
		
				  echo "<tr> <td>$c</td>
                        <td>$obj->name</td>
                        <td>$obj->edition</td>
                        <td>$pu1->name</td>
                        <td>$au1->name</td>
                        <td>$ca1->name</td>
                        <td>$obj->isbn</td>
                      </tr>";
			$c++;
		}
?>
							 </tbody> </table>
						</div>
    	</div>
    </div>
</div>
</div><!--inner block end here-->
<!--copy rights start here-->
<div class="copyrights">
<p>© LIBRARY AUTOMATION | Developed by  <a href="" target="_blank">Group 1</a> </p>
</div>	
<!--COPY rights end here-->
</div>
</div>
	<div class="clearfix"> </div>
</div>
<!--scrolling js-->
		<script src="../assets/js/jquery.nicescroll.js"></script>
		<script src="../assets/js/scripts.js"></script>
		<!--//scrolling js-->
<script src="../assets/js/bootstrap.js"> </script>
<!-- mother grid end here-->
</body>
</html>                     