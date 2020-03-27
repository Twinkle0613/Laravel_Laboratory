<?php

namespace App\Http\Controllers\API;

// use App\Model\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Resources\GeneralResource;
use App\Http\Requests\General\ShowRequest;
use App\Http\Requests\Roles\StoreRoleRequest;
use App\Http\Requests\Roles\UpdateRoleRequest;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return GeneralResource::collection(Role::with('permissions')->orderBy('id', 'desc')->paginate($request->per_page,['*'], 'page', $request->page_number));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $input = $request->validated();
        $role = Role::create(['name' =>  $input['name']]);
        $role->syncPermissions($input['permissions']);
        return (new GeneralResource($role))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,ShowRequest $request)
    {
        return (new GeneralResource(Role::with('permissions')->where('id',$id)->first()))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateRoleRequest $request)
    {
        $input = $request->validated();
        $role = Role::find($id);
        $role->permissions()->sync($input['permissions']);
        $role->update(['name' => $input['name']]);
        return (new GeneralResource($role))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,ShowRequest $request)
    {
        Role::find($id)->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
