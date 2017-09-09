<?php include $root.'public/template/site/header.php' ?>
<?php include $root.'public/template/site/nav.php' ?>
    <h1>
      Đây là home
    </h1>
    <?php
      $alertLv ="danger";
      BasicLibs::getAlert($alertLv);
    ?>
    <form action="?action=homeAct" method="post" enctype="multipart/form-data">
    	<input type="file" name="file" />
    	<button type="submit">Ok</button>	
    </form>
<?php include $root.'public/template/site/footer.php' ?>    
 