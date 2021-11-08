<h3 class="username-title"> Mạng lưới của bạn </h3>
<?php $themUrl = Yii::app()->theme->baseUrl; ?>
<script type="text/javascript" src="<?= $themUrl ?>/js/jstree.min.js"></script> 
<div id="using_json_2"></div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#using_json_2').jstree({'core': {
                'data': <?php echo $html ?>
            }});
    });
</script>
