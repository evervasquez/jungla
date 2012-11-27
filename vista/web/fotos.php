<style type='text/css'>
   body
   {
      font-family:arial;
   }
   #wrapper
   {
      width:80%;
      margin:0 auto;
   }
   #back
   {
      display:block;
      padding:5px;
      float:left;
   }
   #backAlbums
   {
      display:block;
      padding:5px;
      float:right;
   }
   #next
   {
      float:right;
      display:block;
      padding:5px;
   }
   #prev
   {
      float:left;
      display:block;
      padding:5px;
   }
   .ImageLink
   {
      display:block;
      float:left;
      padding:5px;
      margin:5px;
   }
   .ImageLink img
   {
      width:150px;
   }
</style>
<div id="gallery">								
<h3>Mis Fotos de Facebook</h3>
<div id ="wrapper">
<?php
   define('PAGE_ID', '472148372819412');
   define('APP_ID','');
   define('APP_SECRET','');
   include("phpcUrl.php");
   $face = new FacePageAlbum(PAGE_ID, $_GET['aid'], $_GET['aurl'], APP_ID, APP_SECRET);
?>
</div>
</div>
    