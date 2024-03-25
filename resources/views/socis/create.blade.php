@extends('layouts.app')

@section('content')
    <div id="alert-container"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear nou soci</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Error!</strong> Per favor, completa tots els camps.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('socis.store') }}" method="POST">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="Codi">Codi:</label>
                                    <input type="text" name="Codi" class="form-control" placeholder="Codi">
                                </div>
                                <div class="col-md-6">
                                    <label for="DNI">DNI:</label>
                                    <input type="text" name="DNI" class="form-control" placeholder="DNI">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="Nom">Nom:</label>
                                    <input type="text" name="Nom" class="form-control" placeholder="Nom">
                                </div>
                                <div class="col-md-6">
                                    <label for="Cognoms">Cognoms:</label>
                                    <input type="text" name="Cognoms" class="form-control" placeholder="Cognoms">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="Poblacio">Població / Codi Postal:</label>
                                    <div class="input-group">
                                        <input type="text" name="Poblacio" class="form-control" placeholder="Població">
                                        <input type="text" name="CodiPostal" class="form-control" placeholder="Codi Postal">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="Telefon">Telèfon / Mòbil:</label>
                                    <input type="text" name="Telefon" class="form-control" placeholder="Telèfon o Mòbil">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="Adreca">Domicili:</label>
                                <input type="text" name="Adreca" class="form-control" placeholder="Domicili o Adreça">
                            </div>

                            <div class="form-group">
                                <label for="MetodeDePagament">Mètode de Pagament:</label>
                                <select name="MetodeDePagament" class="form-control">
                                    <option value="Targeta">Targeta</option>
                                    <option value="En Efectiu">En Efectiu</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text" name="IBAN" class="form-control" placeholder="IBAN">
                            </div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var metodoDePago = document.querySelector('select[name="MetodeDePagament"]');
            var ibanInput = document.querySelector('input[name="IBAN"]');

            metodoDePago.addEventListener('change', function () {
                if (metodoDePago.value === 'En Efectiu') {
                    ibanInput.style.display = 'none';
                    ibanInput.value = '';
                } else {
                    ibanInput.style.display = 'block';
                }
            });

            // Ejecutar una vez al cargar la página para asegurarse de que el estado coincida con el valor predeterminado
            if (metodoDePago.value === 'En Efectiu') {
                ibanInput.style.display = 'none';
                ibanInput.value = '';
            } else {
                ibanInput.style.display = 'block';
            }
        });
    </script>

    <script>
        function printTable() {
            var alertHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
            alertHTML += '<strong>Error:</strong> Només es pot imprimir des de la pàgina "Socis CasaRosa".';
            alertHTML += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            alertHTML += '<span aria-hidden="true">&times;</span>';
            alertHTML += '</button>';
            alertHTML += '</div>';
            document.getElementById('alert-container').innerHTML = alertHTML;
        }
    </script>
@endsection
