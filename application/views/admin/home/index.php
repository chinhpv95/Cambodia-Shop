<div class="titleArea">
    <div class="wrapper">
        <div class="pageTitle">
            <h5>Bảng điều khiển</h5>
            <span>Trang quản lý hệ thống</span>
        </div>

        <div class="clear"></div>
    </div>
</div>
<div class="line"></div>
<div class="wrapper">

    <div class="widgets">
        <!-- Stats -->

        <!-- Amount -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images')?>/icons/dark/money.png" class="titleIcon">
                    <h6>Doanh số</h6>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                    <tbody>

                    <tr>
                        <td class="fontB blue f13">Tổng doanh số</td>
                        <td class="textR webStatsLink red " style="width:120px;" ><?php echo number_format($tongso[0]['SUM(orderdetails.quantityOrdered*orderdetails.priceEach)'])?> VNĐ</td>
                    </tr>

                    <tr>
                        <td class="fontB blue f13">Doanh số hôm nay</td>
                        <td class="textR webStatsLink red" style="width:120px;">0 VNĐ</td>
                    </tr>

                    <tr>
                        <td class="fontB blue f13">Doanh số theo tháng</td>
                        <td class="textR webStatsLink red" style="width:120px;">
                            0 VNĐ
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <!-- User -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images')?>/icons/dark/users.png" class="titleIcon">
                    <h6>Thống kê dữ liệu</h6>
                </div>

                <table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
                    <tbody>

                    <tr>
                        <td>
                            <div class="left">Tổng số giao dịch</div>
                            <div class="right f11"><a href="<?php echo admin_url('order')?>">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo $total_rows?>				</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="left">Tổng số sản phẩm</div>
                            <div class="right f11"><a href="<?php echo admin_url('product')?>">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            <?php echo $total_rows_product?>					</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="left">Tổng số bài viết</div>
                            <div class="right f11"><a href="admin/news.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            0					</td>
                    </tr>

                    <tr>
                        <td>
                            <div class="left">Tổng số thành viên</div>
                            <div class="right f11"><a href="admin/user.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            0					</td>
                    </tr>
                    <tr>
                        <td>
                            <div class="left">Tổng số liên hệ</div>
                            <div class="right f11"><a href="admin/contact.html">Chi tiết</a></div>
                        </td>

                        <td class="textC webStatsLink">
                            0					</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="clear"></div>

        <!-- Giao dich thanh cong gan day nhat -->

        <div class="widget">
            <div class="title">
                <h6>
                    Danh sách Giao dịch
                </h6>
                <div class="num f12">Số lượng: <b><?php echo $total_rows?></b></div>
            </div>


            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">


                <thead>
                <tr>
                    <td style="width:60px;">Mã số</td>
                    <td style="width:75px;">Khách hàng</td>
                    <td style="width:90px;">Số tiền</td>
                    <td>Hình thức</td>
                    <td style="width:100px;">Giao dịch</td>
                    <td style="width:75px;">Ngày tạo</td>
                    <td style="width:75px;">Ngày cập nhập</td>
                    <td style="width:55px;">Hành động</td>
                </tr>
                </thead>

                <tfoot class="auto_check_pages">

                </tfoot>

                <tbody class="list_item">
                <?php foreach ($list as $row):?>
                    <tr>

                        <td class="textC"><?php echo $row['orderNumber']?></td>

                        <td>
                            <?php echo $row['customerName']?>
                        </td>

                        <td class="textR red "><?php echo number_format($row['SUM(orderdetails.quantityOrdered*orderdetails.priceEach)']) ?> VNĐ </td>

                        <td class="textC ">
                            dathang
                        </td>


                        <td class="status textC">
						<span class="pending">
						<?php echo $row['status']?>
                        </span>
                        </td>

                        <td class="textC"><?php echo $row['createDate']?></td>
                        <td class="textC"><?php echo $row['updateDate']?></td>
                        <td class="textC">
                            <a title="Xem chi tiết" class="tipS" target="" href="<?php echo admin_url('order/detail/'.$row['orderNumber'])?>">
                                <img src="<?php echo public_url('admin/images')?>/icons/color/view.png">
                            </a>

                        </td>
                    </tr>
                    </tr>
                <?php endforeach;?>
                </tbody>

            </table>
        </div>

    </div>

</div>
<div class="clear mt30"></div>