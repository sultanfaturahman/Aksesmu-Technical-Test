@php
    $editing = isset($product);
@endphp

<div class="space-y-6">
    <div>
        <label for="name" class="block text-sm font-semibold text-slate-700">Nama produk <span class="text-rose-600">*</span></label>
        <input id="name"
               name="name"
               type="text"
               maxlength="100"
               required
               value="{{ old('name', $product->name ?? '') }}"
               class="mt-2 block w-full rounded-lg border border-slate-300 focus:border-emerald-600 focus:ring-emerald-600 @error('name') border-rose-400 @enderror">
        @error('name')
            <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-semibold text-slate-700">Deskripsi</label>
        <textarea id="description"
                  name="description"
                  rows="4"
                  class="mt-2 block w-full rounded-lg border border-slate-300 focus:border-emerald-600 focus:ring-emerald-600 @error('description') border-rose-400 @enderror">{{ old('description', $product->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid gap-6 sm:grid-cols-2">
        <div>
            <label for="price" class="block text-sm font-semibold text-slate-700">Harga <span class="text-rose-600">*</span></label>
            <div class="relative mt-2">
                <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-sm text-slate-500">Rp</span>
                <input id="price"
                       name="price"
                       type="number"
                       min="0"
                       max="99999999.99"
                       step="0.01"
                       required
                       value="{{ old('price', $product->price ?? '') }}"
                       class="block w-full rounded-lg border border-slate-300 pl-10 focus:border-emerald-600 focus:ring-emerald-600 @error('price') border-rose-400 @enderror">
            </div>
            @error('price')
                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="stock" class="block text-sm font-semibold text-slate-700">Stok <span class="text-rose-600">*</span></label>
            <input id="stock"
                   name="stock"
                   type="number"
                   min="0"
                   step="1"
                   required
                   value="{{ old('stock', $product->stock ?? 0) }}"
                   class="mt-2 block w-full rounded-lg border border-slate-300 focus:border-emerald-600 focus:ring-emerald-600 @error('stock') border-rose-400 @enderror">
            @error('stock')
                <p class="mt-1.5 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-col-reverse gap-3 border-t border-slate-200 pt-6 sm:flex-row sm:justify-end">
        <a href="{{ route('products.index') }}"
           class="inline-flex items-center justify-center rounded-lg border border-slate-300 bg-white px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">
            Batal
        </a>
        <button type="submit"
                class="inline-flex items-center justify-center rounded-lg bg-emerald-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-600 focus:ring-offset-2">
            {{ $editing ? 'Simpan perubahan' : 'Simpan' }}
        </button>
    </div>
</div>
