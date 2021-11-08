<?php
if (isset($data->relations[$parent_id])) {
    ?>
    <ul class="nav">
        <?php
        foreach ($data->relations[$parent_id] as $item_id) {
            $m_link = ($data->items[$item_id]['menu_link'] != '') ? $data->items[$item_id]['menu_link'] : Yii::app()->createUrl($data->items[$item_id]['menu_basepath'], json_decode($data->items[$item_id]['menu_pathparams'], true));
            ?>
            <li <?php echo ($data->items[$item_id]['active']) ? 'class="active"' : '' ?> >
                <a href="<?php echo $m_link; ?>"><?php echo $data->items[$item_id]['menu_title']; ?></a>
                <?php
                $this->render($this->view, array(
                    'data' => $data,
                    'parent_id' => $item_id,
                ))
                ?>
            </li>
        <?php } ?>
    </ul>        
<?php } ?>