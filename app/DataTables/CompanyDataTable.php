<?php

namespace App\DataTables;

use App\Models\Company;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;

/**
 * Class CompanyDataTable
 *
 * Handles server-side processing of Company records for Yajra DataTables.
 *
 * @package App\DataTables
 */
class CompanyDataTable extends DataTable
{
    /**
     * Build DataTable instance.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query The base query for DataTable
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action', fn($company) => view('partials.actions', compact('company')))
            ->rawColumns(['action']);
    }

    /**
     * Get query source of DataTable.
     *
     * @param \App\Models\Company $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Company $model)
    {
        return $model->newQuery()->select('id', 'name', 'email', 'website');
    }

    /**
     * Optional: Use HTML builder to define table structure and AJAX.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('companyTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1); // Default order by 'name'
    }

    /**
     * Get the columns definition for DataTable.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex')->title('#')->searchable(false)->orderable(false),
            Column::make('name')->title('Name'),
            Column::make('email')->title('Email'),
            Column::make('website')->title('Website'),
            Column::computed('action')->title('Action')->searchable(false)->orderable(false),
        ];
    }
}
