@extends('layouts.app')

@section('title', 'Edit produk')

@section('content')
    <div class="mx-auto max-w-3xl">
        <div class="mb-6">
            <a href="{{ route('products.index') }}" class="text-sm font-medium text-emerald-700 hover:text-emerald-900">Kembali</a>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900">Edit produk</h2>
            <p class="mt-1 text-sm text-slate-500">{{ $product->name }}</p>
        </div>

        <form method="POST" action="{{ route('products.update', $product) }}" class="rounded-lg border border-slate-200 bg-white p-6 sm:p-8">
            @csrf
            @method('PUT')
            @include('products._form', ['product' => $product])
        </form>
    </div>
@endsection
