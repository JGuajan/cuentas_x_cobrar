<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cliente;
use DB;

class SaldoController extends Controller
{
     public function _construct(){
    }

    public function index(){
      $clientes=DB::table('clientes as c')->join('facturas as f','f.idcliente','=','c.idcliente')
     ->select('cedula','nombres','apellidos',DB::raw('SUM(saldo) as saldo'))
     ->where('saldo','>',0)
     ->groupBy('cedula','nombres','apellidos')
     ->orderBy('apellidos')->get();
      return $clientes;
    }
}
