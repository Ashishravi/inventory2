


//adds extra table rows
var i=$('table tr').length;
$(".addmore").on('click',function(){
	html = '<tr>';
	html += '<td><input class="case" type="checkbox"/></td>';
	html += '<td><select id="type_'+i+'" name="type[]"><option value="Item">Item</option><option value="Bundle">Bundle</option></select></td>';
    html += '<td><input type="text" data-type="productName" name="item_description[]" id="item_description_'+i+'" class="autocomplete_txt" placeholder="Description" autocomplete="off"></td>';
    html += ' <td><input type="number" step="any" name="unit_price[]" id="unit_price_'+i+'" autocomplete="off" placeholder="Unit Price" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
	html += '<td><input type="number" step="any" name="qty[]" id="qty_'+i+'" autocomplete="off" placeholder="Quantity"  onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
    html += '<td><select id="unit_days_'+i+'" name="unit_days[]" autocomplete="off"><option value="Days">Days</option><option value="Weeks">Weeks</option><option value="Months">Months</option></select></td>';
    html += '<td><input type="text" name="duration[]" id="duration_'+i+'" placeholder="Duration" autocomplete="off" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" step="any"></td>';
    html += '<td><input type="number"  step="any" name="total_price[]" id="total_price_'+i+'" placeholder="Total Price"  class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>';
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

$(document).on('change keyup blur','.total_price',function(){
	calculateTotal();
});