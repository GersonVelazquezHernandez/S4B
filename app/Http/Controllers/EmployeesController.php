<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CompaniesController;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function index(){
        $companies = new CompaniesController();
        $companies = $companies->devolverCompañias();
        $employees = Employee::paginate(3);
        //return view('companies.index', compact('companies'));
        return view('employees.index', compact('companies','employees'));
    }
    public function create(){
        $companies = new CompaniesController();
        $companies = $companies->devolverCompañias();
        return view('employees.create', compact('companies'));
    }
    public function store(Request $req){
            $employee = new Employee();
            $employee->first_name = $req->nombre;
            $employee->last_name = $req->apellido;
            $employee->email = $req->email;
            $employee->telefono = $req->telefono;
            $employee->genero = $req->genero;
            $employee->company_id = $req->company;
            $employee->save();
        return redirect()->route('employees.index');
    }
    public function show($id){
        $employee = Employee::find($id);
        $companies = new CompaniesController();
        $companies = $companies->devolverCompañias();
        return view('employees.show',compact('employee','companies'));
    }
    public function update(Request $req, Employee $employee){
        $employee->first_name = $req->nombre;
        $employee->last_name = $req->apellido;
        $employee->email = $req->email;
        $employee->telefono = $req->telefono;
        $employee->genero = $req->genero;
        $employee->company_id = $req->company;
        $employee->save();
        return redirect()->route('employees.index');
    }
    public function destroy($id){
        $employee = Employee::find($id)->delete($id);
        $respuesta = array(
            'respuesta'=>'Se elimino corretamente'
        );
        return response()->json($respuesta);
    }
    public function empleados_idCompañia($id){
        $total = Employee::where('company_id', $id)->get();
        return $total->count();
    }
}
