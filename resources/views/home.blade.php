@extends('layouts.admin')
@section('content')
<div class="container">
    {{-- <div class="row container-fluid">
        <div class="col-md-12 ">

            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>
            </div>
        
        </div>
    </div> --}}

    <n-table title="Users" 
             :table_fields="{{json_encode($users_table['table_fields'])}}" 
             :inputs_info="{{json_encode($users_table['form_inputs'])}}"
             url_path='{{route('api.users.index')}}'>
    </n-table>

    <n-table title="Roles" 
        :table_fields="{{json_encode($roles_table['table_fields'])}}" 
        :inputs_info="{{json_encode($roles_table['form_inputs'])}}"
        url_path='{{route('api.roles.index')}}'>
    </n-table>

    <n-table title="Permissions" 
        :table_fields="{{json_encode($permissions_table['table_fields'])}}" 
        :inputs_info="{{json_encode($permissions_table['form_inputs'])}}"
        url_path='{{route('api.permissions.index')}}'>
    </n-table>



</div>




@endsection
