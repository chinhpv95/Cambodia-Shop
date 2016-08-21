

<script type="text/javascript">
    function deleteproduct(id){
        $.ajax({

            url : "<?php echo admin_url('order/deleteorder')?>",
            type : "post",
            //dateType:"text",
            data : {
                id : id
            },
            success : function (result){
                var row = document.getElementById(id);
                row.parentNode.removeChild(row);
            }

        });
    }

    function load(rowid,id){
        $.ajax({
            url : "<?php echo admin_url('order/updateordoer')?>",
            type : "post",
            //dateType:"text",
            data : {
                rowid : rowid,
                id     : document.getElementById(id).value

            },
            success : function (result){
            }

        });
    }

    function load1(rowid,qty){
        $.ajax({
            url : "<?php echo admin_url('order/updateordoer')?>",
            type : "post",
            //dateType:"text",
            data : {
                rowid : rowid,
                id     : qty,

            },
            success : function (result){
            }

        });
    }

    function number(n) {
        var  i = 0;
        var str = '000';
        var a =0;
        for(i=3;i<n.length;i+=3){
            str = n.slice(n.length-i-3,n.length-i) + ','+str;
            a++;
        }
        var  b = n.length- str.length + a;
        return n.slice(0,b) +str
    }

    function addproduct(id){
        $.ajax({
            url : "<?php echo admin_url('order/addproduct')?>",
            type : "post",
            //dateType:"text",
            data : {
                productCode : id
            },
            success : function (result){
                var getData = $.parseJSON(result);
                var r = (getData.rowid);
                var a = getData.price;
               // alert(getData.bn);
                if (getData.tang==1){
                    $("#myTable tbody").append(
                        "<tr id='"+getData.rowid+"'>"+
                        "<td class='textC'>"+getData.name+"</td>"+
                        "<td class='textC'>"+"<a  >"+"<b>"+number(getData.price)+' VNĐ'+"</b>"+"</a>"+"</td>"+
                        "<td class='textC'><div><input  id='"+getData.rowid+"' style='width: 37px;' type='number' " +
                        "value='"+getData.qty+"' onchange='load1(id,value)'> </input></div></td>"+
                        "<td class='textC'><a id='"+getData.rowid+"' onclick='deleteproduct(id)'><img src='http://localhost/Project/public/admin/images/icons/color/delete.png'></a></td>"+
                        "</tr>");
                }else {
                    alert('Sản phẩm đã được thêm')
                }

            }
        });
    }



    function addcart() {
        var name = document.getElementById('param_name').value;
        var phone = document.getElementById('param_phone').value;
        var address = document.getElementById('param_address').value;
        $.ajax({
            url : "<?php echo admin_url('order/addorder')?>",
            type : "post",
            //dateType:"text",
            data : {
                name :  name,
                phone   : phone,
                address :address,

            },
            success : function (result){
                var getData = $.parseJSON(result);
                if (getData.nameerro){
                    (document.getElementById("name_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.phoneerro){
                    (document.getElementById("phone_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.addresserro){
                    (document.getElementById("address_error").innerHTML) = 'Bắt buộc.';
                }
                if (getData.total_items==0){
                    alert('Không có sản phẩm nào.')
                }
                if (getData.true){
                    alert('Đặt hàng thành công!');
                    window.location.href = 'http://localhost/Project/admin';
                }
//                alert(result);
            }

        });

    }


        function timkiem(){
            var phone = document.getElementById('khachhang').value;
            $.ajax({
                url : "<?php echo admin_url('order/timkiem')?>",
                type : "post",
                //dateType:"text",
                data : {
                    phone : phone,
                },
                success : function (result){
                if (result != false){
                    var getData = $.parseJSON(result);
                    document.getElementById('param_name').value = getData.customerName;
                    document.getElementById('param_phone').value = getData.phone;
                    document.getElementById('param_address').value = getData.address;
                   }
                }

            });
        }
</script>
<?php $this->load->view('admin/order/head', $this->data)?>
<form class="form" id="form" action="" method="post" enctype="multipart/form-data">
    <div class="line"></div>
<div class="wrapper">
    <div class="widgets">
        <div class="oneTwo">
            <div id="main_product" class="wrapper">
                <div class="widget">
                    <div class="title">
                        <h6>
                            Danh sách sản phẩm
                        </h6>
                    </div>
                    <table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
                        <thead class="filter"><tr><td colspan="6">
                                <form method="get" action="<?php echo admin_url('order/add/')?>" class="list_filter form">
                                    <table width="80%" cellspacing="0" cellpadding="0"><tbody>
                                        <tr>
                                            <td style="width:40px;" class="label"><label for="filter_id">Tên</label></td>
                                            <td style="width:155px;" class="item"><input type="text" style="width:155px;" id="filter_iname" value="<?php echo $this->input->get('name')?>" name="name"></td>
                                            <td style="width:150px">
                                                <input type="submit" value="Lọc" class="button blueB">
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </form>
                            </td></tr>
                        </thead>
                        <thead>
                        <tr>
                            <td style="width:60px;">Mã số</td>
                            <td>Tên</td>
                            <td>Giá</td>
                            <td style="width:120px;">Hành động</td>
                        </tr>
                        </thead>
                        <tfoot class="auto_check_pages">
                        <tr>
                            <td  colspan="6">
                                <div style="margin-top: 10px"  class="pagination">
                                    <?php echo $this->pagination->create_links()?>
                                </div>
                            </td>
                        </tr>
                        </tfoot>
                        <tbody class="list_item">
                        <?php foreach ($list as $row):?>
                            <tr class="row_<?php echo $row->productCode?>">
                                <td class="textC"><?php echo $row->productCode?></td>
                                <td>
                                    <a target="_blank" title="" class="tipS" href="">
                                        <b><?php echo $row->productName?></b>
                                    </a>
                                </td>
                                <td class="textR">
                                    <a target="_blank" title="" class="tipS" href="" >
                                        <b class="format_number"><?php echo $row->price?></b>
                                    </a>
                                </td>
                                <td class="option textC">
                                    <a class="tipS " title="Thêm" onclick="addproduct('<?php echo $row->productCode?>')">
                                        <img src="<?php echo public_url('admin/images')?>/icons/color/tick.png">
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <div class="widget">
                    <form method="post" action="" class="list_filter form">
                    <table  id="myTable" width="100%" cellspacing="0" cellpadding="0"  class="sTable mTable myTable">
                        <thead>
                        <tr>
                            <td>Tên</td>
                            <td>Giá</td>
                            <td>Số lượng</td>
                            <td>Xóa sản phẩm</td>
                        </tr>
                        </thead>

                        <tbody class="list_item">
                        <?php foreach ($carts as $row):?>
                        <tr class="row_" id="<?php echo $row['rowid'] ?>">
                            <td class="textC"><?php echo $row['name'] ?></td>
                            <td  class="textC">
                                <a target="_blank" title="" class="tipS" href="">
                                    <b><?php echo number_format($row['price'])?> VNĐ</b>
                                </a>
                            </td>
                            <td class="product-quantity textC">
                                <div class="quantity buttons_added">
                                    <input  style="width: 37px;" type="number" size="5" id="qty_<?php echo $row['id']?>"  class="input-text qty text" title="qty"
                                            value="<?php echo $row['qty']?>" min="0" step="1" onchange="load('<?php echo $row['rowid'] ?>','<?php echo 'qty_'.$row['id'] ?>')">
                                </div>
                            </td>
                            <td class="textC" >
                                <a id="delete"  onclick="deleteproduct('<?php echo $row['rowid'] ?>')" >
                                    <img src="<?php echo public_url('admin/images')?>/icons/color/delete.png">
                                </a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        <!-- User -->
        <div class="oneTwo">
            <div class="widget">
                <div class="title">
                    <img src="<?php echo public_url('admin/images')?>/icons/dark/users.png" class="titleIcon">
                    <h6>Khách hàng</h6>
                </div>
                <div class="widget">
                    <form class="form" id="form"  method="post" enctype="multipart/form-data" action="">
                        <fieldset>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Số điện thoại:</label>
                                <div class="formRight">
                                    <span class="oneTwo"><input name="phone" id="khachhang" _autocheck="true" type="text" value=""></span>
                                    <span class="oneTwo"><input type="button" value="Tìm kiếm" class="button blueB" onclick="timkiem()"></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                </div>
                                <div class="clear"></div>
                            </div>

                            <div class="formRow">
                                <label class="formLeft" for="param_name">Tên khách hàng:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value=""></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div class="clear error" id="name_error" style="padding: 3px"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_username">Số điện thoại:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input name="phone" id="param_phone" _autocheck="true" type="text" value=""></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div class="clear error" name="phone_error" id="phone_error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formRow">
                                <label class="formLeft" for="param_email">Địa chỉ:<span class="req">*</span></label>
                                <div class="formRight">
                                    <span class="oneTwo"><input name="address" id="param_address" _autocheck="true" type="text" value=""></span>
                                    <span name="name_autocheck" class="autocheck"></span>
                                    <div name="address_error" class="clear error" id="address_error"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="formSubmit">
                                <input type="button" value="Đặt hàng" class="redB" onclick="addcart()">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <div class="clear"></div>
    </div>
</div>
<div class="clear mt30"></div>
