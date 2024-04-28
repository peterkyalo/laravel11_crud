<x-layout>
    <x-slot name="title">
        Categories
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

                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('category.create') }}" class="btn btn-primary float-end"><i
                                class="bi bi-plus-circle mx-2"></i>Add Category</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Is Active</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="">
                                        <td scope="row">{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $category->image_path) }}" width="70px"
                                                height="70px" alt="No image">
                                        </td>
                                        <td>
                                            @if ($category->is_active)
                                                active
                                            @else
                                                in active
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{ route('category.edit', $category) }}"
                                                class="btn btn-primary btn-sm mx-2"><i
                                                    class="bi bi-pencil-square"></i></a>

                                            <form action="{{ route('category.destroy', $category) }}" method="post">
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

                        {{ $categories->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
