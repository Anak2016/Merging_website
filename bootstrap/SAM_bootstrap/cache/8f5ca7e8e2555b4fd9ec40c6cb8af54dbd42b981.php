<?php

    $categories = SAM\Models\Category::all();
    $sub_categories = SAM\Models\SubCategory::all();
    // var_dump($categories); exit;
?>

<!-- upper sidebar category-->
<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu-->
    <div class="panel-heading"><!--panel-heading -->
        <h3 class="panel-title">Products Categories</h3>
    </div>
    <div class="panel-body"><!--panel-body -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu -->
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="#"><?php echo e($category->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>

<!-- lower sidebar category-->
<div class="panel panel-default sidebar-menu"><!--panel panel-default sidebar-menu-->
    <div class="panel-heading"><!--panel-heading -->
        <h3 class="panel-title">Categories</h3>
    </div>
    <div class="panel-body"><!--panel-body -->
        <ul class="nav nav-pills nav-stacked category-menu"><!-- nav nav-pills nav-stacked category-menu -->
            <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="#"><?php echo e($sub_category->name); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>