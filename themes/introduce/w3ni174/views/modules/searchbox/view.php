<div class="searchbox">
    <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="searchform">
        <div class="search-inputbox">
            <input type="hidden" value="3" name="t" id="t">            
            <div class="search-input-submit">
                <input type="submit" value="Tìm kiếm" class="submitForm" />
            </div>
            <div class="search-input-content">
                <input type="text" class="form-control inputSearch keyword" name="<?php echo $keyName; ?>" value="<?php echo $keyWord; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" />
            </div>
            <script>
                jQuery(document).ready(function () {
                    jQuery(document).on('submit', '.searchform', function () {
                        var sv = jQuery(this).find('.inputSearch').val();
                        if (sv == '' || sv.length < 2) {
                            alert('Từ khóa tìm kiếm không đúng. Từ khóa phải có ít nhất 2 ký tự.');
                            return false;
                        }
                    });
                });
            </script>
        </div>
    </form>
</div>