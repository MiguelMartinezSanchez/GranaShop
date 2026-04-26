<x-plantilla>
    <x-slot name="titulo">GranaShop | Detalles carrito</x-slot>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="cart_section mt-4 mb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Productos seleccionados<small> (<span id="cantidadArticulos">0</span> articulo/s en tu carrito) </small></div>
                        <div class="cart_items ">
                            <!-- ITEMS CONFIRMADOS -->
                            <ul class="cart_list list-unstyled">

                            </ul>
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Precio Total:</div>
                                <div class="order_total_amount"><span id="precioPedido">0</span> €</div>
                            </div>
                        </div>
                        <div class="inlineimage"> 
                            <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Mastercard-Curved.png"> 
                            <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Discover-Curved.png"> 
                            <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/Paypal-Curved.png"> 
                            <img class="img-responsive images" src="https://cdn0.iconfinder.com/data/icons/credit-card-debit-card-payment-PNG/128/American-Express-Curved.png">
                            <button type="button" class="confirmar cart_button_checkout">Realizar pedido</button>
                            <button type="button" class="borrar cart_button_checkout bg-danger rounded"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-plantilla>