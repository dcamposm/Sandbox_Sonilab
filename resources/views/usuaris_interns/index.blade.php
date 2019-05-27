@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-between">
        <div class="col">
            <a href="{{ url('/usuaris/interns/crear') }}" class="btn btn-success mt-1">
                <span class="fas fa-user-plus"></span>
                CREAR USUARI
            </a>  
        </div>

        <!-- FILTRA USUARI -->
        <div class="row mt-1">
            <div class="col">
                <form method = "GET" action= '{{ route('usuariFind') }}' id='search'>
                    @csrf
                <div class="input-group">
                    <select class="custom-select" id='searchBy' name="searchBy" form="search">
                        <option value="nom_usuari">BUSCAR PER...</option>
                        <option value="nom_usuari">NOM</option>
                        <option value="cognom1_usuari">COGNOM</option>
                        <option value="id_departament" id="departament">DEPARTAMENT</option>
                        <option value="email_usuariÍndice">EMAIL</option>
                    </select>

                    <input type="text" id="search_term" class="form-control" name="search_term" placeholder="BUSCAR USUARI...">

                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default" type="button"><span class="fas fa-search"></span></button>
                    </span>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    {{-- TABLA D'USUARIS --}}
    <table class="table tableIndex mt-3" style="min-width: 800px;">
        <thead>
            <tr>
                <th>NOM</th> 
                <th>COGNOMS</th>
                <th>EMAIL</th>
                <th>DEPARTAMENT</th>
                <th>ACCIONS</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $arrayUsuaris as $key => $usuari )
            <tr>
                <td class="cursor" style="vertical-align: middle;" onclick="self.mostrarUsuari('{{ route('veureUsuariIntern', array('id' => $usuari->id_usuari)) }}')">
                    <span class="font-weight-bold">{{ $usuari->alias_usuari }}</span>
                </td>
                <td style="vertical-align: middle;">{{ $usuari->cognom1_usuari }} {{ $usuari->cognom2_usuari }}</td>
                <td style="vertical-align: middle;">{{ $usuari->email_usuari }}</td>
                <td style="vertical-align: middle;">{{ $usuari->departament->nom_departament }}</td>
                <td style="vertical-align: middle;">
                    <a href="{{ route('editarUsuariIntern', array('id' => $usuari['id_usuari'])) }}" class="btn btn-primary btn-sm"><span style="font-size: 11px;">MODIFICAR</span></a>
                    <button class="btn btn-danger btn-sm" onclick="self.setUsuariPerEsborrar({{ $usuari['id_usuari'] }}, '{{ $usuari['alias_usuari'] }}')" data-toggle="modal" data-target="#exampleModalCenter"><span style="font-size: 11px;">ESBORRAR</span></button>
                    <form id="delete-{{ $usuari['id_usuari'] }}" action="{{ route('esborrarUsuariIntern') }}" method="POST">
                        @csrf
                        <input type="hidden" readonly name="id" value="{{ $usuari['id_usuari'] }}">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

        <!-- MODAL ESBORRAR USUARI -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">ESBORRAR USUARI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="delete-message">Vols esborrar l'usuari </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="setUsuariPerEsborrar(0)">TANCAR</button>
                    <button type="button" class="btn btn-danger" onclick="deleteUsuari()">ESBORRAR</button>
                </div>
                </div>
            </div>
        </div>

    </div>
    @if (Route::currentRouteName() == "usuariFind")
        <a href="{{ url('/usuaris/interns/index') }}" class="btn btn-primary">
            <span class="fas fa-angle-double-left"></span>
            TORNAR
        </a> 
    @endif
</div>

<script>
    var usuariPerEsborrar = 0;

    self.mostrarUsuari = function (urlShow) {
        window.location.replace(urlShow);
    }

    function setUsuariPerEsborrar(userId, userAlias) {
        usuariPerEsborrar = userId;
        if (userAlias != undefined) {
            document.getElementById('delete-message').innerHTML = 'Vols esborrar l\'usuari <b>' + userAlias + '</b>?';
        }
    }

    function deleteUsuari() {
        if (usuariPerEsborrar != 0) {
            document.all["delete-" + usuariPerEsborrar].submit();
        }
    }
    //--------Funcions per el filtra-----------
    function selectSearch() {
        if ($('#searchBy').children(":selected").attr("id") == 'departament') {
             $('#search_term').remove();
        
            var select = document.createElement("select");
            $(select).attr("name", "search_term");
            $(select).attr("id", "search_term");
            $(select).attr("class", "form-control");

            var departaments = @json($departaments);

            $.each(departaments, function( key, departament ) {
                $(select).append('<option value="'+departament['id_departament']+'">'+departament['nom_departament'].toUpperCase()+'</option>');
            });

            $(select).insertAfter('#searchBy');
        }else {
            $('#search_term').remove();
            $('<input type="text" class="form-control" id="search_term" name="search_term" placeholder="BUSCAR USUARI...">').insertAfter('#searchBy');
        }
    }
    
    $('#searchBy').change(selectSearch);   
</script>


@stop
