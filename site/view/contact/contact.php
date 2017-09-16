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
    <li class="active">
      <a href="?action=contact">Liên Hệ</a>
    </li>
  </ol> <!-- end breadcrumbs -->
</div>

<!-- Contact -->
<section class="section-wrap contact">
  <div class="container">
    <div class="row">

      <div class="col-md-8">
        <h5 class="uppercase mb-30">Liên Hệ Với Chúng Tôi</h5>
        <?php
            BasicLibs::getAlert();
        ?>
        <form id="contact-form" action="?action=addContact" method="post">
          <div id="message" class="alert alert-danger hidden"></div>          
          <div class="contact-name">
            <input name="full_name" id="name" type="text" placeholder="Tên*">
          </div>
          <div class="contact-email">
            <input name="email" id="mail" type="email" placeholder="E-mail*">
          </div>
          <div class="contact-subject">
            <input name="subject" id="subject" type="text" placeholder="Tiêu Đề">
          </div>                

          <textarea name="message" id="message" placeholder="Nội Dung" rows="9"></textarea>
          <button type="submit" class="btn btn-lg btn-color btn-submit">Gửi</button>              
        </form>
      </div> <!-- end col -->

      <div class="col-md-4 mb-40 mt-mdm-40 contact-info">

        <div class="address-wrap">
          <h4 class="uppercase">Địa Chỉ</h4>
          <h6><?php echo $resultContactInfo['branch']; ?></h6>
          <address class="address"><?php echo $resultContactInfo['address']; ?></address>
        </div>

        <h4 class="uppercase">Thông Tin Liên Hệ</h4>
        <ul class="contact-info-list">
          <li><span>SĐT: </span><a><?php echo $resultContactInfo['phone']; ?></a></li>
          <li><span>Email: </span><a class="sliding-link"><?php echo $resultContactInfo['email']; ?></a></li>
        </ul>
      </div>          

    </div>
  </div>
</section> <!-- end contact -->

<script type="text/javascript">
  let sendContact = document.getElementById('contact-form');
  sendContact.addEventListener('submit', (e) => {
    let mes = document.getElementById('message');
    let full_name = document.querySelector('[name="full_name"]').value.trim();
    let email = document.querySelector('[name="email"]').value.trim();
    let subject = document.querySelector('[name="subject"]').value.trim();
    let message = document.querySelector('[name="message"]').value.trim();
    let html = [];

    if (full_name == '') {
      let content = '-Không bỏ trống tên người nhập';
      html.push(content);
    }

    if (email == '') {
      let content = '-Không bỏ trống email & phải nhập đúng cú pháp';
      html.push(content);
    }

    if (subject == '') {
      let content = '-Không bỏ trống tiêu đề';
      html.push(content);
    }

    if (message == '') {
      let content = '-Không bỏ trống nội dung';
      html.push(content);
    }

    if (html.length > 0) {
      let mess = '';
      e.preventDefault();
      mes.classList.remove('hidden');
      for(let showMess of html) {
        let alert = `<p>${showMess}</p>`;
        mess += alert;
      }
      mes.innerHTML = mess;
    }
  });
</script>

<?php include $GLOBALS['ROOT'].'public/template/site/footer.php' ?>   
