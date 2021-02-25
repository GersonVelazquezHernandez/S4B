<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __invoke(){
        if(!session()->has('user')){
            return redirect('login');
        }
        $companies  = new CompaniesController();
        $companies = $companies->devolverCompañias();
        $employees = new EmployeesController();
        $total = array();
        $empresas = array();
        foreach ($companies as $company) {
            array_push($empresas,$company->nombre);
            $x = $employees->empleados_idCompañia((int)$company->id);
            array_push($total, $x);
        }
        $total = json_encode($total);
        $empresas = json_encode($empresas);
        return view('home',compact('total','empresas'));
    }
}
