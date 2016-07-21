<?php $this->load->view('admin/product/head', $this->data)?>
<div class="wrapper">

    <!-- Form -->
    <form class="form" id="form" action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images')?>/icons/dark/add.png" class="titleIcon">
                    <h6>Chỉnh sửa thông tin Sản phẩm</h6>
                </div>

                <ul class="tabs">
                    <li><a href="#tab1">Thông tin chung</a></li>
<!--                    <li><a href="#tab2">SEO Onpage</a></li>-->
                    <li><a href="#tab3">Bài viết</a></li>
                </ul>
                <div class="tab_container">

                    <div id="tab1" class="tab_content pd0">
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input name="productName" id="param_name" _autocheck="true" type="text" value="<?php echo $product->productName?>"></span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label for="param_name" class="formLeft">Mã số:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo"><input type="text" _autocheck="true" id="param_name" name="productCode" value="<?php echo $product->productCode?>"></span>
                                <span class="autocheck" name="name_autocheck"></span>
                                <div class="clear error" name="name_error"><?php echo form_error('productCode')?></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <div class="formRow">
                            <label class="formLeft">Hình ảnh:<span class="req">*</span></label>
                            <div class="formRight">
                                <div class="left"><input type="file" id="image" name="image"></div>
                                <img src="<?php echo base_url('/upload/product/'.$product->image_link)?>" style="padding: 0px 30px; height: 50px; width: 100px; margin: -9px;">
                                <div name="image_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

<!--                        --><?php // $image_list = json_decode($product->image_list);?>
                        <div class="formRow">
                            <label class="formLeft">Ảnh kèm theo:</label>
                            <div class="formRight">
                                <div class="left"><input type="file" id="image_list" name="image_list[]" multiple=""></div>
<!--                                --><?php //if (is_array($image_list)):?>
<!--                                --><?php //foreach ($image_list as $image ):?>
<!--                                    <img src="--><?php //echo base_url('/upload/product/'.$image )?><!--" style="padding: 0px 30px; height: 50px; width: 100px; margin: -9px;">-->
<!--                                --><?php //endforeach;?>
<!--                                --><?php //endif;?>
                                <div name="image_list_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <!-- Price -->
                        <div class="formRow">
                            <label class="formLeft" for="param_price">
                                Giá :
                                <span class="req">*</span>
                            </label>
                            <div class="formRight">
                                <span class="oneTwo">
			                         <input name="price" style="width:100px" id="param_price" class="format_number" _autocheck="true" type="text" value="<?php echo $product->price?>">
			                         <img class="tipS" title="Giá bán sử dụng để giao dịch" style="margin-bottom:-8px" src="<?php echo public_url('admin/')?>/crown/images/icons/notifications/information.png">
                                 </span>
                                <span name="price_autocheck" class="autocheck"></span>
                                <div name="price_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <!-- Price -->



                        <div class="formRow">
                            <label class="formLeft" for="param_cat">Thể loại:<span class="req">*</span></label>
                            <div class="formRight">
                                <select name="catelory"   _autocheck="true" id="param_cat" class="left" >
                                    <option value=""></option>
                                    <!-- kiem tra danh muc co danh muc con hay khong -->
                                    <?php foreach ($catalogs as $row):?>
                                            <option value="<?php echo $row->categoryID?>" <?php echo ($product->categoryId == $row->categoryID) ? 'selected' : ''?>><?php echo $row->categoryName?></option>
                                    <?php endforeach;?>
                                </select>

                                <span name="cat_autocheck" class="autocheck"></span>
                                <div name="cat_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>


                        <!-- warranty -->
                        <div class="formRow hide"></div>
                    </div>

                    <div id="tab2" class="tab_content pd0">
                        <div class="formRow hide"></div>
                    </div>

                    <div id="tab3" class="tab_content pd0">
                        <div class="formRow">
                            <label class="formLeft">Nội dung:</label>
                            <div class="formRight">
                                <textarea name="description" id="param_content" class="editor"><?php echo $product->description?></textarea>
                                <div name="content_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow hide"></div>
                    </div>


                </div><!-- End tab_container-->

                <div class="formSubmit">
                    <input type="submit" value="Cập nhập" class="redB">
                    <input type="reset" value="Hủy bỏ" class="basic">
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>



