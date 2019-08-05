$(function(){
	
	$('#register_product_id').on('change', function() {
		var url = $(this).data('url');
		var idPro =  $(this).val();
		$.ajax({
		    url: url,
		    type: 'POST',
		    dataType: 'JSON',
		    data: {
		        idPro: $(this).val(),
		    },
		    success: function(data) {
		    	var html = '';
		    	if(typeof data.price !== 'undefined'){
			        price = data.price;
			        price_f = data.price_f;
			        html += 'Đơn giá: <span>'+price_f+'<sup>đ<sup></span>';
		    	}
		        var quantity = $('#register_quantity').val();
		        if (quantity > 0 && parseInt(data.price)>0) {
		        	html += '*  Thành tiền: <span>'+price*quantity+'<sup>đ<sup></span>';
		        }
		        $('#result').html(html);
		        html='';
		    }
		});
            return false;
    });

	$( "#register_quantity" ).on("input", function() {
		var register_product_id = $('#register_product_id').val();
		if (parseInt(register_product_id) > 0) {

			var url = $(this).data('url');
			var quantity = $(this).val();

			$.ajax({
			    url: url,
			    type: 'POST',
			    dataType: 'JSON',
			    data: {
			        idPro: register_product_id,
			    },
			    success: function(data) {
			    	var html = '';
			    	if(typeof data.price !== 'undefined'){
				        price = data.price;
				        price_f = data.price_f;
				        html += 'Đơn giá: <span>'+price_f+'<sup>đ<sup></span>';
			    	}
			        // var quantity = $('#register_quantity').val();
			        if (quantity > 0 && parseInt(data.price)>0) {
			        	html += '*  Thành tiền: <span>'+numberToCurrency(price*quantity,0,'.',',')+'<sup>đ<sup></span>';
			        }
			        $('#result').html(html);
			        html='';
			        console.log(data);
			        console.log(quantity);
			    }
			});
	            return false;

		}
	})

});

function numberToCurrency(number, decimalSeparator, thousandsSeparator, nDecimalDigits){
    //default values
    decimalSeparator = decimalSeparator || '.';
    thousandsSeparator = thousandsSeparator || ',';
    nDecimalDigits = nDecimalDigits == null? 2 : nDecimalDigits;

    var fixed = number.toFixed(nDecimalDigits), //limit/add decimal digits
        parts = new RegExp('^(-?\\d{1,3})((?:\\d{3})+)(\\.(\\d{'+ nDecimalDigits +'}))?$').exec( fixed ); //separate begin [$1], middle [$2] and decimal digits [$4]

    if(parts){ //number >= 1000 || number <= -1000
        return parts[1] + parts[2].replace(/\d{3}/g, thousandsSeparator + '$&') + (parts[4] ? decimalSeparator + parts[4] : '');
    }else{
        return fixed.replace('.', decimalSeparator);
    }
}