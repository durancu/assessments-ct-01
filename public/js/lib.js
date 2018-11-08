$(document).ready(function(){
    $('#add_product_btn').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "/products",
            method: 'post',
            data: {
                name: jQuery('#name').val(),
                quantity: jQuery('#quantity').val(),
                price: jQuery('#price').val()
            },
            success: function(product){
                //response = JSON.parse(response);

                $("#products_table tbody").append(
                    "<tr>"
                    +"<td>"+product.name+"</td>"
                    +"<td>"+product.quantity+"</td>"
                    +"<td>"+product.price+"</td>"
                    +"<td>"+product.datetime+"</td>"
                    +"<td>"+product.total_value+"</td>"
                    +"</tr>" )
            }});
    });
});