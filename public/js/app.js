// data table
let table = new DataTable('#myTable');

$("#myTable").on("click", ".click_category", function(){
    var tr = jQuery(this).parent().parent();
    var data_category = tr.find('.data-category').val();
    var data_id      = tr.find('.data-id').val();
    $('#inputcategory').val(data_category); 
    $('#categoryid').val(data_id); 
});

$("#myTable").on("click", ".data-delete", function(){
    var tr = jQuery(this).parent().parent();
    var data_id         = tr.find('.data-id').val();
    $('#datafeature_id').val(data_id);
});
