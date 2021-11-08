<div class="box-timkiem"> 
    <div class="icon-tk"> </div>
    <div class="timkiem">
        <div class="search search1 ">
            <form method="<?php echo $method; ?>" action="<?php echo $action; ?>" class="form-horizontal clearfix" role="search">
                <input type="hidden" value="3" name="t" id="t">     
                <input type="text" class="form-control" name="<?php echo $keyName; ?>" placeholder="<?php echo $placeHolder; ?>" autocomplete="off" value="<?php echo $keyWord; ?>">
                <input type="submit" value="Tìm kiếm" class="btn btn-default">
            </form>
        </div>
    </div>
</div>
