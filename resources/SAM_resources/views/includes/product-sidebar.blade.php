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
            @foreach($categories as $category)
                <li><a href="#">{{$category->name}}</a></li>
            @endforeach
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
            @foreach($sub_categories as $sub_category)
                <li><a href="#">{{$sub_category->name}}</a></li>
            @endforeach
        </ul>
    </div>
</div>