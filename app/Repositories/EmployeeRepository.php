<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Throwable;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * Get all employees.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Employee::with('company')->get();
    }

    /**
     * Store employee data.
     *
     * @param array $data
     * @return Employee
     *
     * @throws Throwable
     */
    public function store(array $data): Employee
    {
        DB::beginTransaction();

        try {
            $employee = Employee::create($data);

            DB::commit();

            return $employee;
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * Find employee by id.
     *
     * @param int $id
     * @return Employee
     */
    public function findById(int $id): Employee
    {
        return Employee::with('company')->findOrFail($id);
    }

    /**
     * Update employee data.
     *
     * @param int $id
     * @param array $data
     * @return Employee
     *
     * @throws Throwable
     */
    public function update(int $id, array $data): Employee
    {
        DB::beginTransaction();

        try {
            $employee = Employee::findOrFail($id);
            $employee->update($data);

            DB::commit();

            return $employee;
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * Delete employee.
     *
     * @param int $id
     * @return bool
     *
     * @throws Throwable
     */
    public function delete(int $id): bool
    {
        DB::beginTransaction();

        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();

            DB::commit();

            return true;
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
