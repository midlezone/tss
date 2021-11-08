<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 9px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<div class="listnews" style="margin-top: 20px;">
    <div class="list course">
		
			<table>
				  <tbody>
					<tr>
						<th width="5%">STT</th>
						<th width="15%">Ngày/Giờ</th>
						<th width="20%">Giải Đấu</th>
						<th width="20%">Trận Đấu</th>
						<th width="10%">Tỷ Lệ Kèo</th>
						<th width="10%">Lựa Chọn</th>
						<th width="10%">Tỷ Số FT</th>
						<th width="10%">Kết Quả</th>
					</tr>		 
				</tbody>
			</table>
        <?php if (count($courses)) { ?>
		
            <?php
            foreach ($courses as $key => $course) {
                ?>
				<?php  $parent = Yii::app()->db->createCommand()
						->select('*')
						->from('manufacturers')
						->where('id ='.$course['cat_id'])
						->queryAll(); ?>			
				<div class="item ">
						<table>					 
							<tbody><tr>
								<td  width="5%" > <?php echo $key +1; ?></td>
								<td  width="15%"><?php echo $course['course_open']; ?></td>
								<td  width="20%"><?php echo $parent[0]['name']; ?></td>
								<td  width="20%"><?php echo $course['name']; ?></td>
								<td width="10%"><?php echo $course['alias']; ?></td>
								<td width="10%"><?php echo $course['time_for_study']; ?></td>
								<td width="10%"><?php echo $course['school_schedule']; ?></td>
								<td width="10%" style="font-weight: bold;  color: #e60f1e; text-transform: uppercase;" ><?php echo $course['sort_description']; ?></td>
							</tr>			  
						</tbody></table>			
				</div>
		
            <?php } ?>
        <?php } ?>
    </div>
    <div class="wpager">
        <?php
        $this->widget('common.extensions.LinkPager.LinkPager', array(
            'itemCount' => $totalitem,
            'pageSize' => $limit,
            'header' => '',
            'selectedPageCssClass' => 'active',
        ));
        ?>
    </div>
</div>
