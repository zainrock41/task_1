<?php

namespace App\Http\Controllers;

use App\DataTables\CompanyDataTable;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use App\Repositories\Interfaces\CompanyRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Employee;
use Yajra\DataTables\Facades\DataTables;
use Throwable;

class CompanyController extends Controller
{
    /**
     * Company repository instance.
     *
     * @var CompanyRepositoryInterface
     */
    protected CompanyRepositoryInterface $companyRepository;

    /**
     * Inject CompanyRepositoryInterface.
     *
     * @param CompanyRepositoryInterface $companyRepository
     */
    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * Display a listing of companies.
     *
     * @param CompanyDataTable $dataTable
     * @return View
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Company::select('companies.*');

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($company) {
                    return view('companies.partials.actions', compact('company'));
             })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('companies.index');
    }

    /**
     * Show the form for creating a new company.
     *
     * @return View
     */
    public function create(): View
    {
        return view('Companies.Create');
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
                ->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified company.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        $company = $this->companyRepository->findById($id);

        return view('Companies.Show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $company = $this->companyRepository->findById($id);

        return view('Companies.Edit', compact('company'));
    }

    /**
     * Update the specified company in storage.
     *
     * @param CompanyRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CompanyRequest $request, int $id): RedirectResponse
    {
        try {
            $this->companyRepository->update($id, $request->validated());

            return redirect()
                ->route('companies.index')
                ->with('success', 'Company updated successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified company from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->companyRepository->delete($id);

            return redirect()
                ->route('companies.index')
                ->with('success', 'Company deleted successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', 'Something went wrong.');
        }
    }
}
