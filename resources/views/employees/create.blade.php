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
<form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data" class="m-5">
    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput2" class="form-label">Email</label>
        <input class="form-control" name="email" id="exampleFormControlInput2" rows="3">
    </div>
    <div  class="mb-3">
        <label for="exampleFormControlInput3" class="form-label">Phone</label>
        <input class="form-control" name="phone" id="exampleFormControlInput3" rows="3">
    </div>

    <div class="mb-3">
        <label class="form-check-label">Company</label>
        <select name="company_id" class="form-control">
            @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>

    <button type="submit" class="btn btn-success m-5">Create</button>
</form>
@endsection