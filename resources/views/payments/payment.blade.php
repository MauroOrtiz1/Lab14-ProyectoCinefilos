@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('subirCliente', ['id' => $pelicula->id]) }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <h4 class="mb-3">Subir Cliente</h4>
        <div class="row g-3">
            <div class="col-sm-6">
              <label class="form-label">Nombre:</label>
              <input type="text" class="form-control" name="nombre" placeholder="Ingresar Nombre" required>
              <div class="invalid-feedback">
                Se requiere un nombre válido.
              </div>
            </div>

            <div class="col-sm-6">
              <label class="form-label">Apellido:</label>
              <input type="text" class="form-control" name="apellido" placeholder="Ingresar Apellido" required>
              <div class="invalid-feedback">
                Se requiere un apellido válido.
              </div>
            </div>

            <div class="col-sm-6">
            <label class="form-label">DNI:</label>
              <input type="text" class="form-control" name="dni" placeholder="Ingresar DNI" required>
              <div class="invalid-feedback">
                Se requiere un DNI válido.
              </div>
            </div>

            <div class="col-sm-6">
                <label class="form-label">Fecha de Nacimiento <span class="text-muted">(Obligatorio):</span></label>
                <input type="date" class="form-control" name="fecha_nacimiento" placeholder="dd/mm/aaaa" required>
                <div class="invalid-feedback">
                    Por favor, ingrese una fecha de nacimiento válida.
                </div>
            </div>

            <div class="col-sm-6">
              <label class="form-label">Email <span class="text-muted">(Obrigatorio):</span></label>
              <input type="email" class="form-control" name="email" placeholder="example@gmail.com" required>
              <div class="invalid-feedback">
                Por favor, ingrese una dirección de correo electrónico válida
              </div>
            </div>

            <div class="col-sm-6">
                <label class="form-label">Celular:</label>
                <input type="text" class="form-control" name="celular" placeholder="Ingresar celular" required>
                <div class="invalid-feedback">
                    Por favor, ingrese un número de celular válido.
                </div>
            </div>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Registrar</button>
    </form>
</div>
<br>
<div class="container">
        <!-- Agrega el contenedor con el ID 'paypal-button-container' -->
        <div id="paypal-button-container"></div>

        <!-- Incluye la biblioteca de PayPal -->
        <script src="https://www.paypal.com/sdk/js?client-id=Ab6DjbvVBBuBe3kx-TzswrZMpww5_4TIEWxaR-V2QWJYlUFtAdUf4Y94RQlpT8fiB71NBIEpq5uPOAHv&components=buttons,funding-eligibility&locale=es_PE" currency="USD"></script>

        <!-- Agrega tu código JavaScript -->
        <script>

            paypal.Buttons({
                fundingSources: paypal.FUNDING.CARD,
                createOrder: function(data, actions) {
                    return actions.order.create({
                        application_context: {
                            shipping_preference: "NO_SHIPPING"
                        },
                        payer: {
                            email_address: 'prueba@email.com',
                            name: {
                                given_name: 'prueba',
                                surname: 'prueba'
                            },
                            address: {
                                country_code: "PE"
                            }
                        },
                        purchase_units: [{
                            amount: {
                                value: 16.99
                            }
                        }],
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(details) {
                        alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    });
                },
                onError: function (err) {
                    // For example, redirect to a specific error page
                    window.location.href = "/your-error-page-here";
                }
            }).render('#paypal-button-container');
        </script>
    </div>
@endsection