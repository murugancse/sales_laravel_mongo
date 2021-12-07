@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employer Dashboard') }}
                    @include('includes.messages')
                </div>

                <div class="card-body">
                    <a href="{{ route('salesproduct.index') }}" class="btn
                                    btn-info btn-sm pull-right">
                                    Sales Product List
                                </a>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
