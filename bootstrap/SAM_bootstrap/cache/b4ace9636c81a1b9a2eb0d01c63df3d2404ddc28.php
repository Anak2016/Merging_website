<?php
$total = 0;

$count = 0;
$oneStarRating = 0;
$twoStarRating = 0;
$threeStarRating = 0;
$fourStarRating = 0;
$fiveStarRating = 0;

foreach($item_ratings as $item_rating)
{
	$total = $total + $item_rating->rating_number; 

	if($item_rating->rating_number ==1){

		$oneStarRating = $oneStarRating + 1;

	}elseif($item_rating->rating_number ==2){

		$twoStarRating = $twoStarRating + 1;
		
	}elseif($item_rating->rating_number ==3){

		$threeStarRating = $threeStarRating + 1;
		
	}elseif($item_rating->rating_number ==4){

		$fourStarRating = $fourStarRating + 1;
		
	}elseif($item_rating->rating_number ==5){

		$fiveStarRating = $fiveStarRating + 1;
	}

	$count = $count + 1;
}
$avg = $total/$count;

$fiveStarRatingPercent = round(($fiveStarRating/$count)*100);
$fiveStarRatingPercent = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0';

$fourStarRatingPercent = round(($fourStarRating/$count)*100);
$fourStarRatingPercent = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0';

$threeStarRatingPercent = round(($threeStarRating/$count)*100);
$threeStarRatingPercent = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0';

$twoStarRatingPercent = round(($twoStarRating/$count)*100);
$twoStarRatingPercent = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0';

$oneStarRatingPercent = round(($oneStarRating/$count)*100);
$oneStarRatingPercent = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0';
?>

<div id="ratingDetails">
	<div class="row">
		<div class="col-sm-3">
			<h4>Rating and Reviews</h4>

			<h2 class="bold padding-buttom-7"><?php echo e(round($avg,1)); ?><small>/ 5</small></h2>
			<?php
			$ratingClass = "btn-success";
			if($avg < 4)
			{
				$ratingClass = "btn-warning";
			}           			
			if($avg < 2){
				$ratingClass = "btn-danger";
			}
			?>
			<?php for($i=1;$i<=5;$i++): ?>
			<?php if($i <= $avg ): ?>
			<button type="button" class="btn btn-sm <?php echo $ratingClass;?>" aria-label="Left Align">
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
			</button>
			<?php else: ?>
			<button type="button" class="btn btn-sm" aria-label="Left Align">
				<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
			</button>
			<?php endif; ?>
			<?php endfor; ?>
		</div>
		
		<div class="col-sm-3">
			<!--5 stars start here -->
			<div class="pull-left">
				<div class="pull-left" style="width: 35px; line-height: 1;">
					<div style="height: 9px; margin: 5px;">5 <span class="glyphicon glyphicon-start"></span></div>
				</div>
				<div class="pull-left" style="width: 180px;">
					<div class="progress" style="height: 9px; margin: 8px 0;">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $fiveStarRatingPercent;?> ;">
							<span class="sr-only"><?php echo $fiveStarRatingPercent; ?></span>
						</div>
					</div>
				</div>
				<div class="pull-right" style="margin-left: 10px;"><?php echo $fiveStarRating;?></div>
			</div>

			<div class="pull-left">
				<div class="pull-left" style="width: 35px; line-height: 1;">
					<div style="height: 9px; margin: 5px;">4 <span class="glyphicon glyphicon-start"></span></div>
				</div>
				<div class="pull-left" style="width: 180px;">
					<div class="progress" style="height: 9px; margin: 8px 0;">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $fourStarRatingPercent;?> ;">
							<span class="sr-only"><?php echo $fourStarRatingPercent; ?></span>
						</div>
					</div>
				</div>
				<div class="pull-right" style="margin-left: 10px;"><?php echo $fourStarRating;?></div>
			</div>

			<div class="pull-left">
				<div class="pull-left" style="width: 35px; line-height: 1;">
					<div style="height: 9px; margin: 5px;">3 <span class="glyphicon glyphicon-start"></span></div>
				</div>
				<div class="pull-left" style="width: 180px;">
					<div class="progress" style="height: 9px; margin: 8px 0;">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $threeStarRatingPercent;?> ;">
							<span class="sr-only"><?php echo $threeStarRatingPercent; ?></span>
						</div>
					</div>
				</div>
				<div class="pull-right" style="margin-left: 10px;"><?php echo $threeStarRating;?></div>
			</div>

			<div class="pull-left">
				<div class="pull-left" style="width: 35px; line-height: 1;">
					<div style="height: 9px; margin: 5px;">2 <span class="glyphicon glyphicon-start"></span></div>
				</div>
				<div class="pull-left" style="width: 180px;">
					<div class="progress" style="height: 9px; margin: 8px 0;">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $twoStarRatingPercent;?> ;">
							<span class="sr-only"><?php echo $twoStarRatingPercent; ?></span>
						</div>
					</div>
				</div>
				<div class="pull-right" style="margin-left: 10px;"><?php echo $twoStarRating;?></div>
			</div>

			<div class="pull-left">
				<div class="pull-left" style="width: 35px; line-height: 1;">
					<div style="height: 9px; margin: 5px;">1 <span class="glyphicon glyphicon-start"></span></div>
				</div>
				<div class="pull-left" style="width: 180px;">
					<div class="progress" style="height: 9px; margin: 8px 0;">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width:<?php echo $oneStarRatingPercent;?> ;">
							<span class="sr-only"><?php echo $oneStarRatingPercent; ?></span>
						</div>
					</div>
				</div>
				<div class="pull-right" style="margin-left: 10px;"><?php echo $oneStarRating;?></div>
			</div>
		</div>
		<!--Rate this product Button -->
		<?php if(_isAuthenticated()): ?>
		<div class='col-sm-3'>
			<button type='button' id='rateProduct' class='btn btn-warning'>Rate this product</button>;
		</div>
		<?php else: ?>
		<div class='col-sm-3'>
			<form method="get" action="/sam_public/login">
				<button type='submit' id='rateProduct' class='btn btn-warning'>Rate this product</button>
			</form>
		</div>
		<?php endif; ?>
	</div>

	<!-- review block start here-->
	<div class="row">
		<div class="col-sm-7">
			<hr>
			<?php $__currentLoopData = $item_ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="row">
				<div class="col-sm-3">
					<img src='<?php echo e($item_rating['user']->image_path); ?>' class='img-responsive' >
					

					<div class='review-block-name'>By <a href='/sam_public/customer'><?php echo e($item_rating['user']->name); ?></a></div>                                
					<div class="review-block-date"><?php echo e($item_rating['user']->created_at); ?></div>
				</div>
				<div class="col-sm-9">
					<?php
					$ratingClass = "btn-success";
					if($item_rating->rating_number < 4)
					{
						$ratingClass = "btn-warning";
					}           			
					if($item_rating->rating_number < 2){
						$ratingClass = "btn-danger";
					}
					?>
					<?php for($i=1;$i<=5;$i++): ?>
					<?php if($i <= $item_rating->rating_number ): ?>
					<button type="button" class="btn btn-sm <?php echo $ratingClass;?>" aria-label="Left Align">
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
					<?php else: ?>
					<button type="button" class="btn btn-sm" aria-label="Left Align">
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
					<?php endif; ?>
					<?php endfor; ?>
					<div class="review-block-title"><?php echo e($item_rating->title); ?></div>
					<div class="review-block-description"><?php echo e($item_rating->comments); ?></div>
				</div>

			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
	</div>
</div>


<div id="ratingSection" style="display: none;">

	<div class="row">
		<div class="col-sm-12">
			<form id="ratingForm" method="post" enctype="/sam_public/customer/comment">
				<div class="form-group">
					<h4>Rate this product</h4>
					<button type="button" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default btn-grey btn-sm rateButton" aria-label="Left Align">
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default btn-grey rateButton" aria-label="Left Align">
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default btn-grey rateButton" aria-label="Left Align">
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
					<button type="button" class="btn btn-default btn-grey rateButton" aria-label="Left Align">
						<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
					</button>
					<input type="hidden" class="form-control" id="rating" name="rating_number" value="1">
					<input type="hidden" class="form-control" id="pro_id" name="product_id" value="<?php echo e($product['id']); ?>">

				</div>
				<div class="form-group">
					<label for="usr">Title*</label>
					<input type="text" class="form-control" id="title" name="title" required>
				</div>
				<div class="form-group">
					<label for="comment">Comment*</label>
					<textarea class="form-control" rows="5" id="comment" name="comments" required></textarea>
				</div>
				<div class="form-group">
					<button  type="submit" class="btn btn-info" id="saveReview" name="submit">Save Review</button>
					<button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
				</div>

			</form>	
		</div>

	</div>
</div>
