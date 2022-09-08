<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DataTables;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::all();
        return view('trabajadores.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'nombre' => 'required|max:100',
            'dni' => 'required|max:8',
            'email' => 'required|max:100',
            'ingreso_hora' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false,'errors'=>$validator->errors()->all()]);
        }
        $employee=new Employee;
        $employee->nombre=$request->nombre;
        $employee->dni=$request->dni;
        $employee->email=$request->email;
        $employee->ingreso_hora=$request->ingreso_hora;
        $employee->estado=$request->estado;
        $employee->save();
        return response()->json(['success' => true,'msg'=>"La operación se realizó con exito"]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getEmployees()
    {
        $employees=Employee::all();
        return DataTables::of($employees)->toJson();
    }
}
