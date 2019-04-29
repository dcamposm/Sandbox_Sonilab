<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use App\Calendar;

class CalendariController extends Controller
{
    public function showCalendari($semana = null){

        $now = Carbon::now();
        $numSemana = $now->weekOfYear;
        $dia1 = $now->startOfWeek();
        $dia2 = $dia1->copy()->addDay();
        $dia3 = $dia2->copy()->addDay();
        $dia4 = $dia3->copy()->addDay();
        $dia5 = $dia4->copy()->addDay();
        $fechas = [
            $dia1->format('d-m-Y'), 
            $dia2->format('d-m-Y'), 
            $dia3->format('d-m-Y'), 
            $dia4->format('d-m-Y'), 
            $dia5->format('d-m-Y')
        ];
        return View('calendari.index', ["fechas" => $fechas, "numSemana" => $numSemana]);
    }
    public function create(){
        $v = Validator::make(request()->all(),[
            //'id_calendar'=>'required|max:35',
            'id_empleat'=>'required|max:35',
            'id_registre_entrada'=>'required|max:35',
            'num_takes'=>'required|regex:/^[0-9]+$/',//^[0-9]+$
            'data_inici'=>'required|max:35',
            'data_fi'=>'required|max:35',
            'num_sala'=>'required|max:35'
        ]);

        if ($v->fails()) {
            // Datos incorrectos.
            return redirect()->back()->withErrors($v)->withInput();
        }
        else {
            //return response()->json(request()->all());
            // Datos correctos.
            $calendari = new Calendar(request()->all());  
            $calendari->save();

            return redirect()->route('showCalendari');
        }
    }

    public function update($id){
        $calendari = Calendar::findOrFail($id);

        $v = Validator::make(request()->all(),[
            //'id_calendar'=>'required|max:35',
            'id_empleat'=>'required|max:35',
            'id_registre_entrada'=>'required|max:35',
            'num_takes'=>'required|regex:/^[0-9]+$/',//^[0-9]+$
            'data_inici'=>'required|max:35',
            'data_fi'=>'required|max:35',
            'num_sala'=>'required|max:35'
        ]);

        if ($v->fails()) {
            // Datos incorrectos.
            return redirect()->back()->withErrors($v)->withInput();
        }
        else {
            //return response()->json(request()->all());
            // Datos correctos.
            $calendari->fill(request()->all());  
            $calendari->save();

            return redirect()->route('showCalendari');
        }
    }

    public function delete($id){
        $calendari = Calendar::findOrFail($id);
        $calendari->delete();
       
        return redirect()->route('showCalendari');
    }
}
