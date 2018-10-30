
<div id="ratingSection">

    <div class="row">
        <div class="col-sm-12">
            <form id="ratingForm" method="post" enctype="multipart/form-data">
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
                    <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                    <input type="hidden" class="form-control" id="pro_id" name="pro_id" value="<?php echo $_GET['pro_id'];?>">

                </div>
                <div class="form-group">
                    <label for="usr">Title*</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="comment">Comment*</label>
                    <textarea class="form-control" rows="5" id="comment" name="comment" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info" id="saveReview" name="submit">Save Review</button>
                    <button type="button" class="btn btn-info" id="cancelReview">Cancel</button>
                </div>

            </form>
        </div>

    </div>
</div>
