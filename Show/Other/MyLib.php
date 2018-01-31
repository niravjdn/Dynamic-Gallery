<?php
 function returnTab($con,$cat,$cnt)
{
  
  $str = "<br><br><div class='demo-gallery'>

    <ul id='lightgallery".$cnt."' class='list-unstyled row'>";

  $sql = "SELECT * FROM `tbl_photos` WHERE `photo_category`='".$cat."' order by photo_priority";
  $rs = mysqli_query($con,$sql);

  while($row = mysqli_fetch_array($rs))
  {

    $name = $row['photo_name'];
    
    $str .=  "<li data-responsive='../GalleryManager/img/$name' data-src='../GalleryManager/img/$name'
      data-sub-html='<h4>".$row['photo_title']."</h4><p>".$row['photo_desc']."</p>'' data-pinterest-text='Pin it' data-tweet-text='share on twitter ''>
        <a href=''>";
        $filelocation = "../img/thumbs/".$name;
          if(file_exists($filelocation))
            $str .= "<img class='img-responsive' src='../GalleryManager/img/thumbs/$name'>";
          else
            $str .= "<img class='img-responsive' src='../GalleryManager/img/$name'>";
         $str .= "<div class='demo-gallery-poster'>
            <img src='img/zoom.png'>
          </div>
        </a>
      </li>";
  }

  

    $str .= "</ul><span class='small'>Click on any of the images to see it in slideshow.</span></div>";
    return $str;
}
?>