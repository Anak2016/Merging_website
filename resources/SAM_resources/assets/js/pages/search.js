(function(){
	'use strict';

	ACMESTORE.product.search = function(){
		var app = new Vue({
			el:'#root',
			data: {
				product: [],
				categories: [],
				subCategories: [],
				searchProducts: [],
				manufacturers: [],
				similarProducts: [],
				countMenufactures: 0,
				// countSearchProducts: 0,
				ip: "nothing",
				
				checkedMenufacturers: [],
				checkedCategories: [],
				checkedSubCategories: [],
				selectedProduct: [],
				selectedSearch: [],
				countSearches: 0,
				countProducts: 0,
				keyword: '',
				manufacturerKeyword: "",
				categoryKeyword: "",
				subCategoryKeyword: "",
				loading: false
			},
			methods:{ // all of the function must be inside of the object is passed to method property's of Vue.js.
			getFeaturedProducts: function(){
				
				this.keyword = $('#keyword').val();

				// console.log($('#keyword').val());
				// console.log(keyword);
				var data= $.param({keyword: this.keyword});
				// axios.post('/sam_public/searchResult',data)
				// .then(function(response){

				// 	app.searchProducts = response.data.results;
				// 	app.countSearches = response.data.count;
				// 	app.loading = false;
				// });

				axios.all(
					[
					// create these 2 routes.
					axios.post('/sam_public/searchResult',data), axios.get('/sam_public/manufacturers'),
					axios.get('/sam_public/categories'), axios.get('/sam_public/sub-categories')    
					]
					).then(axios.spread(function(response, manufacturerResponse, categoryResponse, subCategoryResponse){
						// console.log(dealResponse.data.count);
						app.searchProducts = response.data.results;
						app.countSearches = response.data.count;
						app.loading = false;
						// console.log(app.products[0].id);
						app.manufacturers = manufacturerResponse.data.manufacturers;
						app.countMenufactures = manufacturerResponse.data.count;
						// console.log(app.manufacturers[0].id);
						app.categories = categoryResponse.data.categories;
						
						app.subCategories = subCategoryResponse.data.subCategories;

						app.loading = false;
					}));

					this.loading = true;

				},
				stringLimit: function(string, value){
					return ACMESTORE.module.truncateString(string,value);
				},
				addToCart: function(id){
					ACMESTORE.module.addItemToCart(id, function(message){
						$(".notify").css("display", "block").delay(4000).slideUp(300)
						.html(message);
					});
					location.reload();
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


					var data= $.param({selectedManufacturers: selectedManufacturers, selectedCategories: selectedCategories, selectedSubCategories:selectedSubCategories, keyword: this.keyword});
					axios.post('/sam_public/loadCheckedItems',data)
					.then(function(response){
						// var selectedProduct = response.data.products;

						console.log(response.data.searchProducts);
						app.selectedSearch = response.data.searchProducts;
						// app.selectedProduct = response.data.searchProducts;
						// console.log(app.selectedProduct);
						
						app.searchProducts =[];
						for(var i = 0; i < app.selectedSearch.length; i++)
						{
							app.searchProducts = app.searchProducts.concat(app.selectedSearch[i]);
							// console.log(app.products);
						}

						for(var i = 0; i < app.searchProducts.length; i ++){ 
							if(typeof app.searchProducts[i] != 'undefined'){
								// console.log("big i = " + i);
								for(var j = 0; j < i; j ++){
									// console.log(app.products);
									if(typeof app.searchProducts[j] != 'undefined' && typeof app.searchProducts[i] != 'undefined')
									{
										if(app.searchProducts[i].id == app.searchProducts[j].id){
											app.searchProducts.splice(i,1);
											j--;
											i--;
										}
									}
								}
							}
						}
							
						// }
						console.log(app.searchProducts);
						console.log(response.data.countSearches);
						// app.products = response.data.products;
						app.countSearches = response.data.countSearches;
						// app.getFeaturedProducts();
						app.loading = false;
						// console.log(app.selectedProduct[1][0].id);
					});

				},
				searchKeyword : function(){
					//get result with query
					//console.log("This is keywordInput = " + this.keywordInput);
					
					var manufacturerData = $.param({keyword: this.manufacturerKeyword}); 
					var categoryData = $.param({keyword: this.categoryKeyword}); 
					var subCategoryData = $.param({keyword: this.subCategoryKeyword}); 
					this.manufacturers = [];
					this.categories = [];
					this.subCategories = [];
					axios.all(
						[
						// create these 2 routes.
						axios.post('/sam_public/manufacturerKeyword', manufacturerData), 
						axios.post('/sam_public/categoryKeyword', categoryData),
						axios.post('/sam_public/subCategoryKeyword', subCategoryData)
						]).then(axios.spread(function(responseManufacturer, responseCategory, responseSubCategory ){
						// console.log(typeof response.data);
						// console.log(responseManufacture.data[Object.keys(response.data)[0]]);
						app.manufacturers = responseManufacturer.data.keyword;
						app.categories = responseCategory.data.keyword;
						app.subCategories = responseSubCategory.data.keyword;
					}));
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