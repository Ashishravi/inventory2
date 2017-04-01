


//adds extra table rows
var i=$('table tr').length;
$(".addmore").on('click',function(){
	html = '<tr>';
	html += '<td><input class="case" type="checkbox"/></td>';
	html += '<td><select><option value="Item" id="type" name="type[]">Item</option><option value="Bundle">Bundle</option></select></td>';
    html += '<td><input type="text" name="item_description[]" id="item_description_'+i+'" class="autocomplete_txt" placeholder="Description"></td>';
    html += '<td><input type="text" name="unit_price[]" id="unit_price" placeholder="Unit Price"></td>';
	html += '<td><input type="text" name="qty[]" id="qty" placeholder="Quantity"></td>';
    html += '<td><select id="unit_days" name="unit_days[]"><option value="Days">Days</option><option value="Weeks">Weeks</option><option value="Months">Months</option></select></td>';
    html += '<td><input type="text" name="duration[]" id="duration" placeholder="Duration"></td>';
    html += '<td><input type="number" name="total_price[]" placeholder="Total Price"></td>';
	html += '</tr>';
	$('table').append(html);
	i++;
});

//to check all checkboxes
$(document).on('change','#check_all',function(){
	$('input[class=case]:checkbox').prop("checked", $(this).is(':checked'));
});

//deletes the selected table rows
$(".delete").on('click', function() {
	$('.case:checkbox:checked').parents("tr").remove();
	$('#check_all').prop("checked", false); 
	calculateTotal();
});


/*
$(document).on('focus','.autocomplete_txt',function(){	
    var i_type;
    if(document.getElementById('type').options.value=="Item") {
        i_type = "table_item"
}else if(document.getElementById('type').options.value=="Bundle") {
  //Non Nabh radio button is checked
    i_type = "table_bundle"
}
    else{
        alert("Please select Item Type");
    }
    
	
	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'getItem.php',
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term,
                   i_type: i_type
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
					 	var code = item.split();
						return {
							label: code[0],
							value: code[0],
							data : item
						}
                
					}));
				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		select: function( event, ui ) {
			var names = ui.item.data.split();						
			id_arr = $(this).attr('id');
	  		id = id_arr.split("_");
			$('#item_description_'+id[1]).val(names[0]);
			
			calculateTotal();
		}		      	
	});
});


//recalcuclte total price on line price change
$(document).on('change keyup blur','.totalLinePrice',function(){
	calculateTotal();
});

//price change
$(document).on('change keyup blur','.changesNo',function(){
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	quantity = $('#quantity_'+id[1]).val();
	price = $('#price_'+id[1]).val();
	if( quantity!='' && price !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)).toFixed(2) );	
	calculateTotal();
});

$(document).on('change keyup blur','#tax',function(){
	calculateTotal();
});

//total price calculation 
function calculateTotal(){
	subTotal = 0 ; total = 0; 
	$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#subTotal').val( subTotal.toFixed(2) );
}



//It restrict the non-numbers
var specialKeys = new Array();
specialKeys.push(8,46); //Backspace
function IsNumeric(e) {
    var keyCode = e.which ? e.which : e.keyCode;
    console.log( keyCode );
    var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
    return ret;
}

//datepicker
$(function () {
    $('#invoiceDate').datepicker({});
});
*/
