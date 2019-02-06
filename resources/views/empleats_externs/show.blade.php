@extends('layouts.app')

@section('content')

<!-- TODO: Hacer que las tablas puedan ocultar sus "tbody" para que el usuario desplegue el que desee -->

<div class="container">
    <!-- DATOS PERSONALES DEL EMPLEADO -->
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr class="row">
                <th class="col">Dades personals</th>
            </tr>
        </thead>

        <tbody>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Imatge:</td>
                <td class="col">
                    <img src="data:image/jpg;base64,{{$empleat['imatge_empleat']}}" class="rounded" style="height:100px"/>
                </td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Nom:</td>
                <td class="col">{{ $empleat['nom_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Cognoms:</td>
                <td class="col">{{ $empleat['cognom1_empleat']}}{{ $empleat['cognom2_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Sexe:</td>
                <td class="col">{{ $empleat['sexe_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Nacionalitat:</td>
                <td class="col">{{ $empleat['nacionalitat_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">E-mail:</td>
                <td class="col">{{ $empleat['email_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">DNI:</td>
                <td class="col">{{ $empleat['dni_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Telèfon:</td>
                <td class="col">{{ $empleat['telefon_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Direcció:</td>
                <td class="col">{{ $empleat['direccio_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Codi postal:</td>
                <td class="col">{{ $empleat['codi_postal_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Naixement:</td>
                <td class="col">{{ $empleat['naixement_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">NSS:</td>
                <td class="col">{{ $empleat['nss_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">IBAN:</td>
                <td class="col">{{ $empleat['iban_empleat']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Data de creació:</td>
                <td class="col">{{ $empleat['created_at']}}</td>
            </tr>
            <tr class="row">
                <td class="font-weight-bold col-sm-3">Última data de modificació:</td>
                <td class="col">{{ $empleat['updated_at']}}</td>
            </tr>
        </tbody>
    </table>

    <!-- CARGOS DEL EMPLEADO -->
    <div class="row">
        @foreach( $carrecsEmpelat as $key => $carrec )
        
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark" style="border-left: 3px solid white">
                    <tr class="row">
                        <th class="col">{{ $key }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $carrec as $key2 => $info )
                        @if ($key2 === 0)
                                                   
                            <tr class="row">
                                @foreach ($info as $key => $tarifa) 
                                    <td class="col">{{ $tarifa['tarifa'] }}</td>
                                @endforeach
                            </tr>
                            
                            <tr class="row">
                                @foreach ($info as $key => $tarifa) 
                                    <td class="col">{{ $tarifa['preu_carrec'] }}€</td>
                                @endforeach
                            </tr>
                            
                        @else
                            <tr class="row table-active">
                                <td class="col"><img src="{{url('/')}}/img/flags/{{$key2}}.png" class="rounded"> {{ $key2 }}</td>                   
                                <td class="col">
                                @foreach ($info as $key => $tarifa) 
                                    @if ($tarifa['empleat_homologat'] == '1')
                                        Homologat
                                        @break
                                    @endif
                                @endforeach
                                </td>
                            </tr>
                                <tr class="row text-center bg-white">
                                    @if ($key == 'Actor')
                                        @foreach( $tarifas as $key3 => $tarifa)
                                            @if($tarifa->id_carrec == 1)
                                                <td class="col">{{$tarifa->nombre}}</td>
                                            @endif
                                        @endforeach
                                    @endif
                                </tr>
                                <tr class="row text-center bg-white">
                                    <td class="col">
                                        @foreach ($info as $key => $tarifa) 
                                            @if ($tarifa['tarifa'] == 'Tarifa video take')
                                                {{ $tarifa['preu_carrec'] }}€
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="col">
                                        @foreach ($info as $key => $tarifa) 
                                            @if ($tarifa['tarifa'] == 'Tarifa video cg')
                                                {{ $tarifa['preu_carrec'] }}€
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="col">
                                        @foreach ($info as $key => $tarifa) 
                                            @if ($tarifa['tarifa'] == 'Tarifa cine take')
                                                {{ $tarifa['preu_carrec'] }}€
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="col">
                                        @foreach ($info as $key => $tarifa) 
                                            @if ($tarifa['tarifa'] == 'Tarifa cine cg')
                                                {{ $tarifa['preu_carrec'] }}€
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="col">
                                        @foreach ($info as $key => $tarifa) 
                                            @if ($tarifa['tarifa'] == 'Tarifa docu')
                                                {{ $tarifa['preu_carrec'] }}€
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="col">
                                        @foreach ($info as $key => $tarifa) 
                                            @if ($tarifa['tarifa'] == 'Tarifa canso')
                                                {{ $tarifa['preu_carrec'] }}€
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="col">
                                        @foreach ($info as $key => $tarifa) 
                                            @if ($tarifa['tarifa'] == 'Tarifa narrador')
                                                {{ $tarifa['preu_carrec'] }}€
                                            @endif
                                        @endforeach
                                    </td>                                    
                                </tr>

                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach
    </div>
</div>

@stop
