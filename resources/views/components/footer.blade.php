<footer class="bg-dark text-center text-white" id="footer">
    <div class="container p-4">
        <!-- Section: Social media -->
        <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>
            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-google"></i></a>
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-instagram"></i></a>
            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
        </section>

        <!-- Section: Form -->
        <section>
            <form action="">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-auto">
                        <p class="pt-2">
                            <strong>Correo Electrónico</strong>
                        </p>
                    </div>
                    <div class="col-md-5 col-12">
                        <!-- Email input -->
                        <div class="form-outline form-white mb-4">
                            <input type="email" id="form5Example21" class="form-control" />
                            <label class="form-label" for="form5Example21">Subscribete a nuestro boletín</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <!-- Boton Subscribe -->
                        <button type="submit" class="btn btn-outline-light mb-4">
                            Subscribe
                        </button>
                    </div>
                </div>
            </form>
        </section>

        <section>
            <!-- Terminos y condiciones de compra -->
            <a class="link-light" href="#!" role="button">Términos y condiciones de compra</a>
            <span class="separator"> • </span>
            <!-- Politica de privacidad -->
            <a class="link-light" href="#!" role="button">Política de privacidad</a>
            <span class="separator"> • </span>
            <!-- Politica de cookies -->
            <a class="link-light" href="#!" role="button">Política de cookies</a>
        </section>
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2025 Copyright:
        <a class="text-white" href="{{ route('products.productosIndex') }}">GranaShop.es</a>
    </div>
    <!-- Copyright -->
</footer>