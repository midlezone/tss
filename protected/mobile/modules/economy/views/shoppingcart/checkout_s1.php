<div class="sc sc-checkout container">
    <h2 class="product-category"><?php echo Yii::t('shoppingcart', 'checkoutandorder'); ?></h2>
    <div class="row sc-userinfo">
        <div class="col-xs-9 ">
            <h3 class="sc-account-text" style="font-weight: bold;">Nhập Mã Khuyễn Mãi</h3>
           
			<?php if ($code == null): ?>
				<div class="promotion" style="margin-top: 20px;"> 
					<form class="form-inline"  action="<?php echo $this->createUrl('/economy/shoppingcart/update', array('key' => $key)); ?>" method="POST" >
						 <input id="code" placeholder="Mã Giảm Giá" type="text" class="form-control sc-quantity" max-lenght="3" value="" max-lenght="6"/>					
						 <input type="submit" value="Xác Nhận"  class="btn btn-xs btn-primary" style="margin-top: 15px;"/>
						 <div class="errorMessage" style="display:none;margin-top: 20px; color: red">Mã Không Chính Xác</div>
						 <div class="success" style="display:none; margin-top: 20px; color: red; ">Bạn đã nhập mã khuyễn mãi thành công</div>
						
					</form>
				</div>
			<?php else: ?>
				<div class="promotion" style="margin-top: 20px;"> 
					<form class="form-inline"  action="" method="POST" >
						 <input id="code" disabled placeholder="Mã Giảm Giá" type="text" class="form-control sc-quantity" max-lenght="3" value="<?php echo $code; ?>" max-lenght="6"/>					
						 <input type="submit" value="Xác Nhận"  class="btn btn-xs btn-primary" style="margin-top: 20px;"/>
						 <div class="success" style="display:block;margin-top: 15px;
							color: #093975;
							font-size: 15px;
							font-weight: bold;
							text-transform: uppercase;">Bạn đã nhập mã khuyễn mãi thành công</div>
						
					</form>
				</div>
			<?php endif; ?>
			
        </div>
      
    </div>
    <div class="accordion-inner">
        <?php
        $this->renderPartial('pack1', array(
            'shoppingCart' => $shoppingCart,
            'update' => false,
        ));
        ?>
    </div>
	<a href="<?php echo Yii::app()->createUrl('/economy/shoppingcart/checkout', array('step' => 's2', 'user' => 'guest')); ?>" class="btn btn-sm btn-success">
               Thanh Toán
    </a>
</div>
<script>
	
	$(".main-nav-store-link").css("display", "block");
	$(".menuMain").css("display", "none");

</script>
<script type="text/javascript">
$(document).ready(function() {
	
    // process the form
    $('.form-inline').submit(function(event) {
		
        var code = $('#code').val();
        var url = "/economy/shoppingcart/updateCode?code=" + code; 	
        // process the form
        $.ajax({
            type: 'POST',
            url: url,
            data: code,
            dataType: 'json',
            success: function (data) {
				if (data.status == 1) {
					 $(".errorMessage").hide();
					 $( "#code" ).prop( "disabled", true );
					 document.location = "/economy/shoppingcart/updateCode?code=" + code;
				} else  {
					$(".errorMessage").show();
					$(".success").hide();
				}
               
            },
            error: function (data) {
               
            },			
        })
		
        event.preventDefault();
    });

});


</script>