@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar soci</div>

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

                    <form action="{{ route('socis.update',$soci->Codi) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="Codi">Codi:</label>
                                <input type="text" name="Codi" value="{{ $soci->Codi }}" class="form-control" placeholder="Codi de Soci">
                            </div>
                            <div class="col-md-6">
                                <label for="DNI">DNI:</label>
                                <input type="text" name="DNI" value="{{ $soci->DNI }}" class="form-control" placeholder="DNI">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="Nom">Nom:</label>
                                <input type="text" name="Nom" value="{{ $soci->Nom }}" class="form-control" placeholder="Nom">
                            </div>
                            <div class="col-md-6">
                                <label for="Cognoms">Apellidos:</label>
                                <input type="text" name="Cognoms" value="{{ $soci->Cognoms }}" class="form-control" placeholder="Cognoms">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="Poblacio">Població / Codi Postal:</label>
                                <div class="input-group">
                                    <input type="text" name="Poblacio" value="{{ $soci->Poblacio }}" class="form-control" placeholder="Població">
                                    <input type="text" name="CodiPostal" value="{{ $soci->CodiPostal }}" class="form-control" placeholder="Codi Postal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="Telefon">Telèfon / Mòbil:</label>
                                <input type="text" name="Telefon" value="{{ $soci->Telefon }}" class="form-control" placeholder="Telèfon o Mòbil">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Adreca">Domicili:</label>
                            <input type="text" name="Adreca" value="{{ $soci->Adreca }}" class="form-control" placeholder="Domicili o Adreça">
                        </div>

                        <div class="form-group">
                            <label for="MetodeDePagament">Mètode de Pagament:</label>
                            <select name="MetodeDePagament" class="form-control">
                                <option value="Targeta" {{ $soci->MetodeDePagament == 'Targeta' ? 'selected' : '' }}>Targeta</option>
                                <option value="En Efectiu" {{ $soci->MetodeDePagament == 'En Efectiu' ? 'selected' : '' }}>En Efectiu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="IBAN" value="{{ $soci->IBAN }}" class="form-control" placeholder="IBAN">
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
            } 
            else {
                ibanInput.style.display = 'block';
            }

            if (metodoDePago.value === 'Targeta') {
                ibanInput.value = ibanInput.value = '{{ $soci->IBAN }}' 
            }
        });

        // Ejecutar una vez al cargar la página para asegurarse de que el estado coincida con el valor predeterminado
        if (metodoDePago.value === 'En Efectiu') {
            ibanInput.style.display = 'none';
            ibanInput.value = '';
        }

        if (metodoDePago.value === 'Targeta') {
            ibanInput.value = ibanInput.value = '{{ $soci->IBAN }}' 
        }
    });
</script>
@endsection
