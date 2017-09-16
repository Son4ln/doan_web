<?php include $GLOBALS['ROOT'].'public/template/site/header.php' ?> 
<?php 
  $contactInfo = new ContactModel();
  $resultContactInfo = $contactInfo -> getContact();
?>

<!-- Breadcrumbs -->
<div class="container">
  <ol class="breadcrumb">
    <li>
      <a href="?action=home">Trang Chủ</a>
    </li>
    <li>
      <a href="?action=about">Giới Thiệu</a>
    </li>
  </ol> <!-- end breadcrumbs -->
</div>


<!-- Catalogue -->
<section class="section-wrap pt-70 pb-40 catalogue">
	<div class="container">
    <div class="row">
      <div class="col-sm-12">
        <img src="img/about_us.jpg" alt="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <h4 class="about-intro uppercase">giới thiệu về công ty</h4>
        <p><?php echo $resultContactInfo['introduce']; ?></p>
      </div>
      <div class="col-sm-4">
        <img src="../../upload/<?php echo $resultContactInfo['logo']; ?>">
      </div>
    </div>
  </div>
</section>

<?php include $GLOBALS['ROOT'].'public/template/site/footer.php' ?> 