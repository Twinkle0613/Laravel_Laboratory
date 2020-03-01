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
    
    <example-component fields={{json_encode($fields)}} data={{json_encode($users)}}></example-component>


</div>




@endsection
