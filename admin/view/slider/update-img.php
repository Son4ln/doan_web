<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

  <div class="content">
    <div class="container-fluid">
      <?php 
        BasicLibs::getAlert();
      ?>

      <div class="row">
        <div class="col-xs-12">
          <div class="card">
            <div class="card-header" data-background-color="purple"">
              <h4 class="title">Chỉnh sửa banner</h4>
              <p class="category">Hiển thị và thao tác với banner quảng cáo</p>
            </div>

            <div class="card-content">
              <?php
                BasicLibs::getAlert();
              ?>

              <form action="?action=updateImgSlideAct" method="post" enctype="multipart/form-data">
                <input type="hidden" name="slide-id" id="slide-id" value="<?php echo $data['slide_id']; ?>">

                <center>
                  <img src="../../upload/sliders/<?php echo $data['slide_image']; ?>" width="80px" id="review-img" />
                </center>

                <input type="hidden" name="curr-img" id="old-img" value="<?php echo $data['slide_image']; ?>">

                <div class="row text-center">
                  <label class="btn btn-file btn-primary">
                    <i class="fa fa-folder"></i> 
                    <input type="file" name="slide-img" id="slide-img" style="display: none">
                  </label>

                  <button type="button" class="btn btn-primary" id="clear-img"><i class="fa fa-times"></i></button>
                  <button type="submit" class="btn btn-primary" id="save"><i class="fa fa-floppy-o"></i></button>
                    
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    let dataImg = document.querySelector('[name="curr-img"]').value;

  //hiển thị ảnh để xem trước
    let uploadImg = document.querySelector('[name="slide-img"]');
    uploadImg.addEventListener('change', () => {
      let review = document.getElementById('review-img');
      let input = document.querySelector('[name="slide-img"]');
      let file = input.files[0];
      let reader = new FileReader();
      reader.onload = (e) => {
        review.src = e.target.result;
      }
      reader.readAsDataURL(file);
    });

    let clearImg = document.getElementById('clear-img');
    clearImg.addEventListener('click', () => {
      let review = document.getElementById('review-img');
      let input = document.querySelector('[name="slide-img"]');
      review.src = '../../upload/sliders/'+dataImg;
      input.value = '';
    });
  </script>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>