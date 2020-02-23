@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="my-3 p-3 bg-white rounded shadow-sm">
                        <h6 class="border-bottom border-gray pb-2 mb-0">Profile</h6>
                        <div class="media text-muted pt-3">
                            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <div class="d-flex align-items-center w-100">
                                    <strong class="text-gray-dark">Name</strong> <span class="pl-5">{{$user->name}}</span>
                                    <a href="{{route('user.edit', $user->id)}}" class="ml-auto p-2 bd-highlight">Edit</a>
                                </div>
                                <div class="d-flex  align-items-center w-100">
                                    <strong class="text-gray-dark">Email</strong> <span class="pl-5">{{$user->email}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
