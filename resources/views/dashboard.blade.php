@extends('layouts.app')
@section('title', 'Dashboard | ShopSphere')
@section('content')

    <div class="mb-4">
        <h1>Dashboard</h1>

        <p class="text-muted">
            E-commerce Order Management System
        </p>
    </div>

    <div class="row g-3">

        <div class="col-md-4">
            <div class="card shadow-sm p-3 h-100">
                <h5>Total Products</h5>
                <h2>{{ $productCount }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3 h-100">
                <h5>Low Stock Products</h5>
                <h2>{{ $lowStockCount }}</h2>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm p-3 h-100">
                <h5>Total Stock Quantity</h5>
                <h2>{{ $totakStockCount }}</h2>
            </div>
        </div>

    </div>

    <a href="{{ route('products.index') }}"
       class="btn btn-primary mt-4">
        Manage Products
    </a>

@endsection