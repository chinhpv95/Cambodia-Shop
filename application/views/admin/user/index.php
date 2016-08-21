<?php $this->load->view('admin/user/head', $this->data)?>
<div class="line"></div>
<div class="wrapper">
    <div class="widget">
        <?php $this->load->view('admin/message',$this->data)?>
        <div class="title">
            <span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck"></span>
            <h6>Danh sách Thành viên</h6>
            <div class="num f12">Tổng số: <b><?php echo $total?></b></div>
        </div>

        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
            <thead>
            <tr>
                <td style="width:10px;"><img src="<?php echo public_url('admin')?>/images/icons/tableArrows.png" /></td>
                <td>ID</td>
                <td>Name</td>
                <td>User Name</td>
                <td>Địa chỉ</td>
                <td>Số điện thoại</td>
                <td>Email</td>
                <td>Số chứng minh nhân dân</td>
                <td style="width:100px;">Hành động</td>
            </tr>
            </thead>

            <tfoot>
            <t
            <tr>

                <td colspan="7">

                    <div class="list_action itemActions">
                        <a href="#submit" id="submit" class="button blueB" url="user/del_all.html">
                            <span style='color:white;'>Xóa hết</span>
                        </a>
                    </div>

                    <div class='pagination'>
                    </div>
                </td>
                <td></td>
                <td></td>
            </tr>
            </tfoot>

            <tbody>
            <?php foreach ($list as $row):?>
                <tr>
                    <td><input type="checkbox" name="id[]" value="<?php echo $row->customerNumber?>" /></td>

                    <td class="textC"><?php echo $row->customerNumber?>
                    </td>


                    <td class="textC"><span title="<?php echo $row->customerName?>" class="tipS">
							<?php echo $row->customerName?>
                    </span>
                    </td>


                    <td class="textC"><span title="<?php echo $row->username?>" class="tipS">
							<?php echo $row->username?>
                    </span>
                    </td>

                    <td class="textC"><span title="<?php echo $row->address?>" class="tipS">
							<?php echo $row->address?>
                    </span>
                    </td>


                    <td class="textC"><span title="<?php echo $row->phone?>" class="tipS">
							<?php echo $row->phone?>
                    </span>
                    </td>
                    
                    <td class="textC"><span title="<?php echo $row->email?>" class="tipS">
							<?php echo $row->email?>
                    </span>
                    </td>

                    <td class="textC"><span title="<?php echo $row->identityCard?>" class="tipS">
							<?php echo $row->identityCard?>
                    </span>
                    </td>


                    <td class="option">
<!--                        <a href="--><?php //echo admin_url('admin/edit/'.$row->customerNumber)?><!--" title="Chỉnh sửa" class="tipS ">-->
<!--                            <img src="--><?php //echo public_url('admin')?><!--/images/icons/color/edit.png" />-->
<!--                        </a>-->
                        <a href="<?php echo admin_url('user/delete/'.$row->customerNumber)?>" title="Xóa" class="tipS verify_action" >
                            <img src="<?php echo public_url('admin')?>/images/icons/color/delete.png" />
                        </a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
