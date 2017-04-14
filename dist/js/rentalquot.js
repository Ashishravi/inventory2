//adds extra table rows
var i_type = "Item";
var i=$('#table_auto tr').length;
$(".addmore").on('click',function(){
	html = '<tr>';
	html += '<td><input class="case" type="checkbox"/></td>';
    html += ' <td><select id="type_'+i+'" name="item_type[]" class="itemType"><option value="Item">Item</option><option value="Bundle">Bundle</option></select></td>';
	html += '<td><input type="text" data-type="productCode" name="itemNo[]" id="itemNo_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input type="text" data-type="productName" name="itemName[]" id="itemName_'+i+'" class="form-control autocomplete_txt" autocomplete="off"></td>';
	html += '<td><input type="text" name="price[]" id="price_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
     html += '<td><input type="number" name="duration[]" id="duration_'+i+'" class="form-control" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
    html+= ' <td><select id="unit_dur_'+i+'" name="unit_dur[]"><option value="Days">Days</option><option value="Weeks">Weeks</option><option value="Months">Months</option><option value="Years">Years</option></select></td>';
   html += '<td><input type="text" name="quantity[]" id="quantity_'+i+'" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input type="text" name="total[]" id="total_'+i+'" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '</tr>';
	$('#table_auto').append(html);
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
	calculateTotalRent();
});

$('.itemType').change(function() {
i_type= $(this).find(':selected').attr('value');

});

//autocomplete script
$(document).on('focus','.autocomplete_txt',function(){
	type = $(this).data('type');
	if(type =='productCode' )autoTypeNo=0;
	if(type =='productName' )autoTypeNo=1;
   /* console.log(i_type);*/
	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax.php',
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term,
				   type: type,
                   i_type: i_type 
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
					 	var code = item.split("|");
						return {
							label: code[autoTypeNo],
							value: code[autoTypeNo],
							data : item
						}
					}));
				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		appendTo: "#modal-fullscreen",
		select: function( event, ui ) {
			var names = ui.item.data.split("|");
			id_arr = $(this).attr('id');
	  		id = id_arr.split("_");
	  		console.log(names, id);
	  		
			$('#itemNo_'+id[1]).val(names[0]);
			$('#itemName_'+id[1]).val(names[1]);
			$('#quantity_'+id[1]).val(1);
			$('#price_'+id[1]).val(names[2]);
			$('#total_'+id[1]).val( 1*names[2] );
			calculateTotalRent();
		}		      	
	});
});

//price change
$(document).on('change keyup blur','.changesNo',function(){
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	quantity = $('#quantity_'+id[1]).val();
	price = $('#price_'+id[1]).val();
    duration = $('#duration_'+id[1]).val();
	if( quantity!='' && price !='' && duration !='' ) $('#total_'+id[1]).val( (parseFloat(price)*parseFloat(quantity)*parseFloat(duration)).toFixed(2) );	
	calculateTotalRent();
});



$(document).on('change keyup blur','#freight',function(){
	calculateTotalRent();
});

//total price calculation 
function calculateTotalRent(){
	subTotal = 0 ; total = 0; subTotalFreight = 0;
	$('.totalLinePrice').each(function(){
		if($(this).val() != '' )subTotal += parseFloat( $(this).val() );
	});
	$('#subTotal').val( subTotal.toFixed(2) );
	freight = parseFloat( $('#freight').val() );
    if(freight != '' && typeof(freight) != "undefined" ){
    subTotalFreight = subTotal + freight; 
        $('#sub_total_freight').val(subTotalFreight.toFixed(2));
        taxRate = 0.14;
        kkcRate = 0.005;
        swachBharat = 0.005;
        
        console.log((subTotalFreight*taxRate).toFixed(2));
        console.log((subTotalFreight*kkcRate).toFixed(2));
     $('#tax').val( (subTotalFreight*taxRate).toFixed(2) );
     $('#swach_bharat').val( (subTotalFreight*swachBharat).toFixed(2) );
      $('#kkc').val( (subTotalFreight*kkcRate).toFixed(2) );   
	  
        total = subTotalFreight + (subTotalFreight*taxRate) + (subTotalFreight*swachBharat) + (subTotalFreight*kkcRate) ;
    
	   $('#totalAftertax').val( total.toFixed(2) );
    }else{
        
    }
        
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