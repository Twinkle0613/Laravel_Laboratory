<?php

namespace App\Http\Controllers\API;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Users\ShowUserReqeust;
use App\Http\Requests\Users\ShowUserRequest;
use App\Http\Requests\Users\StoreUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return UserResource::collection(User::with('roles')->orderBy('id', 'desc')->paginate($request->per_page,['*'], 'page', $request->page_number));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->all();
        $data['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $user->syncRoles([Role::findMany($input['roles'])]);
        return (new UserResource($user))->response()->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,ShowUserRequest $request)
    {
        return (new UserResource(User::with('roles')->where('id',$id)->first()))->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateUserRequest $request)
    {
        $user = User::find($id);
        $input = $request->all();
        if(isset($input['password'])){
            $input['password'] = bcrypt($input['password']);
        }else{
            unset($input['password']);
            unset($input['c_password']);
        }
        
        $user->syncRoles([Role::findMany($input['roles'])]);
        $user->update($input);
        return (new UserResource($user))->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,ShowUserRequest $request)
    {
        User::find($id)->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}
