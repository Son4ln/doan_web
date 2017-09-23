<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>
	<div class="content">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-lg-12 col-md-12">
    			<div class="card">
    				<div class="card-header" data-background-color="purple">
    					<h4 class="title">Danh sách ảnh chi tiết của sản phẩm <b><?php echo $productName ?></b></h4>
              <p class="category">Hiển thị và thao tác với hình ảnh</p>
    				</div>

    				<div class="card-content table-responsive">
              <?php
                BasicLibs::getAlert();
              ?>
              <div class="row">
                <?php
                  foreach ($dataImg as $key) {
                    $count ++;
                ?>

                <div class="col-md-3">
                  <img src="../../upload/products/<?php echo $key['image']; ?>">

                  <center>
                    <a href="?action=delImg&id=<?php echo $key['image_id']; ?>&prodId=<?php echo $id; ?>" class="btn btn-primary">Xóa</a>
                  </center>
                </div>
                <?php
                    if ($count % 4 == 0) {
                      echo '</div><div class="row">';
                    }
                  }
                ?>
              </div>

              <form method="post" enctype="multipart/form-data" action="?action=addImg&productId=<?php echo $id; ?>">
                <div class="row">
                  <div id="add-more-img" class="col-md-12">
                    
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <button id="add-img" type="button" class="btn btn-primary">Thêm hình ảnh</button>

                      <button id="save" class="btn btn-primary hidden">Lưu lại</button>
                    </center>
                  </div>
                </div>
              </form>
            </div>
    			</div>
    		</div>
    	</div>
    </div>
  </div>

  <script type="text/javascript">
    let addMore = document.getElementById('add-img');
    let count = 0;
    addMore.addEventListener('click', () => {
      let save = document.getElementById('save');
      save.classList.remove('hidden');
      let content = document.getElementById('add-more-img');
      let row = document.createElement('div');
      row.setAttribute('class', 'row');

      let div = document.createElement('div');
      div.setAttribute('class', 'col-md-3');
      div.innerHTML = `
        <input type="file" name="add-img[]"/>
      `;

      if (count == 0) {
        content.appendChild(row);
      }

      if (count % 4 == 0) {
        content.appendChild(row);
      }
      content.appendChild(div);
      count ++;
    });
  </script>
<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>