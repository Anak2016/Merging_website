(function(){
	'use strict';

	ACMESTORE.product.cart = function(){

		var Stripe = StripeCheckout.configure({
			key: $('#properties').data('stripe-key'),
			locale: "auto",
			// image: "" //optional
			token: function(token){
				//$.param will be sent as XHR request.
				var data= $.param({stripeToken: token.id, stripeEmail:token.email});
				//send XHR post request 
				axios.post('/sam_public/cart/payment', data).then(function(response){
					$(".notify").css("display", "block").delay(4000).slideUp(300).html(response.data.success);
					app.displayItems(200);
				}).catch(function(error){
					console.log(error);
				});
			}
		});

		var app = new Vue({
			el: '#shopping_cart',
			data:{
				items: [],
				cartTotal: 0,
				loading: false,
				fail: false,
				authenticated: false,
				message: '',
				amountInCents: 0,
				ip_add: ""
			},
			methods:{
				displayItems: function(){
					this.loading = true;

					axios.all(
					[
						axios.get('/sam_public/cart/items')
					]
					).then(axios.spread(function(response){

						// console.log(response.data.fail);
						// console.log("here");
						if(response.data.fail){
							app.fail = true;
							app.message = response.data.fail;
							app.loading = false;
						}else{
							app.items = response.data.items;
							app.cartTotal = response.data.cartTotal;
							app.loading = false;
							app.authenticated = response.data.authenticated;
							app.amountInCents = response.data.amountInCents;
							console.log(app.items);
						}
					}));
				},
				updateQuantity: function(product_id, operator){
					// alert(product_id + " " + operator);
					var postData = $.param({product_id: product_id, operator:operator});
					axios.post('/sam_public/cart/update-qty', postData).then(function(response){
						//update part of the page that display items on to screen.
						app.displayItems();
					});
					// console.log("hi");
				},
				removeItem: function(index){
					var postData = $.param({item_index: index});
					axios.post("/sam_public/cart/remove-item", postData).then( function(response){
						$(".notify").css("display", "block").delay(4000).slideUp(300) 
							.html(response.data.success);
						app.displayItems();
					});
				},
				emptyCart: function(cart){
					//remove the whole cart
					var postData = $.param({cart:cart});
					axios.post("/sam_public/cart/empty-cart", postData).then( function(response){
						$(".notify").css("display", "block").delay(4000).slideUp(300) 
							.html(response.data.success);
						app.displayItems();
					});
				},
				checkout: function(){
					// alert('can see');
					Stripe.open({
						name: "Ei-Shop",
						description: "Shopping Cart Items",
						email: $('#properties').data('customer-email'),
						amount: app.amountInCents,
						zipCode:true
					});
					// redirect to Order Complete after payment has been made.
				},
				stringLimit: function(string, value){
					// console.log(ACMESTORE.module.truncateString(string,value));
					return ACMESTORE.module.truncateString(string,value);
				}
				// belwo is SAM code
			},
			created: function(){
				this.displayItems();
				// this.checkout();
			}
		});
	}

})();