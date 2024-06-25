@extends('dashboard.components.layouts.main')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Manage Admin Accounts</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#create-account-modal">
                <span class="icon text-white-50">
                    <i class="fas fa-user-plus"></i>
                </span>
                <span class="text">Add new</span>
            </a>

            @if (session('success'))
            <div class="alert alert-success mt-2" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @foreach ($errors->all() as $error)
            <div class="alert alert-danger mt-2" role="alert">
                {{ $error }}
            </div>
            @endforeach
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <x-dashboard.tables.list-account :accounts="$admins" />
            </div>
        </div>
    </div>

</div>

<x-dashboard.modals.create-account title="Add new Admin Account" :isAdmin="true" />

@endsection