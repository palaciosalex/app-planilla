<?php

namespace App\Http\Controllers;
use App\Models\Report;
use App\Models\Employee;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    public function index()
    {
        $employees=DB::table('employees')->where('estado', 'A')->get();
        return view('reports.index', ['employees' => $employees]);
    }

    public function create()
    {
        $employees=DB::table('employees')->where('estado', 'A')->get();
        return view('reports.add', ['employees' => $employees]);
    }


    public function getAll()
    {
        $reports = DB::table('reports')
        ->select('reports.*', 'employees.nombre as employee')
        ->join('employees', 'employees.id', '=', 'reports.employee_id');
        return DataTables::of($reports)->toJson();
    }
}
