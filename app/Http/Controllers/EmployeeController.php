<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeeDataTable;
use App\Http\Requests\EmployeeRequest;
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
     * @return View
     */
    public function index(EmployeeDataTable $dataTable): View
    {
        try {
            return $dataTable->render('employees.index');
        } catch (Throwable $exception) {
            abort(500, 'Unable to load employees list.');
        }
    }

    /**
     * Show the form for creating a new employee.
     *
     * @return View
     */
    public function create(): View
    {
        try {
            $companies = Company::select('id', 'name')->get();
            return view('employees.create', compact('companies'));
        } catch (Throwable $exception) {
            abort(500, 'Unable to load employee creation form.');
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
                ->with('error', 'Something went wrong.');
        }
    }

    /**
     * Display the specified employee.
     *
     * @param int $id
     * @return View
     */
    public function show(int $id): View
    {
        try {
            $employee = $this->employeeRepository->findById($id);
            return view('employees.show', compact('employee'));
        } catch (Throwable $exception) {
            abort(404, 'Employee not found.');
        }
    }

    /**
     * Show the form for editing the specified employee.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        try {
            $employee = $this->employeeRepository->findById($id);
            $companies = Company::select('id', 'name')->get();
            return view('employees.edit', compact('employee', 'companies'));
        } catch (Throwable $exception) {
            abort(404, 'Employee not found.');
        }
    }

    /**
     * Update the specified employee in storage.
     *
     * @param EmployeeRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(EmployeeRequest $request, int $id): RedirectResponse
    {
        try {
            $this->employeeRepository->update($id, $request->validated());

            return redirect()
                ->route('employees.index')
                ->with('success', 'Employee updated successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong.');
        }
    }

    /**
     * Remove the specified employee from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->employeeRepository->delete($id);

            return redirect()
                ->route('employees.index')
                ->with('success', 'Employee deleted successfully.');
        } catch (Throwable $exception) {
            return redirect()
                ->back()
                ->with('error', 'Something went wrong.');
        }
    }
}
