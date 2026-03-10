
//--------------------  Transiciones de CARDS de Categorias en Inicio
let animadoLeft = document.querySelectorAll("#animado");
function mostrarScroll() {
    let scrollTop = document.documentElement.scrollTop;
    for (var i = 0; i < animadoLeft.length; i++) { //Recorrer elementos de la variable animado
        let alturaAnimado = animadoLeft[i].offsetTop;
        if (alturaAnimado - 1200 < scrollTop) {
            animadoLeft[i].style.opacity = 1;
            animadoLeft[i].classList.add("animacion");
        }
    }
}
window.addEventListener('scroll', mostrarScroll);

//----------------------- CARRITO DE COMPRA MENU NAVEGACION
//Array productos
var productos = new Array;

//----------------------------CARRITO COMPRA VACIO
function carroVacio() {
    var productosDelCarro = document.querySelectorAll('#productoCarro');
    if (productosDelCarro.length >= 1) {
        var textoVacio = document.getElementById('carroVacio');
        textoVacio.setAttribute('style', 'display: none;');
    }
} 

window.onload = function () {
    const miLocalStorage = window.localStorage;
    cargarCarritoDeLocalStorage();
    confirmarProductos();

    //----------------------------Evento a boton vaciar todo el carrito
    const botonVaciar = document.querySelector('#boton-vaciar');
    botonVaciar.addEventListener('click', vaciarCarrito);

    //----------------------------Borrar el producto clickado
    const borrarProducto = document.getElementById('carrito');
    borrarProducto.addEventListener('click', eliminarProducto);

    //----------------------------Añadir evento a boton de Añadir al carrito y agregar producto
    if (document.querySelector(".storeItem")) {
        const boton = document.querySelector(".storeItem");
        boton.addEventListener('click', anadirProducto);
    }


    function anadirProducto() {
        //----------------------------Datos del producto para mostrar en el carrito
        const nombre = document.querySelector('.nombre');
        const precio = document.querySelector('.precio');
        const foto = document.querySelector('.imgSingleProduct').src;

        const carrito = document.querySelector('#lista-carrito tbody');
        const contenedorProducto = document.createElement('tr');
        contenedorProducto.setAttribute('id', 'productoCarro');

        contenedorProducto.innerHTML = `
            <td>
                <img src="${foto}" width=100>
            </td>
            <td>${nombre.textContent}</td>
            <td>${precio.textContent}</td>
            <td>
                <a href="#" class="borrar-producto fas fa-times-circle"></a>
            </td>
        `;
        carrito.appendChild(contenedorProducto);

        productos.push({ foto: foto, nombre: nombre.textContent, precio: precio.textContent });
        guardarCarritoEnLocalStorage(productos);
        carroVacio();
    }

    //----------------------------Eliminar producto de forma individual
    function eliminarProducto(e) {
        e.preventDefault();
        if (e.target.classList.contains('borrar-producto')) {
            e.target.parentElement.parentElement.remove();
        }
        carroVacio();
    }

    //----------------------------Eliminar todos los productos del carrito
    function vaciarCarrito() {
        var itemsCarro = document.querySelectorAll('#productoCarro');
        for (let i = 0; i < itemsCarro.length; i++) {
            itemsCarro[i].remove();
        }
        //---------------------------- Borra LocalStorage
        localStorage.clear();
        productos = [];
        location.reload();
        carroVacio();
    }

    const borrar2 = document.querySelector('.borrar');
    borrar2.addEventListener('click', vaciarCarrito);

    //---------------------------- LocalStorage
    function guardarCarritoEnLocalStorage(productos) {
        miLocalStorage.setItem('carrito', JSON.stringify(productos));
    }

    function cargarCarritoDeLocalStorage() {
        //---------------------------- Carga la información
        if (JSON.parse(miLocalStorage.getItem('carrito')) != null) {
            productos = JSON.parse(miLocalStorage.getItem('carrito'));

            for (let i = 0; i < productos.length; i++) {
                const carrito = document.querySelector('#lista-carrito tbody');
                const contenedorProducto = document.createElement('tr');
                contenedorProducto.setAttribute('id', 'productoCarro');

                contenedorProducto.innerHTML = `
            <td>
                <img src="${productos[i].foto}" width=100>
            </td>
            <td>${productos[i].nombre}</td>
            <td>${productos[i].precio}</td>
            <td>
                <a href="#" class="borrar-producto fas fa-times-circle"></a>
            </td>
        `;
                carrito.appendChild(contenedorProducto);
            }
        }
        carroVacio();
    }

    //--------------------- CONFIRMAR PRODUCTOS EN LA VISTA pantallaCompra

    function calcularTotalPedido() {
        var importeTotal = 0;
        for (let i = 0; i < productos.length; i++) {

            importeTotal += parseInt(productos[i].precio);

        }
        return importeTotal;
    }

    function confirmarProductos() {
        if (document.getElementById('precioPedido') != null) {
            for (let i = 0; i < productos.length; i++) {
                const listado = document.querySelector('.cart_list');

                const contenedorProducto = document.createElement('li');
                contenedorProducto.setAttribute('class', 'cart_item clearfix');

                contenedorProducto.innerHTML = `
            <div class="cart_item_image"><img src="${productos[i].foto}" alt=""></div>
                <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                <div class="cart_item_name cart_info_col">
                    <div class="cart_item_title">Nombre</div>
                    <div>${productos[i].nombre}</div>
                </div>
                <div class="cart_item_quantity cart_info_col">
                    <div class="cart_item_title">Quantity</div>
                    <div>1</div>
                </div>
                <div class="cart_item_total cart_info_col">
                    <div class="cart_item_title">Total</div>
                    <div><span id="precio">${productos[i].precio}</span>€</div>
                </div>
            </div>
            `;
                document.getElementById('precioPedido').textContent = calcularTotalPedido();
                document.getElementById('cantidadArticulos').textContent = productos.length;
                listado.appendChild(contenedorProducto);

            }
        }

    }

}

