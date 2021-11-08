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
  width: 18%;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php if ($show_widget_title) { ?>
    <div class="title">
        <h2><a onclick="javascript:void(0)"><?php echo $widget_title ?></a></h2>
        <div class="line"></div>
    </div>
<?php } ?>
   <table>
		  <tr>
			<th>Xiên</th>
			<th>Tổng Số Trận</th>
			<th>Thắng</th>
			<th>Thua</th>
			<th>Tỷ Lệ %</th>
		  </tr>		 
	</table>
	<?php foreach ($lecturers as $lecturer) { ?>
		<?php $data = $lecturer['phone']*100; ?>
		<div class="item ">
				<table>					 
					<tr>
						<td><?php echo $lecturer['name'] ?></td>
						<td><?php echo $lecturer['subject'] ?></td>
						<td><?php echo $lecturer['phone'] ?></td>
						<td><?php echo $lecturer['facebook'] ?></td>
						<td><?php echo (round($data/$lecturer['subject']))?>%</td>
					</tr>			  
				</table>			
		</div>			
	<?php } ?>
	