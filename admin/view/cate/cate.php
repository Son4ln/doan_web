<?php include $GLOBALS['ROOT'].'public/template/admin/header.php'; ?>

  <div class="content">
  	<div class="container-fluid">
  	  <div class="row">
		<div class="col-lg-12 col-md-12">
		  <div class="card">
		  	<div class="card-header" data-background-color="orange">
	          <h4 class="title">Danh sách nhãn hiệu</h4>
	          <p class="category">Hiển thị và thao tác với nhãn hiệu</p>
	        </div>

	        <div class="card-content table-responsive">
	          <table id="brands-list" class="table table-striped table-bordered table-hover">
	            <thead class="text-warning">
	              <th>ID</th>
	              <th>Name</th>
	              <th>Logo</th>
	              <th>Trạng thái</th>
	              <th>Thao tác</th>
	            </thead>

	            <tbody>
	              <tr>
	            	<td>1</td>
	            	<td>2</td>
	            	<td>3</td>
	            	<td>4</td>
	            	<td>5</td>	
	              </tr>
	            </tbody>
	          </table>
	        </div>
		  </div>
		</div>
	  </div>
  	</div>
  </div>

  <script type="text/javascript">
  	$(document).ready(function() {
      $('#brands-list').DataTable();
  	});
  </script>

<?php include $GLOBALS['ROOT'].'public/template/admin/footer.php'; ?>