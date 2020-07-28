<?php


namespace App\Services;


use App\Http\Requests\EmpCompUpdateRequest;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;

class EmployeeService extends Service
{

    /**
     * @return Employee[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $employee = Employee::all();
        return $employee;
    }

    /**
     * @param EmployeeRequest $request
     * @return bool
     */
    public function create(EmployeeRequest $request)
    {
        $employee = new Employee();
        $employee->name = $request['name'];
        $employee->designation = $request['designation'];
        $employee->company_id = $request['company_id'];
        return $employee->save();
    }

    /**
     * @param EmpCompUpdateRequest $request
     * @return mixed
     */
    public function updateEmployeeCompany(EmpCompUpdateRequest $request)
    {
        $companyUpdate = Employee::where('id', $request['employee_id'])
            ->update([
                'company_id' => $request['company_id'],
            ]);
        return $companyUpdate;

    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $employee = Employee::where('id', $id)
            ->first();
        return $employee;
    }

    /**
     * @param EmployeeRequest $request
     * @param $id
     * @return mixed
     */
    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request['name'];
        $employee->designation = $request['designation'];
        return $employee->save();
    }

}
