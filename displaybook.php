<?php
  
require('../assets/include/config.php');
 
  if($_POST) 
  {
      $book = sqlReady($_POST['book']);
      $con = connectTo();
	  $r = mysqli_query($con,"SELECT * FROM `book` WHERE `name` LIKE '%$book%'") or die(mysqli_error($con));
	  $nob = mysqli_num_rows($r);
	  if(mysqli_num_rows($r) > 0)
	  {
			
			echo "<script>$('#bookfg').removeClass('has-error');</script>";
			echo "<script>$('#bookfg').addClass('has-success');</script>";
			echo "<h3 style='color:green;'>$nob Books Found</h3>";//$('#docsearchresult').html(
			
			echo "<div class=\"blank-page widget-shadow scroll\" id=\"\">	
						<div class=\"table table-responsive\">
						<h4>Books List:</h4><br>
							<table class=\"table table-hover\" id=\"tbldoc\">
							<thead> <tr> <th>S.No</th> <th>Barcode</th> <th>Book Name</th><th>Publisher</th><th>Author</th> <th>Category</th></tr> </thead>
							<tbody>";
		$c=1;
		while($obj=mysqli_fetch_object($r))
		{	$pu = mysqli_query($con,"SELECT * FROM `publisher` WHERE `pid` = $obj->pubid") or die(mysqli_error($con));
			$pu1 = mysqli_fetch_object($pu);
			$au = mysqli_query($con,"SELECT * FROM `author` WHERE `aid` = $obj->authid") or die(mysqli_error($con));
			$au1 = mysqli_fetch_object($au);
			$ca = mysqli_query($con,"SELECT * FROM `category` WHERE `cid` = $obj->catid") or die(mysqli_error($con));
			$ca1 = mysqli_fetch_object($ca);
			echo "<tr> <td>$c</td>
                        <td><a href=\"barcode.php?val=$obj->barcode\" title=\"Click to View BarCode\">$obj->barcode</a></td>
                        <td>$obj->name</td>
                        <td>$pu1->name</td>
                        <td>$au1->name</td>
                        <td>$ca1->name</td>
                      </tr>";
			$c++;
		}
			echo "
							 </tbody> </table>
						</div>
				</div>";
	  }
	  else
	  {
			echo "<span style='color:red;'>Sorry entered name doesn't match any book!!!</span>";
			echo "<script>$('#bookfg').addClass('has-error');</script>";
	  }
  }
?>