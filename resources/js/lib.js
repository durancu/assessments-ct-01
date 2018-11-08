$(document).ready(function(){
    $('#add_product_btn').click(function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        jQuery.ajax({
            url: "{{ url('/products') }}",
            method: 'post',
            data: {
                name: jQuery('#name').val(),
                quantity: jQuery('#quantity').val(),
                price: jQuery('#price').val()
            },
            success: function(response){
                //response = JSON.parse(response);
                $.each(response, function(i, product) {
                    var $tr = $('<tr>').append(
                        $('td').text(product.name),
                        $('td').text(product.quantity),
                        $('td').text(product.price),
                        $('td').text(product.datetime),
                        $('td').text(product.total_value)
                    );
                    console.log($tr.wrap('<p>').html());
                });
            }});
    });
});