@extends('layouts.app')

@section('content')
<div class="container">
  @if (Auth::check())
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">Hello {{ucwords(Auth::user()->name)}}</h1>
                </div>
            </div>
        </div>
    </div>
  @endif
</div>
@endsection
