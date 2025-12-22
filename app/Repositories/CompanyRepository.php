<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interfaces\CompanyRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Throwable;

class CompanyRepository implements CompanyRepositoryInterface
{
    /**
     * Get all companies.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Company::all();
    }

    /**
     * Store company data.
     *
     * @param array $data
     * @return Company
     *
     * @throws Throwable
     */
    public function store(array $data): Company
    {
        DB::beginTransaction();

        try {
            $company = Company::create($data);

            DB::commit();

            return $company;
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * Find company by id.
     *
     * @param int $id
     * @return Company
     */
    public function findById(int $id): Company
    {
        return Company::findOrFail($id);
    }

    /**
     * Update company data.
     *
     * @param int $id
     * @param array $data
     * @return Company
     *
     * @throws Throwable
     */
    public function update(int $id, array $data): Company
    {
        DB::beginTransaction();

        try {
            $company = Company::findOrFail($id);
            $company->update($data);

            DB::commit();

            return $company;
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * Delete company.
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
            $company = Company::findOrFail($id);
            $company->delete();

            DB::commit();

            return true;
        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
