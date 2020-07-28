<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Services\EmployeeService;
use App\Traits\ApiHelper;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    use ApiHelper;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $response = EmployeeService::make()->index();
        return EmployeeResource::collection($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        try {
            $response = EmployeeService::make()->create($request);

            return $this->success(200, $response, 'Successfully Created!');
        } catch (QueryException $ex) {
            return $this->error(422, '', 'Something Went Wrong!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return EmployeeResource
     */
    public function show($id)
    {
        $response = EmployeeService::make()->show($id);
        return new EmployeeResource($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, $id)
    {
        $response = EmployeeService::make()->update($request, $id);
        return $this->success(200, $response, 'Employee is Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
