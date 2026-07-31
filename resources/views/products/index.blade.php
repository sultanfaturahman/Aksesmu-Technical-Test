@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold tracking-tight text-slate-900">Produk</h2>
            <p class="mt-1 text-sm text-slate-500">
                @if ($search !== '')
                    {{ number_format($products->total(), 0, ',', '.') }} hasil untuk “{{ $search }}”
                @else
                    {{ number_format($products->total(), 0, ',', '.') }} produk tersimpan
                @endif
            </p>
        </div>

        <a href="{{ route('products.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:ring-offset-2">
            Tambah produk
        </a>
    </div>

    <div class="overflow-hidden rounded-lg border border-slate-200 bg-white">
        <div class="border-b border-slate-200 p-4">
            <form method="GET" action="{{ route('products.index') }}" class="flex flex-col gap-3 sm:flex-row">
                <label for="search" class="sr-only">Cari produk</label>
                <input id="search"
                       name="search"
                       type="search"
                       value="{{ $search }}"
                       placeholder="Cari produk"
                       class="min-w-0 flex-1 rounded-lg border border-slate-300 text-sm focus:border-emerald-600 focus:ring-emerald-600">
                <button type="submit"
                        class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-semibold text-slate-700 hover:bg-slate-50">
                    Cari
                </button>
                @if ($search !== '')
                    <a href="{{ route('products.index') }}"
                       class="rounded-lg px-4 py-2 text-center text-sm font-semibold text-slate-500 hover:text-slate-800">
                        Hapus pencarian
                    </a>
                @endif
            </form>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-5 py-3 text-left text-sm font-medium text-slate-600">Produk</th>
                        <th class="px-5 py-3 text-right text-sm font-medium text-slate-600">Harga</th>
                        <th class="px-5 py-3 text-center text-sm font-medium text-slate-600">Stok</th>
                        <th class="px-5 py-3 text-right text-sm font-medium text-slate-600">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 bg-white">
                    @forelse ($products as $product)
                        <tr class="hover:bg-slate-50/70">
                            <td class="px-5 py-4 align-top">
                                <p class="font-medium text-slate-900">{{ $product->name }}</p>
                                <p class="mt-1 max-w-xl text-sm text-slate-500">
                                    {{ $product->description ?: 'Belum ada deskripsi' }}
                                </p>
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-right align-top font-semibold text-slate-800">
                                Rp {{ number_format((float) $product->price, 2, ',', '.') }}
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-center align-top">
                                <span class="text-sm {{ $product->stock > 0 ? 'text-slate-700' : 'font-medium text-rose-700' }}">
                                    {{ number_format($product->stock) }}
                                </span>
                            </td>
                            <td class="whitespace-nowrap px-5 py-4 text-right align-top">
                                <div class="inline-flex items-center gap-4">
                                    <a href="{{ route('products.edit', $product) }}"
                                       class="text-sm font-medium text-emerald-700 hover:text-emerald-900">
                                        Edit
                                    </a>
                                    <form method="POST"
                                          action="{{ route('products.destroy', $product) }}"
                                          onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-sm font-medium text-rose-700 hover:text-rose-900">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-14 text-center">
                                <p class="font-medium text-slate-700">Belum ada produk</p>
                                <p class="mt-1 text-sm text-slate-500">Tambah produk untuk mulai mengisi daftar.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($products->hasPages())
            <div class="border-t border-slate-200 px-5 py-4">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@endsection
