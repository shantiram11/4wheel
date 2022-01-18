@extends('dashboard.index')
@section('content')
<div class="container page__container">

    <div class="card ">
        <div class="row no-gutters">
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="card-title mb-0">Add user</h4>
            <div class="d-flex flex-wrap gap-2">
                <a type="button" href="{{route('user.index')}}" class="btn btn-dark ">Back</a>
            </div>
        </div>
        <hr>
        <form class="form" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('dashboard.users._form',['show' => true, 'buttonText' => 'Create'])
        </form>
    </div>
    </div>
    @endsection
