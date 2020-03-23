@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row container-fluid">
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
    </div>
    {{-- {!!json_encode($form_inputs)!!}  --}}
    <n-table title="User" 
             :table_fields="{{json_encode($table_fields)}}" 
             :inputs_info="{{json_encode($form_inputs)}}"
             url_path='{{route('api.users.index')}}'>
    </n-table>



</div>




@endsection
