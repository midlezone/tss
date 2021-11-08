<?php $this->beginContent('//layouts/main'); ?>
<?php
echo $content;
?>
	<div class="container">
		<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_TOP_CENTER)); ?>

		<div class="left">			
			<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_LEFT)); ?>
		
		</div>
		<div class="right">
			<div class="slider">
				<?php $this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_BEGIN_CONTENT)); ?>
			</div>
		 	<div class="col-sm-6 xien">
				 <?php
				$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK1));
				?>
			</div>
			<div class="col-sm-6 info">
				 <?php
				$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER_BLOCK2));
				?>
			</div>
		</div>
				<?php
				$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
				?>
	</div>
   
<?php $this->endContent(); ?>