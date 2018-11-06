(function(){
	'use strict';

	ACMESTORE.module= {
		truncateString: function limit(string, value){
			// console.log(string.length > value);
			// console.log(string);
			if(string.length > value){
				// console.log(string.substring(0, value) + '...');
				return string.substring(0, value) + '...';
			}else{
				// console.log(string);
				return string;
			}
		},
		//callback is a callback function
		//use callback this way to work our way around return nested callback function 
		addItemToCart: function(id, callback){
			var token = $('.display-products').data('token');

			// console.log(token);

			if(token == null || !token){
				token = $('.product').data('token');
			}
			//data that will be post to PHP script
			var postData = $.param({product_id: id, token: token});

			console.log(postData);	
			//send post request URL which call CartController::addItem (send status message of the request, succeed vs failure) 
			axios.post('/sam_public/cart', postData).then(function(response){
				console.log(response.data);	
				console.log("dafh");
				callback(response.data.success);
			})
		}, 
		arrayUnique: function(array) {
			var a = array.concat();
			for(var i=0; i<a.length; ++i) {
				for(var j=i+1; j<a.length; ++j) {
					if(a[i] === a[j])
						a.splice(j--, 1);
				}
			}

			return a;
		},
		removeDumps: function(names){
			let unique = {};
			names.forEach(function(i){
				if(!unique[i]){
					unique[i] = true;
				}
			});
			return Object.keys(unique);
		}
	}
})();