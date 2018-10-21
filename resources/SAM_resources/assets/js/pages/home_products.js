(function(){
	'use strict';

	ACMESTORE.homeslider.homePageProducts = function(){
		console.log("before runing Vue");
		var app = new Vue({
			el:'#root',
			data: {
				dealProducts:[],
				popularPproducts: [],
				dealCount: 0,
				popularCount: 0,
				loading: false
			},
			methods:{ // all of the function must be inside of the object is passed to method property's of Vue.js.
			getFeaturedProducts: function(){
				this.loading = true;
				console.log("here");
				axios.all(
					[
					// create these 2 routes.
					axios.get('/sam_public/dealProducts'), axios.get('/popularProducts')
					]
					).then(axios.spread(function(dealResponse, popularRensponse){
						// console.log(dealResponse.data.deal);
						app.dealProducts = dealResponse.data.deal;
						app.dealCount = dealRensponse.data.count;
						app.popularProducts = popularRensponse.data.popular;
						app.popularCount = popularRensponse.data.count;
						app.loading = false;
					}));
				},
				// stringLimit: function(string, value){
				// 	ACMESTORE.module.truncateString(string,value);
				// },
				// addToCart: function(id){
				// 	ACMESTORE.module.addItemToCart(id, function(message){
				// 		$(".notify").css("display", "block").delay(4000).slideUp(300)
				// 		.html(message);
				// 	});
				// },
				// loadMoreProducts: function(){
				// 	var token = $('.display-products').data('token');
				// 	this.loading =true;
				// 	// we use jQuery here becuase axios pass all javascript object to JSON 
				// 	//but php scripts only understand encoded format which can be done by using jQuery
				// 	var data= $.param({next:2, token: token, count:app.count});
				// 	axios.post('/load-more',data)
				// 	.then(function(response){
				// 		app.products = response.data.products;
				// 		app.count = response.data.count;
				// 		app.loading = false;
				// 	});
				// }
			},
			created: function(){
				// console.log("before runing Vue");
				this.getFeaturedProducts();
			}
			// ,
			// mounted: function(){ //after Vue finsihed loaded.
			// 	$(window).scroll(function(){

			// 		if($(window).scrollTop() + $(window).height() +1 > $(document).height()){
			// 			app.loadMoreProducts();
			// 		}
			// 	})
			// }
		});
	}
})();