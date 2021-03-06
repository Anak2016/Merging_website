<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel - <?php echo $__env->yieldContent('title'); ?></title>
	<!-- root directory is at ecommerce/public-->
	<link rel ="stylesheet" href ="/css/all.css">
	
	<<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/8145f993ac.js"></script>

	
	
	<link rel="shortcut icon" href="#" />
</head>

<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">
	
	<?php echo $__env->make('includes.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	<div class="off-canvas-content admin_title_bar" data-off-canvas-content>
		<!-- Your page content lives here -->
		<div class="title-bar">
			<div class="title-bar-left">
				<button class="menu-icon hide-for-large" type="button" data-open="offCanvas"></button>
				<span class="title-bar-title"><?php echo e(getenv('SAM_APP_NAME')); ?></span>
			</div>
		</div>
		
		<?php echo $__env->yieldContent('content'); ?>
	</div>

		<!-- javascript -->

	<script src="/js/all.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.5.0-rc.3/dist/js/foundation.min.js" integrity="sha256-l1HhyJ0nfWQPdwsVJLNq8HfZNb3i1R9M82YrqVPzoJ4= sha384-NH8utV74bU+noXiJDlEMZuBe34Bw/X66sw22frHkgIs8R1QKWc8ckxYB4DheLjH4 sha512-JMs3Y+JjY+DhwVOPeJhkLM/0FeK9ANxvuYiHGpGp7Q2kMlmNEN/2v6TkrXdirxqB3DHxPlQ8iMxvb/eSPCF5CA==" crossorigin="anonymous"></script>
	<script>
		$(document).foundation();
	</script>
	
</body>
</html>