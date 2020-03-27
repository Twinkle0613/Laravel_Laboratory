<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\GeneralResource;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\General\ShowRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return GeneralResource::collection(Permission::orderBy('id', 'desc')->paginate($request->per_page,['*'], 'page', $request->page_number));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
        $data = $request->all();
        return (new GeneralResource(Permission::create($data)))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,ShowRequest $request)
    {
        return (new GeneralResource(Permission::where('id',$id)->first()))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
        $input = $request->validated();
        $permission = Permission::find($id);
        $permission->update(['name' => $input['name']]);
        return (new GeneralResource($permission))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,ShowRequest $request)
    {
        Permission::find($id)->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
