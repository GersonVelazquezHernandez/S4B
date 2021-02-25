<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;


class CompaniesController extends Controller
{
    public function index(){
        //$companies = Company::all();
        $companies = Company::paginate(3);
        return view('companies.index', compact('companies'));
    }
    public function create(){
        return view('companies.create');
    }
    public function store(Request $req){
        $company = new Company();
        if($req->file('logo')){
            $image = $req->file('logo');
            $new_name = $image->getClientOriginalName();
            $image->move(storage_path('app\public\logos'), $new_name);
            $company->logo = $new_name;
        } else{
            $company->logo = 'logo.jpg';
        }
            $company->nombre = $req->nombre;
            $company->email = $req->email;
            $company->website = $req->website;
            $company->save();
            $respuesta = array(
                'respuesa'=>'correcto'
            );
        return response()->json($respuesta);
    }
    public function show($id){
        $company = Company::find($id);
        return view('companies.show',compact('company'));
    }


    public function update(Request $req, Company $company){
        $req->validate([
            'nombre'=>'required',
            'email'=>'required',
            'website'=>'required'
        ]);
        if($req->file('logo')){
            $image = $req->file('logo');
            $new_name = $image->getClientOriginalName();
            if($company->logo != 'logo.jpg'){
            unlink(storage_path('app\public\logos\\').$company->logo);
            }
            $image->move(storage_path('app\public\logos'), $new_name);
            $company->logo = $new_name;
        }
            $company->nombre = $req->nombre;
            $company->email = $req->email;
            $company->website = $req->website;
            $company->save();
            return redirect()->route('companies.index');
    }


    public function destroy($id){
        $company = Company::find($id);
        if($company->logo != 'logo.jpg'){
        unlink(storage_path('app\public\logos\\').$company->logo);
        }
        $company->delete($id);
        $respuesta = array(
            'respuesta'=>storage_path('app\public\logos\\').$company->logo
        );
        return response()->json($respuesta);
    }
    public function devolverCompañias(){
        $companies = Company::select(['id','nombre'])->get();
        return $companies;
    }
    
}
