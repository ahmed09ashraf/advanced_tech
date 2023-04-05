@extends('layouts.app')

@section('title')Index @endsection

@section('content')
<div class="text-center">
    <a href="{{ route('company.create') }}" class="mt-4 btn btn-success">Add Company</a>
    {{-- <a href="{{ route('posts.archive') }}" class="mt-4 btn btn-danger"> Deleted Posts</a> --}}
</div>
<table class="table mt-4">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Logo</th>
            <th scope="col">Co. Name</th>

            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $companies as $company)
        <tr>
            <td>{{ $company->id}}</td>
            <td>
                <img src="{{ asset($company->logo) }}" width="100" height="100">
            </td>
            <td>{{ $company->name}}</td>


            <td>
                <a href="{{ route('company.show', ['company' => $company['id']]) }}" class="btn btn-info">View</a>
                <a href="{{ route('company.edit', ['company' => $company['id']]) }}" class="btn btn-primary">Edit</a>
                <form style="display: inline" method="POST" action="{{ route('company.delete', ['company' => $company->id]) }}">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Are you sure you want to delete this company?');" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center m-3">
    <span>
        {{$companies->links()}}
    </span>
</div>
    @endsection
