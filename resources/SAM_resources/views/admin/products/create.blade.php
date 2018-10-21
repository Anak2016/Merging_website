@extends('admin.layout.base')

@section('title', 'Create Product')
@section('data-page-id', 'adminProduct')
@section('content')
<div class="add-product">
	<div clss ="grid-x">
		<div class="column medium-11">
			<h2>Add Inventory Item</h2> <hr />
		</div>
	</div>

	@include('includes.message')
	
	
	<form method="post" action="/sam_public/sam_public/admin/products/create" enctype="multipart/form-data">
		<div class="small-12 medium-11">
			<div class="grid-x">
				<div class="grid-x grid-margin-x grid-margin-y">
					<div class="small-12 medium-6 cell">
						<label>Product name:
							<input type="text" name="name" placeholder="Product name" 
							value="{{\SAM\Classes\Request::old('post', 'name') }}">
						</label>
					</div>
					<div class="small-12 medium-6 cell">
						<label>Product price:
							<input type="text" name="price" placeholder="Product's Price" 
							value="{{\SAM\Classes\Request::old('post', 'price') }}">
						</label>
					</div>

					<div class="small-12 medium-6 cell">
						<label>Product Category:
							<select name="category" id="product-category">
								<option value="{{\SAM\Classes\Request::old('post', 'category')?:"" }}">
									{{\SAM\Classes\Request::old('post', 'category')?:"Select Category" }}
								</option>	
								@foreach($categories as $category)
								<option value="{{$category->id}}">{{ $category->name }}</option>
								@endforeach
							</select>
						</label>

					</div>
					<div class="small-12 medium-6 cell">
						<label>Product Subcategory:
							<select name="subcategory" id="product-subcategory">
								<option value="{{\SAM\Classes\Request::old('post', 'subcategory')?:"" }}">
									{{\SAM\Classes\Request::old('post', 'subcategory')?:"Select Subcategory" }}
								</option>
							</select>
						</label>
					</div>

					<div class="small-12 medium-6 cell">
						<label>Product Quantity:
							<select name="quantity">
								<option value="{{\SAM\Classes\Request::old('post', 'quantity')?:"" }}">
									{{\SAM\Classes\Request::old('post', 'quantity')?:"Select quantity" }}
								</option>		 
								@for($i = 1; $i <= 50; $i++)
								<option value="{{$i}}">{{$i}}</option>
								@endfor 
							</select>
						</label>

					</div>
					<div class="small-12 medium-6 cell">
						<br />
						<div class="input-group">
							<span class="input-group-label">Product Image:</span>
							<input type="file" name="productImage" class="input-group-field">
						</div>
					</div>
					
					<div class="small-12 cell">
						<label>Description:
							<textarea name="description" placeholder="Description">{{\SAM\Classes\Request::old('post', 'description')}}</textarea>
						</label>
						<input type="hidden" name="token" value="{{\SAM\Classes\CSRFToken::_token()}}">
						<button class="button alert" type="reset">Reset</button>
						{{-- <input type="hidden" name="test" value="testing"> --}}
						<input class="button success float-right" type="submit" value="Save Product">
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@include('includes.delete-modal')
@endsection