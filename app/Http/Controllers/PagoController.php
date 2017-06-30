<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Requests\PagoRequest;
use App\Pago;


class PagoController extends Controller
{
    public function _construct(){
      $this -> middleware('auth');
    }

   public function index(){
      $pagos=Pago::paginate(10);
      return view('panel.pagos.index', compact('pagos'));
    }

      public function create(){
      return view('panel.pagos.create');
    }

    public function store(PagoRequest $request){
      Pago::create($request->all());
         return Redirect::to('pagos');
    }

   
     public function edit(){
      $pagos=Pago::paginate(10);
      return view('panel.pagos.show', compact('pagos'));
    }

    public function update(PagoRequest $request, $id){
      Pago::updateOrCreate(['idPago'=>$id], $request->all());
      return Redirect::to('pagos');
    }

    public function destroy($id){
      Pago::destroy($id);
      return Redirect::to('pago');
    }
}