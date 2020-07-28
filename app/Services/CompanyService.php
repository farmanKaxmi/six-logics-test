<?php


namespace App\Services;


use App\Http\Requests\CompanyRequest;
use App\Models\Company;

class CompanyService extends Service
{
    /**
     * @return Company[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return $company = Company::get();

    }

    /**
     * @param CompanyRequest $request
     * @return bool
     */
    public function store(CompanyRequest $request)
    {
        $company = new Company();
        $company->name = $request['name'];
        $company->address = $request['address'];
        return $company->save();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return Company::whereId($id)
            ->get();
    }


    /**
     * @param CompanyRequest $request
     * @param $id
     * @return mixed
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::find($id);
        $company->name = $request['name'];;
        $company->address = $request['address'];

        return $company->save();
    }

}
