<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Http\Requests\CompanyRequest;
use App\Http\Requests\CompanyIdRequest;
use App\Repositories\Interfaces\CompanyInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class CompanyController extends Controller
{
    /**
     * Company repository instance.
     *
     * @var CompanyInterface
     */
    protected CompanyInterface $companyRepository;

    /**
     * Inject CompanyInterface.
     *
     * @param CompanyInterface $companyRepository
     */
    public function __construct(CompanyInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of companies.
     *
     * @param CompanyDataTable $dataTable
     * @return View|RedirectResponse
     */
    public function index(CompanyDataTable $dataTable)
    {
        try {
            return $dataTable->render('companies.index');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', 'Unable to load companies list.');
        }
    }

    /**
     * Show the form for creating a new company.
     *
     * @return View|RedirectResponse
     */
    public function create()
    {
        try {
            return view('companies.create');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', 'Unable to load company creation form.');
        }
    }

    /**
     * Store a newly created company in storage.
     *
     * @param CompanyRequest $request
     * @return RedirectResponse
     */
    public function store(CompanyRequest $request): RedirectResponse
    {
        try {
            $this->companyRepository->store($request->validated());

            return redirect()
                ->route('companies.index')
                ->with('success', 'Company created successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while creating the company.');
        }
    }

    /**
     * Display the specified company.
     *
     * @param CompanyIdRequest $request
     * @return View|RedirectResponse
     */
    public function show(CompanyIdRequest $request)
    {
        try {
            $company = $this->companyRepository->findById($request->companyId);
            if (!$company) {
                return redirect()->route('companies.index')
                    ->with('error', 'Company not found.');
            }

            return view('companies.show', compact('company'));
        } catch (Throwable $exception) {
            return redirect()
                ->route('companies.index')
                ->with('error', 'Unable to load company details.');
        }
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param CompanyIdRequest $request
     * @return View|RedirectResponse
     */
    public function edit(CompanyIdRequest $request)
{
    try {
        $companyId = $request->companyId; // matches route param & validation
        $company = $this->companyRepository->findById($companyId);

        if (!$company) {
            return redirect()->route('companies.index')
                ->with('error', 'Company not found.');
        }

        return view('companies.edit', compact('company'));
    } catch (Throwable $exception) {
        return redirect()
            ->route('companies.index')
            ->with('error', 'Unable to load company edit form.');
    }
}

    /**
     * Update the specified company in storage.
     *
     * @param CompanyRequest $request
     * @param CompanyIdRequest $idRequest
     * @return RedirectResponse
     */
    public function update(CompanyRequest $request, CompanyIdRequest $idRequest): RedirectResponse
    {
        try {
            $this->companyRepository->update($idRequest->companyId, $request->validated());

            return redirect()
                ->route('companies.index')
                ->with('success', 'Company updated successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while updating the company.');
        }
    }

    /**
     * Remove the specified company from storage.
     *
     *
     * @param CompanyIdRequest $request
     * @return RedirectResponse
     */
    public function destroy(CompanyIdRequest $request): RedirectResponse
    {
        try {
            $this->companyRepository->delete($request->companyId);

            return redirect()
                ->route('companies.index')
                ->with('success', 'Company deleted successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', 'Something went wrong while deleting the company.');
        }
    }
}
