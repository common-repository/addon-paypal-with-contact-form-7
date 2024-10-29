jQuery( document ).ready(function() {
	jQuery('input[name="amount_choice"]').change(function(){
		var value = jQuery( 'input[name="amount_choice"]:checked' ).val();
		if(value == "custom") {
			jQuery('input[name="amount"]').css('display','block');
			jQuery('input[name="fieldamount"]').css('display','none');
		} else {
			jQuery('input[name="amount"]').css('display','none');
			jQuery('input[name="fieldamount"]').css('display','block');
		}
	});


	var value = jQuery( 'input[name="amount_choice"]:checked' ).val();
	if(value == "custom") {
		jQuery('input[name="amount"]').css('display','block');
		jQuery('input[name="fieldamount"]').css('display','none');
	} else {
		jQuery('input[name="amount"]').css('display','none');
		jQuery('input[name="fieldamount"]').css('display','block');
	}


	var qty_choice = jQuery( 'input[name="qty_choice"]:checked' ).val();
	if(qty_choice == "custom") {
		jQuery('input[name="quantity"]').css('display','block');
		jQuery('input[name="fieldquantity"]').css('display','none');
	} else {
		jQuery('input[name="quantity"]').css('display','none');
		jQuery('input[name="fieldquantity"]').css('display','block');
	}


	jQuery('input[name="qty_choice"]').change(function() {
		var qty_choice = jQuery( 'input[name="qty_choice"]:checked' ).val();
		if(qty_choice == "custom") {
			jQuery('input[name="quantity"]').css('display','block');
			jQuery('input[name="fieldquantity"]').css('display','none');
		} else {
			jQuery('input[name="quantity"]').css('display','none');
			jQuery('input[name="fieldquantity"]').css('display','block');
		}
	});



    jQuery('body').on('click','.addcolumn',function(){
    	//jQuery(".ocscw_chart_tbl tr .first_col").after('<td><a class="addcolumn"><img src= " '+ ocscw_object_name + '/includes/images/plus.png"></a><a class="deletecolumn"><img src= " '+ ocscw_object_name + '/includes/images/delete.png"></a></td>');

        var td = jQuery(this).closest('td');
        var indexa = td.index();
        jQuery('.ococf7_tbl tr:first td:nth-child('+(indexa+1)+')').after('<td><a class="addcolumn"><img src= " '+ CF7WPAY_name.CF7WPAY_array_img + '/includes/images/plus-circular-button_1.png"></a><a class="deletecolumn"><img src= " '+ CF7WPAY_name.CF7WPAY_array_img + '/includes/image/minus.png"></a></td>');
        


        jQuery(".ococf7_tbl tr").not(':first').each(function(index){
            jQuery(this).find('td:nth-child('+(indexa+1)+')').after("<td><input type='text' name='dis[]'></td>");     
        });
        var total_row = cfway_count_row();
        var total_column = cfway_count_col();
        jQuery('input[name="totalrow"]').val(total_row);
        jQuery('input[name="totalcol"]').val(total_column);
    });


    function cfway_count_col(){
    	var colCount = 0;
	    jQuery('.ococf7_tbl tr:nth-child(1) td').each(function () {
	       	colCount++;
	    });
	    return colCount - 1;
    }


    function cfway_count_row(){
    	var rowCount = jQuery('.ococf7_tbl tr').length;
    	return rowCount - 1;
    }


    jQuery("body").on('click', '.deletecolumn', function(){
        var td = jQuery(this).closest('td');
        var indexa = td.index();
        jQuery(this).closest('table').find('tr').each(function() {
            this.removeChild(this.cells[ indexa ]);
        });
        var total_row = cfway_count_row();
        var total_column = cfway_count_col();
        jQuery('input[name="totalrow"]').val(total_row);
        jQuery('input[name="totalcol"]').val(total_column);
        return false;
    });


    jQuery("body").on('click', '.deleterow', function(){
        jQuery(this).parent().parent().remove();
        var total_row = cfway_count_row();
        var total_column = cfway_count_col();
        jQuery('input[name="totalrow"]').val(total_row);
        jQuery('input[name="totalcol"]').val(total_column);
        return false;
    });
});