<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Asisst;
use App\Imports\AsisstsImport;
use DataTables;
use Illuminate\Support\Facades\DB;
use Excel;

class AsisstsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees= Employee::all();
        return view('asistencias.index',['employees' => $employees]);
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
            'fecha' => 'required|date',
            'hora' => 'required',
            'trabajador_id' => 'required',
            'tipo' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false,'errors'=>$validator->errors()->all()]);
        }
        $asisst=new Asisst;
        $asisst->fecha_hora=$request->fecha." ".$request->hora;
        $asisst->tipo=$request->tipo;
        $asisst->employee_id=$request->trabajador_id;
        $asisst->save();
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
        $asisst=Asisst::find($id);
        return response()->json($asisst);
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
        $validator = \Validator::make($request->all(),[
            'fecha' => 'required|date',
            'hora' => 'required',
            'trabajador_id' => 'required',
            'tipo' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false,'errors'=>$validator->errors()->all()]);
        }
        $asisst=Asisst::find($id);
        $asisst->fecha_hora=$request->fecha." ".$request->hora;
        $asisst->tipo=$request->tipo;
        $asisst->employee_id=$request->trabajador_id;
        $asisst->save();
        return response()->json(['success' => true,'msg'=>"La operación se realizó con exito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asisst::destroy($id);
        return response()->json(['success' => true,'msg'=>"La operación se realizó con exito"]);
    }

    public function getAssists(Request $request)
    {

        $fecha_inicial = $request->fecha_inicial;
        $fecha_final = $request->fecha_final;
        $employee_id = $request->employee_id;

        $asissts = DB::table('asissts')
        ->select('asissts.*', 'employees.nombre as trabajador')
        ->join('employees', 'employees.id', '=', 'asissts.employee_id')
        ->where('employees.estado','=','A')
        ->whereDate('fecha_hora', '>=', $fecha_inicial)
        ->whereDate('fecha_hora', '<=', $fecha_final);

        if($employee_id!="0")
        {
            $asissts = $asissts->where('asissts.employee_id', $employee_id);
        }

        $asissts=$asissts->get();

        return DataTables::of($asissts)->toJson();
    }

    public function import(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'archivoImportacion' => 'required|nullable|file|mimes:xlsx',
        ]);

        if($validator->fails()){
            return response()->json(['success' => false,'errors'=>$validator->errors()->all()]);
        }
        else{
            try {
                Excel::import(new AsisstsImport, request()->file('archivoImportacion'));
                return response()->json(['success' => true,'msg'=>"La importacion se realizo con exito"]);
            }
            catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
                $failures = $e->failures();     
                return response()->json(['success' => false,'errors'=>$failures, 'rules'=>true]);
            }
        }

    }
}
