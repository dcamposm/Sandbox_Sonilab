@extends('layouts.app')

@section('content')

<div class="container">
    <h2 style="font-weight: bold">{{!empty($registreEntrada) ? 'Editar registre d\'entrada' : 'Crear registre d\'entrada'}}</h2>
    <form method = "POST" action="{{ !empty($registreEntrada) ? route('registreEntradaUpdate', array('id' => $registreEntrada->id_registre_entrada)) : route('registreEntradaInsert') }}" enctype="multipart/form-data">
        @csrf
        <fieldset class="border p-2">
            <legend class="w-auto">Dades:</legend>
            <div class="row">
            <div class="col-6">
                    <div class="form-group">
                        <label for="id_registre_entrada" style="font-weight: bold">Referencia:</label>
                        <input type="number" class="form-control" id="id_registre_entrada" placeholder="Entrar referencia" name="id_registre_entrada" value="{{!empty($registreEntrada) ? $registreEntrada->id_registre_entrada : ''}}">
                        <span class="text-danger">{{ $errors->first('id_registre_entrada') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="titol" style="font-weight: bold">Titol:</label>
                        <input type="text" class="form-control" id="titol" placeholder="Entrar titol" name="titol" value="{{!empty($registreEntrada) ? $registreEntrada->titol : ''}}">
                        <span class="text-danger">{{ $errors->first('titol') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="entrada" style="font-weight: bold">Data Entrada:</label>
                        <input type="date" class="form-control" id="entrada" placeholder="Entrar data Entrada" name="entrada" value="{{!empty($registreEntrada) ? explode(' ',$registreEntrada->entrada)[0] : ''}}">
                        <span class="text-danger">{{ $errors->first('entrada') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="ot" style="font-weight: bold">OT:</label>
                        <input type="text" class="form-control" id="ot" placeholder="Entrar ot" name="ot" value="{{!empty($registreEntrada) ? $registreEntrada->ot : ''}}">
                        <span class="text-danger">{{ $errors->first('ot') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="oc" style="font-weight: bold">OC:</label>
                        <input type="text" class="form-control" id="oc" placeholder="Entrar oc" name="oc" value="{{!empty($registreEntrada) ? $registreEntrada->oc : ''}}">
                        <span class="text-danger">{{ $errors->first('oc') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="sortida" style="font-weight: bold">Data Sortida:</label>
                        <input type="date" class="form-control" id="sortida" placeholder="Entrar data Sortida" name="sortida" value="{{!empty($registreEntrada) ? explode(' ',$registreEntrada->sortida)[0] : ''}}">
                        <span class="text-danger">{{ $errors->first('sortida') }}</span>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="client" style="font-weight: bold">Selecciona client:</label>
                        <select class="form-control" name="id_client">
                            @foreach( $clients as $client )
                                <option value="{{$client['id_client']}}" {{(!empty($registreEntrada) && $registreEntrada->id_client == $client['id_client']) ? 'selected' : ''}} >{{$client['nom_client']}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('id_client') }}</span>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="client" style="font-weight: bold">Selecciona servei:</label>
                        <select class="form-control" name="id_servei">
                            @foreach( $serveis as $servei )
                                <option value="{{$servei['id_servei']}}" {{(!empty($registreEntrada) && $registreEntrada->id_servei == $client['id_servei']) ? 'selected' : ''}} >{{$servei['nom_servei']}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('id_servei') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="idioma" style="font-weight: bold">Selecciona idioma:</label>
                        <select class="form-control" name="id_idioma">
                            @foreach( $idiomes as $idioma )
                                <option value="{{$idioma['id_idioma']}}" {{(!empty($registreEntrada) && $registreEntrada->id_idioma == $idioma['id_idioma']) ? 'selected' : ''}} >{{$idioma['idioma']}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('id_idioma') }}</span>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="media" style="font-weight: bold">Selecciona tipus:</label>
                        <select class="form-control" name="id_media" id="id_media">
                            @foreach( $medias as $media )
                                <option value="{{$media['id_media']}}" {{(!empty($registreEntrada) && $registreEntrada->id_media == $media['id_media']) ? 'selected' : ''}} >{{$media['nom_media']}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{ $errors->first('id_media') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="minuts" style="font-weight: bold">Minuts:</label>
                        <input type="number" class="form-control" id="minuts" name="minuts" value="{{!empty($registreEntrada) ? $registreEntrada->minuts : ''}}">
                        <span class="text-danger">{{ $errors->first('minuts') }}</span>
                    </div>
                </div>

            </div>
            <div class="row" id="total_ep">
                <div class="col-6">
                    <div class="form-group">
                        <label for="total_episodis" style="font-weight: bold">Episodis totals:</label>
                        <input type="number" class="form-control" id="total_episodis" name="total_episodis" value="{{!empty($registreEntrada) ? $registreEntrada->total_episodis : ''}}">
                        <span class="text-danger">{{ $errors->first('total_episodis') }}</span>
                    </div>
                </div>
                <div class="col-6" id="ep_set">
                    <div class="form-group">
                        <label for="episodis_setmanals" style="font-weight: bold">Episodis setmanals:</label>
                        <input type="number" class="form-control" id="episodis_setmanals" name="episodis_setmanals" value="{{!empty($registreEntrada) ? $registreEntrada->episodis_setmanals : ''}}">                    
                        <span class="text-danger">{{ $errors->first('episodis_setmanals') }}</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6" id="ent_set">
                    <div class="form-group">
                        <label for="entregues_setmanals" style="font-weight: bold">Entregues setmanals:</label>
                        <input type="number" class="form-control" id="entregues_setmanals" name="entregues_setmanals" value="{{!empty($registreEntrada) ? $registreEntrada->entregues_setmanals : ''}}">
                        <span class="text-danger">{{ $errors->first('entregues_setmanals') }}</span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="estat" style="font-weight: bold">Estat:</label>
                        <select class="form-control" name="estat">
                            <option value="Pendent" {{(!empty($registreEntrada) && $registreEntrada->estat == 'Pendent') ? 'selected' : ''}}>Pendent</option>
                            <option value="Finalitzada" {{(!empty($registreEntrada) && $registreEntrada->estat == 'Finalitzada') ? 'selected' : ''}}>Finalitzada</option>
                            <option value="Cancel·lada" {{(!empty($registreEntrada) && $registreEntrada->estat == 'Cancel·lada') ? 'selected' : ''}}>Cancel·lada</option>
                        </select>
                        <span class="text-danger">{{ $errors->first('estat') }}</span>
                    </div>
                </div>
            </div>
        </fieldset>


        <br>

        <!-- BOTÓN DE CREAR O ACTUALIZAR -->
        <div class="row">
            <div class="col-6">
                <button type="submit" class="btn btn-success col-4">{{!empty($registreEntrada) ? 'Desar canvis' : 'Crear'}}</button>
            </div>
        </div>
        <br>
    </form>
</div>

<script>
    //--------Funcions per el filtra-----------
    $( document ).ready(function() {
        if ($('#id_media').val() < '5' && $('#id_media').val() > 1) {
            $('#total_ep').hide();
            $('#ep_set').hide();
            $('#ent_set').hide();
        }
        else {
            $('#total_ep').show();
            $('#ep_set').show();
            $('#ent_set').show();
        }
    });
    function hideInputs() {
        //var value = $('#id_media').val();
        
        //alert(value);
        if ($('#id_media').val() < '5' && $('#id_media').val() > 1) {
            $('#total_ep').hide();
            $('#ep_set').hide();
            $('#ent_set').hide();
        }
        else {
            $('#total_ep').show();
            $('#ep_set').show();
            $('#ent_set').show();
        }
    }
    
    $('#id_media').change(hideInputs); 
</script>

@endsection