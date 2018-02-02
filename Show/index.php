<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallary of Convergence 2017</title>
<link href="style.css" rel="stylesheet" > 

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <script src="js/lightgallery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/lightgallery.css">
    <!-- lightgallery plugins -->
    <script src="js/lg-thumbnail.min.js"></script>
<style type="text/css">
  #exTab2 h3 {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}
</style>

</head>

<body style="background-color: #152836;">
<?php
 include('Other/localhost/DBConnection.php'); 
 include('Other/MyLib.php');
 ?>



<div class="cont">
  <div class="page-head">
    <h1>The Glimpse of Cheerful Moments of Convergence 2017</h1>
    
<div id="exTab2" class="container"> 
<ul class="nav nav-tabs">

<?php 
$sql = "select * from tbl_category";
$rs = mysqli_query($con,$sql);
$rs2 = $rs;
$cnt = 0;
while($row = mysqli_fetch_array($rs))
{
  if($cnt++==0)
    echo "<li class='active'>";
  else
  {
   echo "<li>";
  }
   echo "<a  href='#$cnt' data-toggle='tab'>".$row['category_name']."</a>";

  echo "</li>";
}
?>
   <!--    <li class="active">

        <a  href="#1" data-toggle="tab">Overview</a>
      </li>
      <li><a href="#2" data-toggle="tab">Without clearfix</a>
      </li>
      <li><a href="#3" data-toggle="tab">Solution</a>
      </li>
   -->

    </ul>
<?php
$sql = "select * from tbl_category order by id";
$rs = mysqli_query($con,$sql);
$cnt=0;
echo "<div class='tab-content '>";
while($row = mysqli_fetch_array($rs))
{
  

   if($cnt++==0)
    echo "<div class='tab-pane active' id='$cnt'>";
   else
    echo "<div class='tab-pane' id='$cnt'>";

      //  echo "  <h3>Standard tab panel created on bootstrap using nav-tabs.$cnt.</h3>";

   echo returnTab($con,$row['category_name'],$cnt);

    echo     "</div>";


  

}

?>


</div></div>


<hr></hr>
 
<div style="font-family: cursive;color: white;"> Made with <i class="fa fa-heart" aria-hidden="true" style="color:#be1931"></i> By Nirav Patel</div>
 </div>


</body>
<script type="text/javascript">
  $(document).ready(function() {
  <?php
  while($cnt != 0){
    echo "$('#lightgallery".$cnt--."').lightGallery({
    pager: true,
  });";
  }
  ?>
});
</script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
        <script src="js/lightgallery.js"></script>
        <script src="js/lg-fullscreen.js"></script>
        <script src="js/lg-thumbnail.js"></script>
        <script src="js/lg-video.js"></script>
        <script src="js/lg-autoplay.js"></script>
        <script src="js/lg-zoom.js"></script>
        <script src="js/lg-hash.js"></script>
        <script src="js/lg-share.js"></script>
        <script src="js/lg-pager.js"></script>
         <script src="js/jquery.mousewheel.min.js"></script>
</html>