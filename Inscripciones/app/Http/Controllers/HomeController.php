<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SuscriptorM;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        /* 'primer_nombre', 'segundo_nombre', 'primer_apellido','segundo_apellido','email',
        'telefono','numero'*/
        $ex_suscriptor=SuscriptorM::where('numero','=',$request->numero)->get()->first();
        if(!empty($ex_suscriptor))
        {
            echo 'error, número ya fue elegido';
        }
        else
        {
            $suscriptor=new SuscriptorM();
            $suscriptor->primer_nombre=$request->primer_nombre;
            $suscriptor->segundo_nombre=$request->segundo_nombre;
            $suscriptor->primer_apellido=$request->primer_apellido;
            $suscriptor->segundo_apellido=$request->segundo_apellido;
            $suscriptor->email=$request->email;
            $suscriptor->telefono=$request->telefono;
            $suscriptor->numero=$request->numero;
            $suscriptor->save();
            echo 'registro guardado';   
        }
    }
}
