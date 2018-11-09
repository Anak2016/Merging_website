

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
				selectedDeal:[],
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
				checkedSubCategories: [],
				manufacturerKeyword: "",
				categoryKeyword: "",
				subCategoryKeyword: "",
				keyword: null,
				// pageCount: 0,
				pageDeal: 1,
				pageShop: 1,
				pageDealCount: 0,
				pageShopCount: 0

			},
			// conponent: {paginate},
			methods:{ // all of the function must be inside of the object is passed to method property's of Vue.js.
			getFeaturedProducts: function(){

				axios.all(
					[
					// create these 2 routes.
					axios.get('/sam_public/dealProducts'), axios.get('/sam_public/popularProducts'), 
					axios.get('/sam_public/products'), axios.get('/sam_public/manufacturers'), 
					axios.get('/sam_public/categories'), axios.get('/sam_public/sub-categories')   
					]
					).then(axios.spread(function(dealResponse, popularResponse, productResponse, manufacturerResponse, categoryResponse, subCategoryResponse){
						console.log(dealResponse.data.deals);
						app.dealProducts = dealResponse.data.deals;
						// app.dealProducts = dealResponse.data.deals;
						app.countDeals = dealResponse.data.count;
						// app.pageLinks = dealResponse.data.pageLinks;
						// app.pageLinks = $('dealResponse.data.pageLinks');
						// app.pageLinks = 
						app.pageDealCount = dealResponse.data.pageCount;
						// console.log(dealResponse.data.pageLinks);
						// console.log(app.pageLinks);

						app.popularProducts = popularResponse.data.populars;
						app.countPopulars = popularResponse.data.count;
						// console.log(app.popularProducts[0].name);
						app.products = productResponse.data.products;
						app.countProducts = productResponse.data.count;
						app.pageShopCount = productResponse.data.pageCount; ////////
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
					console.log("in home_product.addTocart()");
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
					var data= $.param({next:2, token: token, count:app.countPopulars});
					axios.post('/load-more',data)
					.then(function(response){
						app.popularProducts = response.data.products;
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
						selectedManufacturers.push(element); //put selected id in array form
					});
					this.checkedCategories.forEach(function(element){
						// console.log(element);
						selectedCategories.push(element); //put selected id in array form
					});
					this.checkedSubCategories.forEach(function(element){
						// console.log(element);
						selectedSubCategories.push(element); //put selected id in array form
					});

					// console.log(selectedManufacturers);
					// console.log(selectedCategories); 
					// console.log(selectedSubCategories);

					var data= $.param({selectedManufacturers: selectedManufacturers, selectedCategories: selectedCategories, selectedSubCategories:selectedSubCategories});
					axios.post('/sam_public/loadCheckedItems',data)
					.then(function(response){

						// console.log("response.data.dealProducts = ");
						// console.log(response.data)
						// console.log(response.data.products);
						app.selectedProduct = response.data.products;
						app.selectedDeal = response.data.dealProducts; 
						app.countDeals = response.data.countDeals;
						// console.log(typeof app.selectedDeal)
						app.pageDealCount = Math.ceil(app.countDeals/2); // pageCount of productDeals

						// console.log(app.pageCount);
						
						app.products =[];
						app.dealProducts = [];
						// var an_array = [];
						for(var i = 0; i < app.selectedProduct.length; i++)
						{
							app.products = app.products.concat(app.selectedProduct[i]);
						}

						for(var i = 0; i < app.selectedDeal.length; i++)
						{
							app.dealProducts = app.dealProducts.concat(app.selectedDeal[i]);
						}
						// console.log("+++++++++++++++++++++++++++++++++");
						// console.log(app.products);
						// console.log("+++++++++++++++++++++++++++++++++");
						// console.log(app.products[100].id);

						// app.products = ACMESTORE.module.arrayUnique(  app.products);
						for(var i = 0; i < app.products.length; i ++){ 
							if(typeof app.products[i] != 'undefined'){
								// console.log("big i = " + i);
								for(var j = 0; j < i; j ++){
									// console.log(app.products);
									if(typeof app.products[j] != 'undefined' && typeof app.products[i] != 'undefined')
									{
										if(app.products[i].id == app.products[j].id){
											app.products.splice(i,1);
											j--;
											i--;
											// console.log("dubplicate: "+ app.products[j].id);
										}else{
											// console.log("not dubplicate:" + app.products[j].id);
										}
									}else{
										// console.log("undefined");
										// console.log("j = "+ j);
										// console.log(app.products[j]);
										// console.log("i = "+ i);
										// console.log(app.products[i]);
									}
								}
								// console.log("=========================");
							}
							
						}

						for(var i = 0; i < app.dealProducts.length; i ++){ 
							if(typeof app.dealProducts[i] != 'undefined'){
								// console.log("big i = " + i);
								for(var j = 0; j < i; j ++){
									// console.log(app.products);
									if(typeof app.dealProducts[j] != 'undefined' && typeof app.dealProducts[i] != 'undefined')
									{
										if(app.dealProducts[i].id == app.dealProducts[j].id){
											app.dealProducts.splice(i,1);
											j--;
											i--;
										}
									}
								}
								
							}
							
						}
						console.log(app.products);
						// console.log(app.dealProducts);
						app.countProducts = response.data.count;
						app.countDeals = response.data.count
						app.loading = false;
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
					},
					clickCallbackDeal: function(pageNum){
						// console.log(pageNum);
						// pass pageNum
						this.page = pageNum;
						app.dealProducts = [];
						var data= $.param({pageNum: pageNum });
						// console.log(pageNum);
						axios.post('/sam_public/dealProducts', data).then(function(response){
							console.log(response.data);
							app.dealProducts = response.data.deals;
							app.countDeals = response.data.count;
							app.pageDealCount = response.data.pageCount;
						});
						// console.log(this.dealProducts);
					},
					clickCallbackShop: function(pageNum){
						// console.log(pageNum);
						// pass pageNum
						this.page = pageNum;
						app.products = [];
						var data= $.param({pageNum: pageNum });
						// console.log(pageNum);
						axios.post('/sam_public/products', data).then(function(response){
							console.log(response.data);
							app.products = response.data.products;
							app.countProducts = response.data.count;
							app.pageShopCount = response.data.pageCount;
							console.log(app.pageShopCount);
						});
						// console.log(this.dealProducts);
					},


				},
				created: function(){
					console.log("in home_Product.js");
					this.getFeaturedProducts();
				},
			// ,
			mounted: function(){ //after Vue finsihed loaded.
				$(window).scroll(function(){

					if($(window).scrollTop() > $(document).height() - 1300) {
						// console.log("near bottom!");
						app.loadMoreProducts();
					}
					
				})
			}
		});
}
})();