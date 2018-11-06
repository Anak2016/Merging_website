(function(){
	'use strict';

	ACMESTORE.product.details = function(){
		var app = new Vue({
			el: "#product",
			data:{
				product: [],
				categories: [],
				subCategories: [],
				manufacturers: [],
				similarProducts: [],
				countMenufactures: 0,
				productId: $('#product').data('id'),
				ip: "nothing",
				checkedMenufacturers: [],
				checkedCategories: [],
				checkedSubCategories: [],
				selectedProduct: [],
				countProducts: 0,
				loading: false
			},
			methods:{
				getProductDetails: function() {
					// I belive that Vue instance is created after url is retreived by post or get
					// console.log(this.productId);
					// axios.get('/sam_public/product-details/' + this.productId).then(
					// 	function(response){
					// 		console.log("here in getProductDetails");
					// 		console.log(response.data);
					// 		app.product = response.data.product;
					// 		app.category = response.data.category;
					// 		app.subCategory = response.data.subCategory;
					// 		app.similarProducts = response.data.similarProducts;
					// 		app.loading = false;
					// 	});
					axios.all(
						[
					// create these 2 routes.
					axios.get('/sam_public/product-details/' + this.productId),
					axios.get('/sam_public/products'), axios.get('/sam_public/manufacturers'), 
					axios.get('/sam_public/categories'), axios.get('/sam_public/sub-categories')   
					]
					).then(axios.spread(function(response, productResponse, manufacturerResponse, categoryResponse, subCategoryResponse){
						// console.log(dealResponse.data.count);
						app.product = response.data.product;
						// app.category = response.data.category;
						// app.subCategory = response.data.subCategory;
						app.similarProducts = response.data.similarProducts;

						app.products = productResponse.data.products;
						app.countProducts = productResponse.data.count;
						
						app.manufacturers = manufacturerResponse.data.manufacturers;
						app.countMenufactures = manufacturerResponse.data.count;
						console.log(manufacturerResponse.data.manufacturers);
						console.log(categoryResponse.data.categories);
						console.log(subCategoryResponse.data.subCategories);
						
						app.categories = categoryResponse.data.categories;
						
						app.subCategories = subCategoryResponse.data.subCategories;
						
						app.loading = false;
					}));
				},
				stringLimit: function(string, value){
					return ACMESTORE.module.truncateString(string,value);
				},
				addToCart: function(id){
					// console.log(id);
					// get ip from php helper function 
					// axios.get('/sam_public/ip').then(
					// 	function(response){
					// 		alert(response.data.ip);
					// 		console.log(response.data.ip);
					// 		app.ip = resposne.data.ip;
					// 	});
					ACMESTORE.module.addItemToCart(id, function(message){
						$(".notify").css("display", "block").delay(4000).slideUp(300)
						.html(message);
					});
					// this.getProductDetails();
					location.reload();
				},
				// submitComment: function(product_id){
					submitComment: function(){
						alert("here in showComment");
						var postData = $.param({product_id:product_id});
					// axios.post("/sam_public/customer/comment", postData).then( function(response){
					// 	$(".notify").css("display", "block").delay(4000).slideUp(300) 
					// 		.html(response.data.success);
					// });
				},
				loadCheckedItems: function(){
					// console.log(this.checkedBoxes);
					var selectedManufacturers = [];
					var selectedCategories = [];
					var selectedSubCategories = [];
					this.checkedMenufacturers.forEach(function(element){
						// console.log(element);
						selectedManufacturers.push(element);
					});
					this.checkedCategories.forEach(function(element){
						// console.log(element);
						selectedCategories.push(element);
					});
					this.checkedSubCategories.forEach(function(element){
						// console.log(element);
						selectedSubCategories.push(element);
					});


					var data= $.param({selectedManufacturers: selectedManufacturers, selectedCategories: selectedCategories, selectedSubCategories:selectedSubCategories});
					axios.post('/sam_public/loadCheckedItems',data)
					.then(function(response){
						// var selectedProduct = response.data.products;
						console.log(typeof response.data);
						app.selectedProduct = response.data.products;
						console.log(app.selectedProduct);
						app.products =[];
						for(var i = 0; i < app.selectedProduct.length; i++)
						{
							app.products = app.products.concat(app.selectedProduct[i]);
							// console.log(app.products);
						}
						// console.log(app.products);
						// app.products = response.data.products;
						app.countProducts = response.data.count;
						// app.getFeaturedProducts();
						app.loading = false;
						// console.log(app.selectedProduct[1][0].id);
					});

				}
			},
			created: function() {
				// console.log("here in create");
				this.getProductDetails();
				// this.submitComment();
				// alert("here in showComment");
			}
		});
}

})();