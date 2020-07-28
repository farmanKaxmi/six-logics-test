<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Http\Resources\CompanyCollection;
use App\Http\Resources\CompanyResource;
use App\Services\CompanyService;
use App\Traits\ApiHelper;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{

    use ApiHelper;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $response = CompanyService::make()->index();

        return DataTables::resource(CompanyResource::collection($response))->toJson();
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
    public function store(CompanyRequest $request)
    {
        try {
            $response = CompanyService::make()->store($request);
            return $this->success(200, $response, 'Successfully Created!');
        } catch (QueryException $ex) {
            return $this->error(422, '', 'Something Went Wrong!');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($id)
    {
        $response = CompanyService::make()->show($id);
        return CompanyResource::collection($response);
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
    public function update(CompanyRequest $request, $id)
    {
        try {
            $response = CompanyService::make()->update($request, $id);
            return $this->success(200, $response, 'Successfully Updated!');
        } catch (QueryException $ex) {
            return $this->error(422, '', 'Something Went Wrong!');

        }
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
