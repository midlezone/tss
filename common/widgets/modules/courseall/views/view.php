<div id="page-wrap" class="container">

		<h1>Bài Thi Trắc Nghiệm</h1>
		
		<form action="news/news" method="post" id="quiz">
		
            <ul>
				<?php
					foreach ($listcourse as $key => $course) {
                ?>
				
					<li>
						<h3><?php echo $key +1; ?>. <?php echo $course['name']; ?></h3>
						
						<?php if ($course['alias'] != '') { ?>
							<div>
								<input type="radio" name="question-<?php echo $course['id']; ?>" id="question-1-answers-A" value="<?php echo $course['alias']; ?>" />
								<label for="question-<?php echo $course['id']; ?>"><?php echo $course['alias']; ?></label>
							</div>
						<?php } ?>
						
						<?php if ($course['time_for_study'] != '') { ?>
							<div>
								<input type="radio" name="question-<?php echo $course['id']; ?>" id="question-1-answers-B" value="<?php echo $course['time_for_study']; ?>" />
								<label for="question-<?php echo $course['id']; ?>"><?php echo $course['time_for_study']; ?></label>
							</div>
						<?php } ?>
						
						<?php if ($course['school_schedule'] != '') { ?>
						
							<div>
								<input type="radio" name="question-<?php echo $course['id']; ?>" id="question-1-answers-C" value="<?php echo $course['school_schedule']; ?>" />
								<label for="question-<?php echo $course['id']; ?>"><?php echo $course['school_schedule']; ?></label>
							</div>
						
						<?php } ?>
						
						<?php if ($course['score4'] != '') { ?>
							<div>
								<input type="radio" name="question-<?php echo $course['id']; ?>" id="question-1-answers-D" value="<?php echo $course['score4']; ?>" />
								<label for="question-<?php echo $course['id']; ?>"><?php echo $course['score4']; ?></label>
							</div>
						
						<?php } ?>
						
					</li>
					
                <?php } ?>
               
            
            </ul>
            
            <input type="submit" id="btn" value="Xem Kết Quả" />
		
		</form>
	
</div>

