(function(){
	'use strict';

	ACMESTORE.homeslider.homePageProducts = function(){
		var app = new Vue({
			el:'#root',
			data: {
				dealProducts:[],
				popularProducts: [],
				products: [],
				manufacturers: [],
				categories: [],
				subCategories: [],
				searchProducts: [],
				selectedProduct:[],
				countDeals: 0,
				countPopulars: 0,
				countProducts: 0,
				countSearches: 0,
				countSelected: 0,
				countMenufactures:0,
				keyword: "nothing",
				loading: false,
				checkedMenufacturers: [],
				checkedCategories: [],
				checkedSubCategories: []

			},
			methods:{ // all of the function must be inside of the object is passed to method property's of Vue.js.
			getFeaturedProducts: function(){
				// if($('#data-keyword').length){
				// 	this.keyword = $('.keyword').data('keyword');
				// 	console.log(keyword);
				// 	var data= $.param({keyword: keyword});
				// 	axios.post('/sam_public/searchResult',data)
				// 	.then(function(response){
				// 		app.searchProducts = response.data.results;
				// 		app.countSearches = response.data.count;
				// 		app.loading = false;
				// 	});
				// }

				// this.loading = true;
				// var selectedManufacturers = [];
				// if(this.checkedBoxes == undefined || this.checkedBoxes.length == 0){
				// 	this.checkedBoxes.forEach(function(element){
				// 		// console.log(element);
				// 		selectedManufacturers.push(element);
				// 	});
				// }
				// var data= $.param({selectedManufacturers: selectedManufacturers});

				axios.all(
					[
					// create these 2 routes.
					axios.get('/sam_public/dealProducts'), axios.get('/sam_public/popularProducts'), 
					axios.get('/sam_public/products'), axios.get('/sam_public/manufacturers'), 
					 axios.get('/sam_public/categories'), axios.get('/sam_public/sub-categories')   
					]
					).then(axios.spread(function(dealResponse, popularResponse, productResponse, manufacturerResponse, categoryResponse, subCategoryResponse){
						// console.log(dealResponse.data.count);
						app.dealProducts = dealResponse.data.deals;
						app.countDeals = dealResponse.data.count;
						// console.log(app.countDeals);
						app.popularProducts = popularResponse.data.populars;
						app.countPopulars = popularResponse.data.count;
						// console.log(app.popularProducts[0].name);
						app.products = productResponse.data.products;
						app.countProducts = productResponse.data.count;
						// console.log(app.products[0].id);
						app.manufacturers = manufacturerResponse.data.manufacturers;
						app.countMenufactures = manufacturerResponse.data.count;
						// console.log(app.manufacturers);
						console.log(manufacturerResponse.data);
						app.categories = categoryResponse.data.categories;
						// app.countCategories = manufacturerResponse.data.count;
						// console.log(app.categories);
						console.log(categoryResponse.data);
						app.subCategories = subCategoryResponse.data.subCategories;
						// app.countSubCategories = manufacturerResponse.data.count;
						// console.log(app.subCategories);
						console.log(subCategoryResponse.data);
						app.loading = false;
					}));
				},
				stringLimit: function(string, value){
					return ACMESTORE.module.truncateString(string,value);
				},
				addToCart: function(id){
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
				},
				loadMoreProducts: function(){
					var token = $('.display-products').data('token');
					this.loading =true;
					// we use jQuery here becuase axios pass all javascript object to JSON 
					//but php scripts only understand encoded format which can be done by using jQuery
					var data= $.param({next:2, token: token, count:app.count});
					axios.post('/load-more',data)
					.then(function(response){
						app.products = response.data.products;
						app.count = response.data.count;
						app.loading = false;
					});
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
			created: function(){
				// console.log("before runing Vue");
				this.getFeaturedProducts();
			}
			// ,
			// mounted: function(){ //after Vue finsihed loaded.
			// 	$(window).scroll(function(){

			// 		if($(window).scrollTop() + $(window).height() +1 > $(document).height()){
			// 			app.getFeaturedProducts();
			// 		}
			// 	})
			// }
		});
}
})();