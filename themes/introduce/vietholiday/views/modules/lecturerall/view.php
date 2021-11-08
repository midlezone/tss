<?php if (count($lecturers)) {
    ?>
	<div class="col_lt">
     <div class="col555">           
            <div class="boxTourHomeList1">
			<div class="doc_head_212">
				 <span>
						 Ý KIẾN KHÁCH HÀNG!
						 </span>
				</div>
			<div class="customer-feedback" style="visibility: visible; ">
				
				<div class="feedback">
				<div class="bx-wrapper" style="max-width: 100%; margin: 0px auto;">
				<div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 135px;">
				<ul class="bxsliderCustomerIdea" style="height: 150px; width: auto; position: relative; transition-duration: 0s; transform: translate3d(0px, -405px, 0px);">
					 <?php foreach ($lecturers as $lecturer) { ?>

						<li class="bx-clone" style="float: none; list-style: none; position: relative; width: 540px;"><span><i>06/12/2016 9:30:15 SA</i></span>
						<p><a href="#"
						title="<?php echo $lecturer['description'] ?>"><?php echo $lecturer['description'] ?></a></p>
						</li>

					<?php } ?>
				</ul>
				</div>
				</div>
				</div>
				</div>
				
				<script>
					$(document).ready(function () {
						$('.bxsliderCustomerIdea').bxSlider({
							pager: false,
							controls: false,
							auto: true,
							mode: 'vertical',
							//easing: 'ease-out',
							speed : 700
						});
					});
				</script>
            </div>
      </div>
</div>
<?php } ?>
