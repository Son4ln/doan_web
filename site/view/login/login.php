<?php include $ROOT.'public/template/site/header.php' ?>

<section class="page-title text-center">
  <div class="container relative clearfix">
    <div class="title-holder">
      <div class="title-text">
        <h1 class="uppercase">Login</h1>
      </div>
    </div>
  </div>
</section> <!-- end page title -->

<!-- login -->
<section class="section-wrap login-register pt-0 pb-40">
  <div class="container">
    <div class="row">
      <div class="col-sm-10 col-sm-offset-1 mb-40">
        <div class="login">
          <p class="form-row form-row-wide">
            <label>username or email
              <abbr class="required" title="required">*</abbr>
            </label>
            <input type="text" class="input-text" placeholder="" value="">
          </p>
          <p class="form-row form-row-wide">
            <label>password
              <abbr class="required" title="required">*</abbr>
            </label>
            <input type="text" class="input-text" placeholder="" value="">
          </p>
          <input type="submit" value="Login" class="btn">
          <input type="checkbox" class="input-checkbox" id="remember" name="remember" value="1">
          <label for="remember" class="checkbox">Remember me</label>
          <a href="#">Lost Password?</a>
        </div>
      </div>
    </div>
  </div>
</section> <!-- end login -->
    
<?php include $ROOT.'public/template/site/footer.php' ?>