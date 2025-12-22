<?php

namespace App\DataTables;

use App\Models\Company;
use Yajra\DataTables\EloquentDataTable;

class CompanyDataTable
{
    protected $query;

    public function __construct($query = null)
    {
        $this->query = $query ?: Company::query();
    }

    /**
     * Build DataTable.
     *
     * @return EloquentDataTable
     */
    public function dataTable(): EloquentDataTable
    {
        return (new EloquentDataTable($this->query))
            ->addColumn('action', function ($company) {
                return view('companies.partials.actions', compact('company'));
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
