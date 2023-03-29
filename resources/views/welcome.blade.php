@extends('layouts.app')
@section('main')
<div class="border rounded mt-5 mx-auto d-flex flex-column align-items-stretch bg-white" style="width: 70%;">
        <div class="d-flex justify-content-between flex-shrink-0 p-3 link-dark  border-bottom">
            <span class="fs-5 fw-semibold">Welcome, 
                @guest
                <span class="fs-5 fw-semibold">Guest</span>
                @else
                <span class="fs-5 fw-semibold">{{Auth::user()->name}}</span>
                @endguest
            </span>
            <a href="{{url('/tasks')}}" class="btn btn-success align-self-end">Task List</a>
        </div>
</div>
@endsection