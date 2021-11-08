


<div class="panel panel-default categorybox">
    <div class="panel-heading">
        <h3>Dịch Vụ Sửa Chữa</h3>
    </div>
    <div class="panel-body">
        <ul class="menu menu-list">
			<?php foreach ($news as $ne) {  ?>
            <li class="first-menu-left-li">
                <a title="<?php echo $ne['news_title']; ?>" href="<?php echo $ne['link']; ?>"><?php echo $ne['news_title']; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
