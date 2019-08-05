$(function(){
	var product = $('#register_product_id').val();
	if (parseInt(product)==1) {
		$('#form_price').css('display', 'none');
		$('#register_quantity').css('display', 'none');
	}

	$( "#register-quantity" ).on("input", function() {
		var register_product_id = $('#register_product_id').val();
		if (parseInt(register_product_id) > 1 && register_product_id !== undefined) {
			var url = $(this).data('url');
			var quantity = $(this).val();
			// console.log(quantity*register_product_id)
			$.ajax({
			    url: url,
			    type: 'POST',
			    dataType: 'JSON',
			    data: {
			        idPro: register_product_id,
			    },
			    success: function(data) {
					var form_price = $('#form_price');
					if (parseInt(data.id) != 1 && data.price_f != null){
						form_price.children('.register_price').html('<strong>'+data.price_f + '</strong> => thành tiền: <strong>'+numberToCurrency(data.price*quantity,0,'.',',') + '</strong> <sup>đ</sup>');
					}
			        // console.log(data);
			        // console.log(quantity);
			    }
			});
	            return false;
		}
	})


	$('#register_product_id').on('change', function() {
		var url = $(this).data('url');
		var idPro =  $(this).val();
		$.ajax({
		    url: url,
		    type: 'POST',
		    dataType: 'JSON',
		    data: {
		        idPro: idPro,
		    },
		    success: function(data) {
		    	var html = '';
		    	var form_price = $('#form_price');
		    	var register_quantity = $('#register_quantity');
		    	var registerQuantity = $('#register-quantity');
		    	if (parseInt(data.id) != 1 && data.price_f != null){
		    		form_price.css('display', 'block');
		    		register_quantity.css('display', 'block');
		    		form_price.children('.register_price').html('<strong>'+data.price_f + '</strong> => thành tiền: <strong>'+numberToCurrency(data.price*registerQuantity.val(),0,'.',',') + '</strong> <sup>đ</sup>');
		    	}
		    	if (data.id==1 || data.id === undefined) {
		    		register_quantity.css('display', 'none');
		    		$('#form_price').css('display', 'none');
		    	}
		     // console.log(data.id);
		     // console.log(registerQuantity.val());
		    }
		});
            return false;
    });
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