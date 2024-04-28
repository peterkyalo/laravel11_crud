<x-layout>
    <x-slot name="title">
        Products
    </x-slot>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="card shadow p-2">
                    <div class="card-header">
                        <a href="{{ route('product.create') }}" class="btn btn-primary float-end"> <i
                                class="bi bi-pen-fill"></i> Add Product</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Is Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class="">
                                        <td scope="row">{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>
                                            @if ($product->is_active)
                                                active
                                            @else
                                                in active
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('product.edit', $product) }}"
                                                class="btn btn-primary btn-sm mx-2 "><i
                                                    class="bi bi-pencil-square"></i></a>

                                            <form action="{{ route('product.destroy', $product) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm mx-1"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $products->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
