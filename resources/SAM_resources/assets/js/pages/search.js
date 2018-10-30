(function(){
	'use strict';

	ACMESTORE.product.search = function(){
		var app = new Vue({
			el:'#root',
			data: {
				products: [],
				manufacturers: [],
				searchProducts: [],
				countSearches: 0,
				countMenufactures: 0,
				// keyword: "nothing",
				loading: false
			},
			methods:{ // all of the function must be inside of the object is passed to method property's of Vue.js.
			getFeaturedProducts: function(){
				
				var keyword = $('#keyword').val();

				// console.log($('#keyword').val());
				// console.log(keyword);
				var data= $.param({keyword: keyword});
				// axios.post('/sam_public/searchResult',data)
				// .then(function(response){

				// 	app.searchProducts = response.data.results;
				// 	app.countSearches = response.data.count;
				// 	app.loading = false;
				// });

				axios.all(
					[
					// create these 2 routes.
					axios.post('/sam_public/searchResult',data), axios.get('/sam_public/manufacturers') 
					]
					).then(axios.spread(function(response, manufacturerResponse){
						// console.log(dealResponse.data.count);
						app.searchProducts = response.data.results;
						app.countSearches = response.data.count;
						app.loading = false;
						// console.log(app.products[0].id);
						app.manufacturers = manufacturerResponse.data.manufacturers;
						app.countMenufactures = manufacturerResponse.data.count;
						// console.log(app.manufacturers[0].id);

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