<!-- head -->
<?php $this->load->view('admin/order/head', $this->data)?>

<div class="line"></div>

<div id="main_product" class="wrapper">
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
                <td style="width:55px;">Hành động</td>
            </tr>
            </thead>


            <tbody class="list_item">
            <?php foreach ($list as $row):?>
            <tr>

                <td class="textC"><?php echo $row['orderNumber']?></td>

                <td>
                    <?php echo $row['customerName']?>
                </td>

                <td class="textR red format_number" ><?php echo $row['SUM(orderdetails.quantityOrdered*orderdetails.priceEach)']?></td>

                <td>
                    dathang
                </td>


                <td class="status textC">
						<span class="pending">
						<?php echo $row['status']?>
                        </span>
                </td>

                <td class="textC"><?php echo $row['orderDate']?></td>

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


