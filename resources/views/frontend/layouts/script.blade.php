<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // add into cart
        $('.shopping-cart-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                method: 'POST',
                data: formData,
                url: "{{ route('add-to-cart') }}",
                success: function(data) {
                    if(data.status === 'success'){

                        $('#cart-count').removeClass('d-none');
                        getCartCount();
                        fetchCartProduct();
                        $('.mini_cart_actions').removeClass('d-none');
                        toastr.success(data.message)
                    }else if(data.status === 'stock_limit'){
                        toastr.warning(data.message);
                    }
                },
                error: function(data) {

                }
            })
        })

        // get cart count

        function getCartCount() {
            $.ajax({
                method: 'GET',
                url: "{{ route('cart-count') }}",
                success: function(data) {
                    $('#cart-count').text(data);
                },
                error: function(data) {

                }
            })
        }

        function fetchCartProduct() {
            $.ajax({
                method: 'GET',
                url: "{{ route('fetch-cart') }}",
                success: function(data) {
                    $('#mini-cart-wrapper').html("");
                    var html = '';
                    for (let item in data) {
                        let product = data[item];
                            html += `<li id="mini-cart_${product.rowId}">
                                    <div class="wsus__cart_img">
                                        <a href="{{url('product-detail')}}/${product.options.slug}"><img src="{{asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH'))}}/${product.options.image}" alt="product" class="img-fluid w-100"></a>
                                        <a class="wsis__del_icon remove_product" data-rowid="${product.rowId}" href="#"><i class="fas fa-minus-circle"></i></a>
                                    </div>
                                    <div class="wsus__cart_text">
                                       <a class="wsus__cart_title" href="{{url('product-detail')}}/${product.options.slug}">${product.name}</a>
                                       <p>{{$settings->currency_icon}} ${product.price}  <small style="padding-left: 40px">Qty : ${product.qty}</small></p>
                                        <small>Variants Total : {{$settings->currency_icon}}${product.options.variants_total}</small>
                                    </div>
                                   </li>`
                    }
                    $('#mini-cart-wrapper').html(html);
                    getSidebarCartTotal();
                },
                error: function(data) {

                }
            })
        }

        $('body').on('click' , '.remove_product' , function(e){
            e.preventDefault();
            let rowId = $(this).data('rowid');

            $.ajax({
                method: 'POST',
                url: "{{ route('remove-cart-product') }}",
                data:{
                    rowId: rowId
                },
                success: function(data) {
                    getCartCount();
                    getSidebarCartTotal();
                   let productId = '#mini-cart_'+rowId;
                   $(productId).remove()
                   if($('#mini-cart-wrapper').find('li').length === 0){
                    $('#cart-count').addClass('d-none');
                    $('.mini_cart_actions').addClass('d-none');
                    $('#mini-cart-wrapper').html('<li><p style="text-align:center">Cart is empty!</p></li>')
                   }
                },
                error: function(data) {
                    console.log(data);
                }
            })
        })

        // get sidebar cart subtotal
        function getSidebarCartTotal(){
            $.ajax({
                method: 'GET',
                url: "{{ route('cart.sidebar-product-total') }}",
                success: function(data) {
                    $('#mini_cart_subtotal').text("{{$settings->currency_icon}}"+data)
                },
                error: function(data) {

                }
            })
        }

    })
</script>
