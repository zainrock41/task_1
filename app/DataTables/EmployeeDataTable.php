<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\EloquentDataTable;

class EmployeeDataTable
{
    protected $query;

    public function __construct($query = null)
    {
        $this->query = $query ?: Employee::with('company');
    }

    /**
     * Build DataTable.
     *
     * @return EloquentDataTable
     */
    public function dataTable(): EloquentDataTable
    {
        return (new EloquentDataTable($this->query))
            ->addColumn('company_name', function ($employee) {
                return $employee->company?->name;
            })
            ->addColumn('action', function ($employee) {
                return view('employees.partials.actions', compact('employee'));
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return $this->query;
    }
}
