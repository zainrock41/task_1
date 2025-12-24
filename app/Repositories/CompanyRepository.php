<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Interfaces\CompanyInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Throwable;

class CompanyRepository implements CompanyInterface
{
    /**
     * Get all companies.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        try {
            return Company::all();
        } catch (Throwable $exception) {
            throw $exception;
        }
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
    * Find a company by its ID.
    *
    * @param int $id The ID of the company to retrieve.
    * @return \App\Models\Company The company model instance.
    *
    */
    public function findById(int $id): Company
    {
        try {
            return Company::findOrFail($id);
        } catch (Throwable $exception) {
            throw $exception;
        }
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
