@extends('layouts.app')

@section('title')Create @endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="POST" action="{{ route('company.store') }}" enctype="multipart/form-data" class="m-5">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">Email</label>
        <input class="form-control" name="email" id="exampleFormControlInput2" rows="3">
    </div>
    <div  class="mb-3">
        <label for="exampleFormControlInput3" class="form-label">Website</label>
        <input class="form-control" name="website" id="exampleFormControlInput3" rows="3">
    </div>

    <div >
        <label class="form-label">Logo</label>
        <input type="file" class="form-control" name="logo">
    </div>
    <button type="submit" class="btn btn-success m-5">Create</button>
</form>
@endsection