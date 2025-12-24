<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeIdRequest;
use App\Models\Company;
use App\Repositories\Interfaces\EmployeeInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class EmployeeController extends Controller
{
    /**
     * Employee repository instance.
     *
     * @var EmployeeInterface
     */
    protected EmployeeInterface $employeeRepository;

    /**
     * Inject EmployeeInterface.
     *
     * @param EmployeeInterface $employeeRepository
     */
    public function __construct(EmployeeInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Display a listing of employees.
     *
     * @param EmployeeDataTable $dataTable
     * @return View|RedirectResponse
     */
    public function index(EmployeeDataTable $dataTable)
    {
        try {
            return $dataTable->render('employees.index');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', 'Unable to load employees list.');
        }
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return View|RedirectResponse
     */
    public function create()
    {
        try {
            $companies = Company::select('id', 'name')->get();
            return view('employees.create', compact('companies'));
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', 'Unable to load employee creation form.');
        }
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param EmployeeRequest $request
     * @return RedirectResponse
     */
    public function store(EmployeeRequest $request): RedirectResponse
    {
        try {
            $this->employeeRepository->store($request->validated());

            return redirect()
                ->route('employees.index')
                ->with('success', 'Employee created successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while creating the employee.');
        }
    }

    /**
     * Display the specified employee.
     *
     * @param EmployeeIdRequest $request
     * @return View|RedirectResponse
     */
    public function show(EmployeeIdRequest $request)
    {
        try {
            $employee = $this->employeeRepository->findById($request->employeeId);
            return view('employees.show', compact('employee'));
        } catch (Throwable $exception) {
            return redirect()
                ->route('employees.index')
                ->with('error', 'Unable to load employee details.');
        }
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param EmployeeIdRequest $request
     * @return View|RedirectResponse
     */
    public function edit(EmployeeIdRequest $request)
    {
        try {
            $employee = $this->employeeRepository->findById($request->employeeId);
            $companies = Company::select('id', 'name')->get();

            return view('employees.edit', compact('employee', 'companies'));
        } catch (Throwable $exception) {
            return redirect()
                ->route('employees.index')
                ->with('error', 'Unable to load employee edit form.');
        }
    }

    /**
     * Update the specified employee in storage.
     *
     * @param EmployeeRequest $request
     * @param EmployeeIdRequest $idRequest
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, EmployeeIdRequest $idRequest): RedirectResponse
    {
        try {
            $this->employeeRepository->update($idRequest->employeeId, $request->validated());

            return redirect()
                ->route('employees.index')
                ->with('success', 'Employee updated successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while updating the employee.');
        }
    }

    /**
     * Remove the specified employee from storage.
     *
     * @param EmployeeIdRequest $request
     * @return RedirectResponse
     */
    public function destroy(EmployeeIdRequest $request): RedirectResponse
    {
        try {
            $this->employeeRepository->delete($request->employeeId);

            return redirect()
                ->route('employees.index')
                ->with('success', 'Employee deleted successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', 'Something went wrong while deleting the employee.');
        }
    }
}
