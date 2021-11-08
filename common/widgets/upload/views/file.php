<div class='boxuploadfile'>
	<input id="<?php echo ($this->id)?$this->id:'selectfile';?>" type="file" name="<?php echo ($this->id)?$this->id.'_name':'fileupload'?>" />
	<div class='valuebox hidden2 <?php echo ($this->displayvaluebox)?'':'hidden'?>'>
		<ul class='ulvalbox clearfix'>
		</ul>
	</div>
</div>
<script>
$(document).ready(function(){
	upload_config.setMaxqueuesize(<?php echo $this->limit;?>,'<?php echo ($this->id)?$this->id:'selectfile';?>');
	upload_config.setQueuesize(0,'<?php echo ($this->id)?$this->id:'selectfile';?>');
        setTimeout(function () {
	$('#<?php echo ($this->id)?$this->id:'selectfile';?>').uploadify({
		'buttonText':'<?php echo ($this->buttontext)?$this->buttontext:'Upload';?>',
		'fileSizeLimit':'100MB',
		'width':'<?php echo $this->buttonwidth;?>',
		'height':'<?php echo $this->buttonheight;?>',
		'method':'post',
		'multi':<?=($this->multi)?'true':'false';?>,
		'formData'     : {
			'type' : '<?php echo $this->type;?>',
			'path'	: '<?php echo json_encode($this->path);?>',
			'key'     : '<?php echo md5($this->key);?>'
		},
		'swf'      : '<?php echo $this->basepath().'/js/uploadify/uploadify.swf'?>',
		'onUploadStart' : function(file) {
			if(upload_config.getQueuesize('<?php echo ($this->id)?$this->id:'selectfile';?>') >= upload_config.getMaxqueuesize('<?php echo ($this->id)?$this->id:'selectfile';?>')){
				$('#<?php echo ($this->id)?$this->id:'selectfile';?>').uploadify('disable',true);
				$('#<?php echo ($this->id)?$this->id:'selectfile';?>').uploadify('cancel','*');
				return false;
			}
        },
		'onUploadSuccess': function(file,data,response){
			upload_config.setQueuesize(upload_config.getQueuesize('<?php echo ($this->id)?$this->id:'selectfile';?>')+1,'<?php echo ($this->id)?$this->id:'selectfile';?>');
			var da	= JSON.parse(data);
			if(da.error==0 || da.error=='0'){
				var boxfileupload	= $('#<?php echo ($this->id)?$this->id:'selectfile';?>').parents('.boxuploadfile');
				var valuebox = boxfileupload.find('.valuebox')
				var ulvalbox = boxfileupload.find('.valuebox .ulvalbox');
				valuebox.removeClass('hidden2');
				ulvalbox.fadeIn(200,function(){
					ulvalbox.append('<li class="livalbox"><div class="ldvalbox"><i class="removeval" onclick="$(this).parents(\'.livalbox\').remove();upload_config.reduceQueuesize(\'<?php echo ($this->id)?$this->id:'selectfile';?>\');">x</i><div class="fileimg"><img width="100" height="100" src="'+da.data.imgurl+'" /></div><div class="filename"><span title="'+da.data.name+'">'+da.data.name+'</span></div><input type="hidden" name="<?php echo ($this->id)?$this->id:'fileupload'?>_val[]" class="filevalue" value=\''+da.data.value+'\'/></div></li>');
				});
			}
			else alert(da.message);

			<?php echo $this->oncecomplete;?>
			$('#'+file.id).remove();
			if(upload_config.getQueuesize('<?php echo ($this->id)?$this->id:'selectfile';?>') >= upload_config.getMaxqueuesize('<?php echo ($this->id)?$this->id:'selectfile';?>')){
				$('#<?php echo ($this->id)?$this->id:'selectfile';?>').uploadify('disable',true);
				$('#<?php echo ($this->id)?$this->id:'selectfile';?>').uploadify('cancel','*');
				return false;
			}
		},
		'onQueueComplete': function(queueData){
			<?php echo $this->queuecomplete;?>
		},
		'uploader' : '/media/media/fileupload'
	});
        },10);
});
</script>