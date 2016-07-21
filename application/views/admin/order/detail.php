<!-- head -->
<?php $this->load->view('admin/order/head', $this->data)?>

<div class="line"></div>

<div id="main_product" class="wrapper">
    <div class="widget">

        <div  class="title" style=" font-size: 20px; font-weight: bold; padding: 15px 0px 0px 10px;">Thông tin đơn hàng</div>
        <div class="widget">
            <div class="title">
                <!--            <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>-->
                <h6 style="font-size: 15px;">
                    Thông tin khách hàng
                </h6>
                <!--            <div class="num f12">Số lượng: <b>--><?php //echo $total_rows?><!--</b></div>-->
            </div>


            <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">


                <thead>
                <tr>
                    <!--                <td style="width:10px;"><img src="--><?php //echo public_url('admin/images')?><!--/icons/tableArrows.png"></td>-->
                    <td style="width:60px;">Tên khách hàng</td>
                    <td style="width:75px;">Số điện thoại</td>
                    <td style="width:90px;">Địa chỉ giao hàng</td>
                    <td style="width:90px;">Thời gian đặt hàng</td>
                    <!--                <td style="width:100px;">Giao dịch</td>-->
                    <td style="width:75px;">Thời gian giao hàng</td>
                    <td style="width:75px;">Thanh toán</td>

                </tr>
                </thead>

                <tfoot class="auto_check_pages">

                </tfoot>

                <tbody class="list_item">
                <tr>
                    <!--                    <td><input type="checkbox" name="id[]" value="--><?php //echo $row['productCode']?><!--"></td>-->

                    <td class="textC"><?php echo $list[0]['customerName']?></td>

                    <td>
                        <?php echo $list[0]['phone']?>
                    </td>

                    <td class="textC" ><?php echo $list[0]['address']?></td>
                    <td class="textC" ><?php echo $list[0]['orderDate']?></td>
                    <td class="textC" ><?php echo $list[0]['requiredDate']?></td>
                    <td class="textC" ><?php echo "Tiền"?></td>

                </tr>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="title">
<!--            <span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>-->
            <h6 style="font-size: 15px;">
                Đơn hàng
            </h6>
<!--            <div class="num f12">Số lượng: <b>--><?php //echo $total_rows?><!--</b></div>-->
        </div>


        <table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable" id="checkAll">


            <thead>
            <tr>
<!--                <td style="width:10px;"><img src="--><?php //echo public_url('admin/images')?><!--/icons/tableArrows.png"></td>-->
                <td style="width:60px;">Mã sản phẩm</td>
                <td style="width:75px;">Tên sản phẩm</td>
                <td style="width:90px;">Đơn giá</td>
<!--                <td>Hình thức</td>-->
<!--                <td style="width:100px;">Giao dịch</td>-->
                <td style="width:75px;">Số lượng</td>
                <td style="width:75px;">Thành tiền</td>

            </tr>
            </thead>

            <tfoot class="auto_check_pages">

            </tfoot>

            <tbody class="list_item">
            <?php foreach ($product as $row):?>
                <tr>
<!--                    <td><input type="checkbox" name="id[]" value="--><?php //echo $row['productCode']?><!--"></td>-->

                    <td class="textC"><?php echo $row['productCode']?></td>

                    <td >
                        <?php echo $row['productName']?>
                    </td>

                    <td class="textC red format_number" ><?php echo $row['price']?></td>




                    <td class="status textC">
						<span class="pending">
						<?php echo $row['quantityOrdered']?>
                        </span>
                    </td>

                    <td class="textC red format_number"><?php echo ($row['orderdetails.quantityOrdered*orderdetails.priceEach'])?></td>


                </tr>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <div style="margin: 10px;text-align: right;color: #a61717">Tổng tiền : <?php echo $list[0]['SUM(orderdetails.quantityOrdered*orderdetails.priceEach)']?></div>

</div>


