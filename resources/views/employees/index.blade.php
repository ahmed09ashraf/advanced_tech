@extends('layouts.app')

@section('title')Index @endsection

@section('content')
<div class="text-center">
    <a href="{{ route('employee.create') }}" class="mt-4 btn btn-success">Add Employee</a>
    {{-- <a href="{{ route('posts.archive') }}" class="mt-4 btn btn-danger"> Deleted Posts</a> --}}
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Company</th>

            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $employees as $employee)
        <tr>
            <td>{{ $employee->id}}</td>
            <td>{{ $employee->first_name}}</td>
            <td>{{ $employee->last_name}}</td>
            <td>{{ $employee->email}}</td>
            <td>{{ $employee->phone}}</td>
            <td>{{ $employee->company_id}}</td>



            <td>
                <a href="{{ route('employee.show', ['employee' => $employee['id']]) }}" class="btn btn-info">View</a>
                <a href="{{ route('employee.edit', ['employee' => $employee['id']]) }}" class="btn btn-primary">Edit</a>
                <form style="display: inline" method="POST" action="{{ route('employee.delete', ['employee' => $employee->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Are you sure you want to delete this employee?');" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center m-3">
    <span>
        {{$employees->links()}}
    </span>
</div>
    @endsection