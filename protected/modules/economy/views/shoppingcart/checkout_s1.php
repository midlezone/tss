<div class="sc sc-checkout container">
    <h2 class="product-category"><?php echo Yii::t('shoppingcart', 'checkoutandorder'); ?></h2>
  
    <div class="accordion-inner">
        <?php
        $this->renderPartial('pack', array(
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