<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;

/**
 * Class EmployeeDataTable
 *
 * Handles server-side processing for Employee records using Yajra DataTables.
 *
 * @package App\DataTables
 */
class EmployeeDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param mixed $query Results from the query() method
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn() // Adds DT_RowIndex column
            ->addColumn('companyName', function (Employee $employee) {
                return $employee->company?->name ?? '-';
            })
            ->addColumn('action', function (Employee $employee) {
                // Pass employee to the actions partial
                return view('partials.actions', compact('employee'));
            })
            ->rawColumns(['action']); // Allow HTML rendering in 'action' column
    }

    /**
     * Get the query source for the DataTable.
     *
     * @param Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {
        return $model->newQuery()
            ->with('company') // Eager load company relationship
            ->select([
                'employees.id',
                'employees.firstName',
                'employees.lastName',
                'employees.email',
                'employees.phone',
                'employees.companyId',
            ]);
    }

    /**
     * Optional: Define HTML builder for DataTable.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('EmployeeTable')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1); // Default ordering by first column (First Name)
    }

    /**
     * Get columns definition for DataTable.
     *
     * @return array<int, \Yajra\DataTables\Html\Column>
     */
    protected function getColumns()
    {
        return [
            Column::computed('DT_RowIndex')->title('#')->orderable(false),
            Column::make('firstName')->title('First Name'),
            Column::make('lastName')->title('Last Name'),
            Column::make('email')->title('Email'),
            Column::make('phone')->title('Phone'),
            Column::computed('companyName')->title('Company'),
            Column::computed('action')->orderable(false)->searchable(false),
        ];
    }
}
