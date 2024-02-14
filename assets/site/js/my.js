var aed = 'AED';
var cart_name =  'cart_'+department_id;
if (lang == 'ar') {
	aed = 'درهم';
}
function search_items(){
			var  params =  window.location.href.split('?')[1];
			var  category_slug ;
			if ($('#category_slug').length) {
				category_slug =  $('#category_slug').val();
			}
			var brand;
			if ($('#brand').length) {
				brand = $('#brand').val();
			}
			var department_id;
			if ($('#department_id').length) {
				  department_id = $('#department_id').val();
			}
			var url = base_url+'/'+lang+'/ajax/search?'+params;
			$('.loader').addClass('show');
			var currentUrl      = window.location.href;
			 var url2 = new URL(currentUrl);
			url2.searchParams.set("page", 1); // setting your param
			var newUrl = url2.href; 
			window.history.replaceState(null, null, newUrl);
			$.get(url,{category_slug:category_slug,brand:brand,department_id:department_id},function(data){
		      	$('#products_holder').html(data.text);
			      $('.loader').removeClass('show');
			      $('html, body').animate({
				        scrollTop: $('#products_holder').offset().top - 150 //#DIV_ID is an example. Use the id of your destination on the page
				    }, 'slow');
			});
}
function load_more(){
	  /* start  load */
    var currentUrl      = window.location.href;
		var url2 = new URL(currentUrl);
		var queryString = window.location.search;
		var urlParams = new URLSearchParams(queryString);
		var page = urlParams.get('page');
		if (page < 1) {
			page = 2;
		}else{
			page++;
		}
    var  params =  window.location.href.split('?')[1];
		var  category_slug ;
		if ($('#category_slug').length) {
			category_slug =  $('#category_slug').val();
		}
		var brand;
			if ($('#brand').length) {
				brand = $('#brand').val();
			}
		var department_id;
		if ($('#department_id').length) {
			  department_id = $('#department_id').val();
		}
		var url = base_url+'/'+lang+'/ajax/search?'+params+'&page='+page;
		$('#products_holder').addClass('loader');
		$.get(url,{category_slug:category_slug,brand:brand,department_id:department_id},function(data){
	      	$('#products_holder').append(data.text);
		      $('#products_holder').removeClass('loader');

          var currentUrl      = window.location.href; 
          var url = new URL(currentUrl);
					url.searchParams.set("page", data.page);
					var newUrl = url.href; 
					window.history.replaceState(null, null, newUrl);
		});
}
if ($('.custom-collapse').length) {
      $('.custom-collapse.collapsed .collapse-body').slideUp(0)
      $('.custom-collapse button').click(function(e) {
          e.preventDefault()
          $(this).next('.collapse-body').slideToggle();
          $(this).parent('.custom-collapse').toggleClass('collapsed');
      });

      let rangeSlider = $('#range_slider'),
          rangeVal = rangeSlider.val();
          rangeMax = rangeSlider.attr('max'),
          rangeAverage = (rangeVal/rangeMax) * 100,
          rangeStarAva = ((rangeVal/rangeMax) * 5).toFixed(1);

      $('.average-slider .stars .count').html(rangeStarAva)

      rangeSlider.css('background', `linear-gradient(to right, rgb(204, 204, 204) 0%, rgb(204, 204, 204) ${rangeAverage}%, #FDCD2D ${rangeAverage}%, #FDCD2D 100%)`);

      rangeSlider.mousemove(function() {
          rangeVal = rangeSlider.val();
          rangeMax = rangeSlider.attr('max');
          rangeAverage = (rangeVal/rangeMax) * 100;
          rangeStarAva = ((rangeVal/rangeMax) * 5).toFixed(1);
          
          $('.average-slider .stars .count').html(rangeStarAva);
          rangeSlider.css('background', `linear-gradient(to right, rgb(204, 204, 204) 0%, rgb(204, 204, 204) ${rangeAverage}%, #FDCD2D ${rangeAverage}%, #FDCD2D 100%)`)
      })
      $('#range_slider').click(function(){
      	setTimeout(function(){
	            var rate       = $('.average-slider .stars .count').text();
	            var currentUrl      = window.location.href; var url = new URL(currentUrl);
							url.searchParams.set("rate", rate); // setting your param
							var newUrl = url.href; 
							window.history.replaceState(null, null, newUrl);
							search_items();
      	},1000)
      	
      })
}
$('.filter_action').change(function(){
	var name =  $(this).attr('name');
	var val  =  $(this).val();
	var type  =  $(this).data('type');
	var currentUrl      = window.location.href; 
	var url = new URL(currentUrl);
	if (type == 'arr') {
		url.searchParams.delete(name);
		var  arr =  $("input[name='"+name+"']")
              .map(function(){ 
              	return $(this).val();
              }).get();
		$("input[name='"+name+"']:checked").each(function(el){
			console.log($(this).val());
			url.searchParams.append(name,$(this).val());
		});
		
	}else{
		url.searchParams.set(name, val);
	}
	url.searchParams.set("page", 1)
	var newUrl = url.href; 
	window.history.replaceState(null, null, newUrl);
	search_items();
	bind = 1;
});
if ($('#products_holder').length) {
	   var bind =  1;
	  $(window).on('scroll', function() {
	  	  
	  		if ($(window).scrollTop() >= $('#products_holder').offset().top + $('#products_holder').
		        outerHeight() - window.innerHeight) {
	  			    if (bind == 1) {
	  			    	bind =0;
	  			    	var currentUrl      = window.location.href;
								var url2 = new URL(currentUrl);
								var queryString = window.location.search;
								var urlParams = new URLSearchParams(queryString);
								var page = urlParams.get('page');
								if (page < 1) {
									page = 2;
								}else{
									page++;
								}
						    var  params =  window.location.href.split('?')[1];
								var  category_slug ;
								if ($('#category_slug').length) {
									category_slug =  $('#category_slug').val();
								}
								var  brand ;
								if ($('#brand').length) {
									brand =  $('#brand').val();
								}
								var department_id;
								if ($('#department_id').length) {
									  department_id = $('#department_id').val();
								}
								var url = base_url+'/'+lang+'/ajax/search?'+params+'&page='+page;
								$('.load-more-spinner').addClass('show');
								$.get(url,{category_slug:category_slug,brand:brand,department_id:department_id},function(data){
							      	$('#products_holder').append(data.text);
								      $('.load-more-spinner').removeClass('show');
											if (data.state ==  1) {
												bind = 1;
												var currentUrl      = window.location.href; 
							                    var url = new URL(currentUrl);
												url.searchParams.set("page", data.page);
												var newUrl = url.href; 
												window.history.replaceState(null, null, newUrl);
											}
								});
	  			    }							
		    }
	  	
		    
		});
}
$('#searchBar').keyup(function(){
   var  text  =  $(this).val();
   if (text.length >= 3) {
   	  $.get(base_url+'/'+lang+'/suggestions',{text:text},function(data){
   	  		$('#products-search .search-ul').html('');
   	  		$.each(data.products,function(index,value){
   	  			$('#products-search .search-ul').append('<li><a href="'+base_url+'/'+lang+'/single/product/'+value.id+'/'+value.slug+'">'+value.name+'</a></li>')
   	  		});
   	  		$('#brands-search .search-ul').html('');
   	  		$.each(data.brands,function(index,value){
   	  			$('#brands-search .search-ul').append('<li><a href="'+base_url+'/'+lang+'/single/brand/'+value.slug+'">'+value.name+'</a></li>')
   	  		});
   	  });
   	  $('.search-holder').removeClass('hide');
   }else{
      $('.search-holder').addClass('hide');
   }
   if (text.length == 0){
   		$('.search-btn').addClass('hide');
   }else{
   		$('.search-btn').removeClass('hide');
   }
});
$('#restaurantBar').keyup(function(){
   var  text  =  $(this).val();
   if (text.length >= 3) {
   	  $.get(base_url+'/'+lang+'/restaurant/suggestions',{text:text},function(data){
   	  		$('#products-search .search-ul').html('');
   	  		$.each(data,function(index,value){
   	  			$('#products-search .search-ul').append('<li><a href="'+base_url+'/'+lang+'/single/restaurant/'+value.slug+'">'+value.name+'</a></li>')
   	  		});
   	  });
   	  $('.search-holder').removeClass('hide');
   }else{
      $('.search-holder').addClass('hide');
   }
   if (text.length == 0){
   		$('.search-btn').addClass('hide');
   }else{
   		$('.search-btn').removeClass('hide');
   }
});
$('.search-form').submit(function(){
	e.preventDefault();
});
$('.search-btn').click(function(){
	$('.search-holder').addClass('hide');
	$('#searchBar').val('');
	$('.search-btn').addClass('hide');
})
$('.ajax-form').submit(function(e){
		e.preventDefault();
		var  el      =  $(this);
	  var  url     =  el.attr('action');
	  var fields =  el.serialize();
	  el.addClass('form-loader');
	  $.post(url,fields,function(data){
	  	el.removeClass('form-loader');
	  	if (data.state == 0) {
	  		var text = '<ul class="error-ul">';
	  		$.each(data.msg,function(index,value){
	  			 text +='<li>'+value+'</li>';
	  		});
	  		text += '</ul>';
	  		el.children('.form-alert').html(text);
	  	}else{
	  		el.children('.form-alert').html('<h3 class="success-h3">'+data.msg+'</h3>');
	  		setTimeout(function(){
	  				el.children('.form-alert').html('');
	  		},3000)
	  	}
	  	if (data.reset == 1) {
	  		el[0].reset();
	  	}
	  });
});
function success_msg(msg){
	console.log(msg);
}
$('.add-fav').click(function(){
	  var  id =  $(this).data('id');
	  el      =  $(this);
	  $.get(base_url+'/'+lang+'/add/favourit',{id:id},function(data){
	  		if (data.state == 1) {
	  		   el.addClass('active');
	  		}else{
	  			el.removeClass('active');
	  		}
	  		success_msg(data.msg);
	  })
});
function userExists(product_id,arr) {
  return arr.some(function(el) {
    return el.product_id === product_id;
  }); 
}
$('.add-cart').click(function(){
	 var id       =  $(this).data('id');
	 var quantity = ($('#quantity').length)?$('#quantity').val():1;
	 var old_carts = JSON.parse(localStorage.getItem(cart_name));
	 var size     = $('.product-size:checked').val();
	 var options     = [];
	 $('.product-option:checked').each(function(){
		  options.push($(this).val()) ;
	 })
	 var upons     = [];
	 $('.product-upon:checked').each(function(){
		  upons.push($(this).val()) ;
		})
	 var items = (old_carts)?old_carts:[];
	 if (!userExists(id,items)) {
	 	  var state =  1;
	 	  if (department_id == 2) {
	 	  	var el = $(this);
	 	  	$.get(base_url+'/check/cart',{items:items,product_id:id},function(data){
		 	  	if (data == 1) {
		 	  		items.push({product_id:id,quantity:quantity,size:size,options:options,upons:upons});
					  localStorage.setItem(cart_name, JSON.stringify(items));
					  if (lang == 'ar') {
							el.html('حذف من السلة');
						}else{
							el.html('Remove From Cart');
						}
		 	  	}else{
		 	  		alert('there is items from others restaurants')
		 	  	}
		 	  });
	 	  }else{
	 	  	items.push({product_id:id,quantity:quantity,size:size,options:options,upons:upons});
			  localStorage.setItem(cart_name, JSON.stringify(items));
			  if (lang == 'ar') {
					$(this).html('حذف من السلة');
				}else{
					$(this).html('Remove From Cart');
				}
	 	  }
	 	
	 		
	 }else{
	 	  index = items.findIndex(x => x.product_id === id);
	 	  items.splice(index,1)
		  localStorage.setItem(cart_name, JSON.stringify(items));
		  if (lang == 'ar') {
				$(this).html('إضافة للسلة');
			}else{
				$(this).html('ADD TO CART');
			}
	 }
    var cart = JSON.parse(localStorage.getItem(cart_name));
	  $('#cart_count').html(cart.length);
});
function update_cart() {
   var id =  $('#product_id').data('id');
   var state = check_cart(id);
   if (state == 1) {
   			 var quantity = ($('#quantity').length)?$('#quantity').val():1;
				 var old_carts = JSON.parse(localStorage.getItem(cart_name));
				 var size     = $('.product-size:checked').val();
				 var options     = [];
				 $('.product-option:checked').each(function(){
					  options.push($(this).val()) ;
				 });

				 var upons     = [];
				 $('.product-upon:checked').each(function(){
					  upons.push($(this).val()) ;
					})

					var old_carts = JSON.parse(localStorage.getItem(cart_name));
				  var items = (old_carts)?old_carts:[];
					index = items.findIndex(x => x.product_id === id);
					items.splice(index,1)
					items.push({product_id:id,quantity:quantity,size:size,options:options,upons:upons});
		      localStorage.setItem(cart_name, JSON.stringify(items));
				  
		}
}
$('.update-cart').change(function(){
		update_cart();
});
// $('.fa-minus , .fa-plus').click(function(){
// 	update_cart();
// });
function check_cart(product_id) {
	var old_carts = JSON.parse(localStorage.getItem(cart_name));
	var items = (old_carts)?old_carts:[];
	if (userExists(product_id,items)) {
	 		return 1;
	}
}
$('.product-option').click(function(event) {
	    var count =   $('.product-option:checked').length;
	    var  max  =   $(this).data('max');
	    console.log(max+'_'+count);
	    if (count > max) {
	    	if($(this).is(":checked")) {  
			 		event.preventDefault();
			  }
	    }
});

if ($('.add-cart').length) {
	$('.add-cart').each(function(){
		var id       =  $(this).data('id');
		var state = check_cart(id);    
		if (state == 1) {
					if (lang == 'ar') {
						$(this).html('حذف من السلة');
					}else{
						$(this).html('Remove From Cart');
					}
					var old_carts = JSON.parse(localStorage.getItem(cart_name));
				  var items = (old_carts)?old_carts:[];
					index = items.findIndex(x => x.product_id === id);
				 	var quantity = items[index].quantity;
				 	var size      = items[index].size;
				 	$('.product-size[value="'+size+'"]').trigger('click');
				 	$('.item-quantity[data-id="'+id+'"]').val(quantity);
				 	var options =  items[index].options;
				 	$(options).each(function(index,value){
				 			$('.product-option[value="'+value+'"]').trigger('click');
				 	});
				 	var upons =  items[index].upons;
				 	$(upons).each(function(index,value){
				 			$('.product-upon[value="'+value+'"]').trigger('click');
				 	})
		}
	})
	var old_carts = JSON.parse(localStorage.getItem(cart_name));
	var count = old_carts.length;

}

if($('#cart_loader').length){
			var old_carts = JSON.parse(localStorage.getItem(cart_name));
			var items = (old_carts)?old_carts:[];
			var  single_link = '/single/product/';
			if (department_id == 2) {
				   single_link = '/single/meal/';
			}
			$.get(base_url+'/'+lang+'/mycart',{items:items},function(data){
					var  text = '';
					$(data.items).each(function(index,item){
						  text +='<div class="cart-box">\
											        <a href="'+base_url+'/'+lang+single_link+item.id+'/'+item.slug+'" class="img">\
											            <img src="'+base_url+'/'+item.item_thumb+'" alt="'+item.name+'">\
											        </a>\
											        <div class="info">\
											            <a href="'+base_url+'/'+lang+single_link+item.id+'/'+item.slug+'" class="title">\
											                '+item.name+'\
											            </a>\
											            <p class="price">\
											                '+item.price_after_discount+' '+aed+'\
											            </p>';
								if (data.auth == true) {
									text += '<div>\
											                <span class="wish active">\
											                    <i class="fas fa-heart"></i>\
											                    move to wishlist \
											                </span>\
											            </div>';
								}
											            
							text 			     +=	 '<div class="quantity" data-id="'+item.id+'">\
											                <i class="fas fa-minus min up-quantity"></i>\
											                <input type="number" min="1" max="100" value="'+item.quantity+'">\
											                <i class="fas fa-plus plus up-quantity"></i>\
											            </div>\
											        </div>\
											        <a class="close_item" data-id="'+item.id+'"><i class="far fa-trash-alt" ></i></a>\
											    </div>';
							
					});
					$('#cart-items').html(text);
					$('#subtotal_price').html(data.subtotal_price+' '+aed);
					$('#total_price').html(data.total_price+' '+aed);
					$('#delivery_price').html(data.delivery_charge+' '+aed);
					$('.close_item').click(function(){
								var  id = $(this).data('id');
								var old_carts = JSON.parse(localStorage.getItem(cart_name));
							  var cart_items = (old_carts)?old_carts:[];
							  index = cart_items.findIndex(x => x.product_id === id);
								  cart_items.splice(index,1)
								  
							  localStorage.setItem(cart_name, JSON.stringify(cart_items));
								$(this).parent().remove();
								
					})
					$('#cart_loader').removeClass('cart-loader');
			});
}
if ($('#cart_count').length) {
	    var old_carts = JSON.parse(localStorage.getItem(cart_name));
	    var items = (old_carts)?old_carts:[]
			$('#cart_count').html(items.length);
}
if ($('#address').length) {
	  $('#input-tell').intlTelInput({
            utilsScript: "js/utils.js"
        });

		$('.step:not(.active)').slideUp(0);
		let nextStepFunc = function(activeIndex) {
			$('.step').eq(activeIndex).removeClass('active').slideUp();
			$('.step').eq(activeIndex + 1).addClass('active').slideDown();
			$('.checkout-progress .list li').eq(activeIndex + 1).addClass('active');
		};
		let prevStepFunc = function(activeIndex) {
			$('.step').eq(activeIndex).removeClass('active').slideUp();
			$('.step').eq(activeIndex - 1).addClass('active').slideDown();
			$('.checkout-progress .list li').eq(activeIndex).removeClass('active');
		};
		$('.next-step').click(function(e) {
			e.preventDefault()
			let activeIndex = $(this).parents('.step').index();
			nextStepFunc(activeIndex);
		});
		$('.prev-step').click(function(e) {
			e.preventDefault()
			let activeIndex = $(this).parents('.step').index();
			prevStepFunc(activeIndex);
		});
}

$('#cart-items').on("click",'.quantity .plus',function(){
	var el = $(this).parent();
	let quantityInput = $(this).parent().find('input');
  let quantityMax = quantityInput.attr('max');
  let quantityMin = quantityInput.attr('min');
  let currentVal = parseInt(quantityInput.val())
  if(currentVal < quantityMax) {
    $(this).prev().val(currentVal + 1)
  }
})
$('#cart-items').on("click",'.quantity .min',function(){
	var el = $(this).parent();
	let quantityInput = $(this).parent().find('input');
  let quantityMin = quantityInput.attr('min');
  let currentVal = parseInt(quantityInput.val())
  if(currentVal > quantityMin) {
      $(this).next().val(currentVal - 1)
  }
});
$('#cart-items').on('click','.up-quantity',function(){
		let quantityInput = $(this).parent().find('input');
		var quantity      = quantityInput.val();
		var id    = $(this).parent().data('id');
    var state = check_cart(id);
    if (state == 1) {
					var old_carts = JSON.parse(localStorage.getItem(cart_name));
				  var items = (old_carts)?old_carts:[];
					index = items.findIndex(x => x.product_id === id);
					product =  items[index];
					product.quantity = quantity;
					items.splice(index,1)
					items.push(product);
		      localStorage.setItem(cart_name, JSON.stringify(items));
		      $.get(base_url+'/'+lang+'/mycart',{items:items},function(data){
							$('#subtotal_price').html(data.subtotal_price+' '+aed);
							$('#total_price').html(data.total_price+' '+aed);
							$('#delivery_price').html(data.delivery_charge+' '+aed);
							
					});
				  
		 }

});
