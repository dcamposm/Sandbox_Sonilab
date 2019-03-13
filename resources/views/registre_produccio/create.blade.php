@extends('layouts.app')

@section('content')

<div class="container">
  <h2 class="mb-4">Creació de registres de producció</h2>
  <div class="row">
    {{-- DADES BÀSIQUES --}}
    <div class="col-12 col-xl-6 mb-3">
      <div class="card">
        <form action=""> {{-- init form --}}
          <div class="card-header">
            <span class="h3">Dades bàsiques</span>
            <button class="btn btn-success float-right">
              <span class="fas fa-save"></span>Desar
            </button>
          </div>
          <div class="card-body row">
            <div class="form-group col-12 col-sm-6">
              <label for="id_registre_entrada">Referència</label>
              <select name="id_registre_entrada" id="id_registre_entrada" class="form-control">
                @foreach ($regEntrades as $key => $entrada) 
                  <option value="{{ $entrada->id_registre_entrada }}">{{ $entrada->titol }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group col-12 col-sm-6">
              <label for="subreferencia">Sub-referència</label>
              <input type="text" name="subreferencia" id="subreferencia" class="form-control">
            </div>

            <div class="form-group col-12 col-sm-6">
              <label for="data_entrega">Data d'entrega</label>
              <input type="date" name="data_entrega" id="data_entrega" class="form-control">
            </div>

            <div class="form-group col-12 col-sm-6">
              <label for="setmana">Setmana</label>
              <input type="number" name="setmana" id="setmana" class="form-control" min="0">
            </div>

            <div class="form-group col-12 col-sm-6">
              <label for="titol">Títol</label>
              <input type="text" name="titol" id="titol" class="form-control">
            </div>

            <div class="form-group col-12 col-sm-6">
              <label for="titol_traduit">Títol traduit</label>
              <input type="text" name="titol_traduit" id="titol_traduit" class="form-control">
            </div>

            {{-- NOTA: data_mix NO EXISTE todavía en la base de datos --}}
            <div class="form-group col-12 col-sm-6">
              <label for="data_mix">Data mix</label>
              <input type="date" name="data_mix" id="data_mix" class="form-control">
            </div>

            <div class="form-group col-12 col-sm-6">
              <label for="estat">Estat</label>
              <select name="estat" id="estat" class="form-control">
                <option value="Pendent">Pendent</option>
                <option value="Finalitzada">Finalitzada</option>
                <option value="Cancel·lada">Cancel·lada</option>
              </select>
            </div>
          </div>
        </form> {{-- end form --}}
      </div>
    </div>

    {{-- COMANDA --}}
    <div class="col-12 col-xl-6 mb-3">
      <div class="card">
        <div class="card-header">
          <span class="h3">Comanda</span>
          <button class="btn btn-success float-right">
            <span class="fas fa-save"></span>Desar
          </button>
        </div>
        <div class="card-body">
          Formulario...
        </div>
      </div>
    </div>

    {{-- MATERIAL AUDIOVISUAL --}}
    <div class="col-12 col-xl-6 mb-3">
      <div class="card">
        <div class="card-header">
          <span class="h3">Material audiovisual</span>
          <button class="btn btn-success float-right">
            <span class="fas fa-save"></span>Desar
          </button>
        </div>
        <div class="card-body">
          Formulario...
        </div>
      </div>
    </div>

      {{-- EMPLEATS --}}
    <div class="col-12 col-xl-6 mb-3">
      <div class="card">
        <div class="card-header">
          <span class="h3">Empleats</span>
          <button class="btn btn-success float-right">
            <span class="fas fa-save"></span>Desar
          </button>
        </div>
        <div class="card-body">
          Formulario...
        </div>
      </div>
    </div>

  </div>
</div>

@endsection
