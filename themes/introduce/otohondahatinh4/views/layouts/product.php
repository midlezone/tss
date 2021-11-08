<?php $this->beginContent('//layouts/main'); ?>
		<?php
		echo $content;
		?>
		<div class="container">
			<?php
			$this->widget('common.widgets.wglobal.wglobal', array('position' => Widgets::POS_CENTER));
			?>
		</div>

<?php $this->endContent(); ?>