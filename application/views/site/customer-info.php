<body>

<div class="container">
	<div class="row">
        <div class="bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon"></h4><br/>Thông tin cá nhân
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon"></h4><br/>Lịch sử mua hàng
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- customer infor -->
                <div class="bhoechie-tab-content active">
                  <div id="customer_details" >
                  <div class="woocommerce-billing-fields">
                    <p >
                      <label for="name">Tên đầy đủ : </label>
                      <input type="text" id="name" name="name" value="" class="account_show" />
                    </p>
                    <p >
                      <label for="password">Password : </label>
                      <input type="text" id="password" name="password" value="" class="account_show" />
                    </p>
                    <p >
                      <label for="address">Địa chỉ : </label>
                      <input type="text" id="address" name="address" value="" class="account_show" />
                    </p>
                    <p >
                      <label for="email">Email : </label>
                      <input type="text" id="email" name="email" value="" class="account_show" />
                    </p>
                    <p >
                      <label for="tel">Số điện thoại : </label>
                      <input type="text" id="tel" name="tel" value="" class="account_show" />
                    </p>
                    <p >
                      <label for="identityCard">Số chứng minh thư : </label>
                      <input type="text" id="idententityCard" name="identityCard" value="" class="account_show" />
                    </p>
                    <p class="submit">
                      <input type="hidden" class="hidden" name="back" value="" /> <input type="submit" id="SubmitChange" name="SubmitChange" class="button_large" value="Submit" />
                      <input type="hidden" class="hidden" name="SubmitChange" value="Submit" />
                    </p>
                  </div>
                  </div>
                </div>
                <!-- shopping history -->
                <div class="bhoechie-tab-content">
                    
                </div>
            </div>
        </div>
  </div>
</div>

</body>
