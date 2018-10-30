<?php

$categories = SAM\Models\Category::all();
$sub_categories = SAM\Models\SubCategory::all();
    //$manufacturers = SAM\Models\Manufacturer::all();
use Illuminate\Database\Capsule\Manager as Capsule; 
$manufacturers = Capsule::table('manufacturers')->get();
//var_dump($manufacturers[0]->id); exit;


?>




<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->

    <div class="panel-heading"><!-- panel-heading Starts -->

        <h3 class="panel-title"><!-- panel-title Starts -->

            Brand's Name


            <div class="pull-right"><!-- pull-right Starts -->

                <a href="#" style="color:black;">

                    <span class="nav-toggle hide-show">

                        Hide

                    </span>

                </a>

            </div><!-- pull-right Ends -->

        </h3><!-- panel-title Ends -->

    </div><!-- panel-heading Ends -->

    <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data starts -->

        <div class="panel-body"><!-- panel-body Starts -->

            <div class="input-group"><!-- input-group Starts -->

                <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-manufacturer" placeholder="Filter Brand's Name">

                <a class="input-group-addon"> <i class="fa fa-search"></i> </a>

            </div><!-- input-group Ends -->

        </div><!-- panel-body Ends -->
        
        <div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

            <ul class="nav nav-pills nav-stacked category-menu" id="dev-manufacturer"><!-- nav nav-pills nav-stacked category-menu Starts -->

                
                
                    <li class='checkbox checkbox-primary' v-cloak v-for="manufacturer in manufacturers" >
                    
                        <a >
                            <label>
                                <input @change="loadCheckedItems()" type='checkbox' :value="manufacturer.id" name='manufacturer' class='get_manufacturer' :id="manufacturer.id" v-model="checkedMenufacturers">
                                
                                <span>
                                    
                                    {{manufacturer.title}}
                                </span>
                            </label>
                        </a>
                    </li>
                
    

                </ul><!-- nav nav-pills nav-stacked category-menu Ends -->

            </div><!-- panel-body scroll-menu Ends -->

        </div><!-- panel-collapse collapse-data Ends -->


    </div><!-- panel panel-default sidebar-menu Ends -->


    <div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

        <div class="panel-heading"><!-- panel-heading Starts -->

            <h3 class="panel-title"><!-- panel-title Starts -->

                Products Categories

                <div class="pull-right"><!-- pull-right Starts -->

                    <a href="#" style="color:black;">

                        <span class="nav-toggle hide-show">

                            Hide

                        </span>

                    </a>

                </div><!-- pull-right Ends -->

            </h3><!-- panel-title Ends -->

        </div><!-- panel-heading Ends -->

        <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

            <div class="panel-body"><!-- panel-body Starts -->

                <div class="input-group"><!-- input-group Starts -->

                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-p-cats" placeholder="Filter Product Categories">

                    <a class="input-group-addon"> <i class="fa fa-search"></i> </a>

                </div><!-- input-group Ends -->

            </div><!-- panel-body Ends -->

            <div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

                <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

                    
                    
                    <li class='checkbox checkbox-primary' v-cloak v-for="category in categories" >
                        <a >
                            <label>
                                <input @change="loadCheckedItems()" type='checkbox' :value="category.id" name='category' class='get_manufacturer' :id="category.id" v-model="checkedCategories">
                                <span>
                                    {{category.name}}
                                </span>
                            </label>
                        </a>
                    </li>

                </ul><!-- nav nav-pills nav-stacked category-menu Ends -->

            </div><!-- panel-body scroll-menu Ends -->

        </div><!-- panel-collapse collapse-data Ends -->

    </div><!--- panel panel-default sidebar-menu Ends -->



    <div class="panel panel-default sidebar-menu"><!--- panel panel-default sidebar-menu Starts -->

        <div class="panel-heading"><!-- panel-heading Starts -->

            <h3 class="panel-title"><!-- panel-title Starts -->

                Sub-Categories

                <div class="pull-right"><!-- pull-right Starts -->

                    <a href="#" style="color:black;">

                        <span class="nav-toggle hide-show">

                            Hide

                        </span>

                    </a>

                </div><!-- pull-right Ends -->


            </h3><!-- panel-title Ends -->

        </div><!-- panel-heading Ends -->

        <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Starts -->

            <div class="panel-body"><!-- panel-body Starts -->

                <div class="input-group"><!-- input-group Starts -->

                    <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-cats" placeholder="Filter Categories">

                    <a class="input-group-addon"> <i class="fa fa-search"> </i> </a>

                </div><!-- input-group Ends -->

            </div><!-- panel-body Ends -->

            <div class="panel-body scroll-menu"><!-- panel-body scroll-menu Starts -->

                <ul class="nav nav-pills nav-stacked category-menu" id="dev-cats"><!-- nav nav-pills nav-stacked category-menu Starts -->

                    
                    
                    <li class='checkbox checkbox-primary' v-cloak v-for="subCategory in subCategories" >
                    
                        <a >
                            <label>
                                <input @change="loadCheckedItems()" type='checkbox' :value="subCategory.id" name='subCategory' class='get_sub_categories' :id="subCategory.id" v-model="checkedSubCategories">
                                
                                <span>
                                    
                                    {{subCategory.name}}
                                </span>
                            </label>
                        </a>
                    </li>

                </ul><!-- nav nav-pills nav-stacked category-menu Ends -->

            </div><!-- panel-body scroll-menu Ends -->

        </div><!-- panel-collapse collapse-data Ends -->

    </div><!--- panel panel-default sidebar-menu Ends -->
