<?php

namespace App\Repositories\Interfaces;

use App\Models\Employee;
use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface
{
    /**
     * Get all employees.
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Store employee data.
     *
     * @param array $data
     * @return Employee
     */
    public function store(array $data): Employee;

    /**
     * Find employee by id.
     *
     * @param int $id
     * @return Employee
     */
    public function findById(int $id): Employee;

    /**
     * Update employee data.
     *
     * @param int $id
     * @param array $data
     * @return Employee
     */
    public function update(int $id, array $data): Employee;

    /**
     * Delete employee.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
