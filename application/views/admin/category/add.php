<!-- head -->
<?php $this->load->view('admin/category/head', $this->data)?>

<div class="line"></div>

<div class="wrapper">
      <div class="widget">
           <div class="title">
			<h6>Thêm mới danh mục sản phẩm</h6>
		</div>

      <form id="form" class="form" enctype="multipart/form-data" method="post" action="">
          <fieldset>

			  <div class="formRow">
				  <label for="param_name" class="formLeft">Mã sô:<span class="req">*</span></label>
				  <div class="formRight">
					  <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('categoryId')?>" name="categoryId"></span>
					  <span class="autocheck" name="name_autocheck"></span>
					  <div class="clear error" name="name_error"><?php echo form_error('categoryId')?></div>
				  </div>
				  <div class="clear"></div>
			  </div>
                
                <div class="formRow">
                	<label for="param_name" class="formLeft">Tên:<span class="req">*</span></label>
                	<div class="formRight">
                		<span class="oneTwo"><input type="text" _autocheck="true" id="param_name" value="<?php echo set_value('categoryName')?>" name="categoryName"></span>
                		<span class="autocheck" name="name_autocheck"></span>
                		<div class="clear error" name="name_error"><?php echo form_error('categoryName')?></div>
                	</div>
                	<div class="clear"></div>
                </div>
			  
                <div class="formSubmit">
	           			<input type="submit" class="redB" value="Thêm mới">
	           	</div>
          </fieldset>
      </form>
      
      </div>
</div>
