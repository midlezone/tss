<div class=" product welcome">
    <div class="title">
        <?php if ($data['title']) { ?>
            <h2>
                <a href="#" >
                    <?php echo $data['title'] ?>
                </a>
            </h2> 
        <?php } ?>
    </div>
    <div class="cont">
        <?php echo $data['description']; ?>
    </div>
</div>
