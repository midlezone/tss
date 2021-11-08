<div class="timkiem">
    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
        <div>
            <input type="text" class="svalue box-search" name="<?php echo $keyName; ?>" value="<?php echo $keyWord; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" />
            <input type="submit" class="btnsearch" value="">
        </div>
        <script>
            jQuery(document).ready(function () {
                jQuery(document).on('submit', '.searchform', function () {
                    var sv = jQuery(this).find('.svalue').val();
                    if (sv == '' || sv.length < 2) {
                        alert('Từ khóa tìm kiếm không đúng. Từ khóa phải có ít nhất 2 ký tự.');
                        return false;
                    }
                });
            });
        </script>
    </form>
</div>