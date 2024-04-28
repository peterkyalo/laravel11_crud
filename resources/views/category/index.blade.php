<x-layout>
    <x-slot name="title">
        Categories
    </x-slot>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        {{-- <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:">
                            <use xlink:href="#check-circle-fill" />
                        </svg> --}}
                        <div>
                            {{ session(success) }}
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('category.create') }}" class="btn btn-primary float-end">Add Category</a>
                    </div>
                    <div class="card-body">
                        <div class="table table-responsive">
                            <table class="table table-primary">
                                <thead>
                                    <tr>
                                        <th scope="col">SN</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
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
                                                @if ($category->is_active)
                                                    active
                                                @else
                                                    in active
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
