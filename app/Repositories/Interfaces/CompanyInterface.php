<?php

namespace App\Repositories\Interfaces;

use App\Models\Company;
use Illuminate\Support\Collection;

interface CompanyInterface
{
    /**
     * Get all companies.
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Store company data.
     *
     * @param array $data
     * @return Company
     */
    public function store(array $data): Company;

    /**
     * Find company by id.
     *
     * @param int $id
     * @return Company
     */
    public function findById(int $id): Company;

    /**
     * Update company data.
     *
     * @param int $id
     * @param array $data
     * @return Company
     */
    public function update(int $id, array $data): Company;

    /**
     * Delete company.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
