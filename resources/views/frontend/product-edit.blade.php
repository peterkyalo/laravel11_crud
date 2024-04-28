<x-layout>
    <x-slot:title>
        Product Edit
    </x-slot>

    <div class="container py-4 ">
        <div class="row justify-content-center ">
            <div class="col-md-6 py-4 px-4 shadow rounded ">
                {{-- @if ($errors->any())
                    <div>
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                {{-- Redirecting with falsh session data --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('product.update', $product) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" value="{{ $product->name }}" name="name"
                            class="form-control @error('name') is-invalid @enderror" id="name">

                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 form-floating">
                        <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" id="description"
                            name="description" style="height: 100px">{{ $product->description }} </textarea>
                        <label for="description">Product description</label>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" value="{{ $product->price }}" name="price"
                            class="form-control @error('price') is-invalid @enderror" id="price">
                        @error('price')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" name="stock" value="{{ $product->stock }}"
                            class="form-control @error('stock') is-invalid @enderror" id="stock">
                        @error('stock')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="is_active" class="form-check-label">Is Active</label>
                        <input type="checkbox" name="is_active" class="form-check-input"
                            @if ($product->is_active) checked
                        @else @endif
                            id="is_active">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

</x-layout>
