@extends('layouts.admin')
@section('content')

{{-- <div class="container"> --}}
    <n-table title="Users" 
             :table_fields="{{json_encode($users_table['table_fields'])}}" 
             :inputs_info="{{json_encode($users_table['form_inputs'])}}"
             url_path='{{route('api.users.index')}}'>
    </n-table>
{{-- @hasanyrole(['Admin|Support']) --}}
    <n-table title="Roles" 
        :table_fields="{{json_encode($roles_table['table_fields'])}}" 
        :inputs_info="{{json_encode($roles_table['form_inputs'])}}"
        url_path='{{route('api.roles.index')}}'>
    </n-table>
    {{-- @can('permission_create') --}}
        <n-table title="Permissions" 
            :table_fields="{{json_encode($permissions_table['table_fields'])}}" 
            :inputs_info="{{json_encode($permissions_table['form_inputs'])}}"
            url_path='{{route('api.permissions.index')}}'>
        </n-table>
    {{-- @endcan --}}
{{-- @endrole --}}
{{-- </div> --}}

@endsection
