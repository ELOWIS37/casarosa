@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 my-auto">
            <div class="card">
                <div class="card-header">Socis CasaRosa</div>
                <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <form action="{{ route('socis.index') }}" method="GET" class="form-inline">
                            <div class="form-group mr-2">
                                <label for="ordenar_per" class="mr-2">Ordenar per:</label>
                                <select name="ordenar_per" class="form-control">
                                    <option value="Codi" {{ request('ordenar_per') == 'Codi' ? 'selected' : '' }}>Codi</option>
                                    <option value="Cognoms" {{ request('ordenar_per') == 'Cognoms' ? 'selected' : '' }}>Cognoms</option>
                                    <option value="Nom" {{ request('ordenar_per') == 'Nom' ? 'selected' : '' }}>Nom</option>
                                </select>
                            </div>
                            <label class="mr-2">Cercar:</label>
                            <div class="form-group mr-2">
                                <input type="text" name="codi_search" class="form-control" placeholder="Codi" value="{{ request('codi_search') }}" style="width: 70px;">
                                <input type="text" name="cognoms_search" class="form-control" placeholder="Cognoms" value="{{ request('cognoms_search') }}" style="width: 130px;">
                            </div>
                            <button type="submit" class="btn btn-primary">Ordenar/Cercar</button>
                        </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <h5 class="mb-0">Socis Totals: {{ count($socis) }}</h5>
                    </div>
                </div>


                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <div class="table-responsive">
                        @if($socis->count() > 0)
                        <table class="table table-bordered table-striped" id="socisTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%" class="text-left">Codi</th>
                                    <th style="width: 20%" class="text-left">Cognoms</th>
                                    <th style="width: 10%" class="text-left">Nom</th>
                                    <th style="width: 7%" class="text-left">DNI</th>
                                    <th style="width: 10%" class="text-left">Població</th>
                                    <th style="width: 5%" class="text-left">C.Postal</th>
                                    <th style="width: 20%" class="text-left">Adreça</th>
                                    <th style="width: 7%" class="text-left">Telèfon</th>
                                    <th style="width: 15%" class="text-left">IBAN</th>
                                    <th style="width: 10%" class="text-left">Pagament</th>
                                    <th style="width: 10%" class="text-left">Acció</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($socis as $soci)
                                <tr>
                                    <td class="text-left">{{ $soci->Codi }}</td>
                                    <td class="text-left">{{ $soci->Cognoms }}</td>
                                    <td class="text-left">{{ $soci->Nom }}</td>
                                    <td class="text-left">{{ $soci->DNI }}</td>
                                    <td class="text-left">{{ $soci->Poblacio }}</td>
                                    <td class="text-left">{{ $soci->CodiPostal }}</td>
                                    <td class="text-left">{{ $soci->Adreca }}</td>
                                    <td class="text-left">{{ $soci->Telefon }}</td>
                                    <td class="text-left">{{ $soci->IBAN }}</td>
                                    <td class="text-left">{{ $soci->MetodeDePagament }}</td>
                                    <td class="text-left"> 
                                        <form action="{{ route('socis.destroy', $soci->Codi) }}" method="POST">
                                            <a class="btn btn-primary btn-sm" href="{{ route('socis.edit', $soci->Codi) }}">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                        <p> No s'han trobat socis </p>
                    @endif
                </div>
            </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    function printTable() {
        var printWindow = window.open('', '_blank');
        printWindow.document.write('<html><head><title>Tabla de Socis</title>');
        printWindow.document.write('<style>th { text-align: left; } th:nth-last-child(2), td:nth-last-child(2), th:last-child, td:last-child { display: none; } table { border-collapse: collapse; width: 100%; } table, th, td { border: 1px solid black; padding: 8px; } th, td { text-align: left; }</style>'); // Alinea los títulos de las columnas a la izquierda y oculta las dos últimas columnas en la vista de impresión
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h2>Llistat de Socis</h2>');
        printWindow.document.write(document.getElementById('socisTable').outerHTML);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();

        // Cerrar la ventana de impresión después de la impresión o el cancelar la impresión
        setTimeout(function() {
            printWindow.close();
        }, 50);
    }
</script>
@endsection
