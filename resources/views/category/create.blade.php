<x-layout>
    <x-slot name="title">
        Add Categories
    </x-slot>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                <div class="card shadow">
                    <div class="card-header">
                        <a href="{{ route('category.index') }}" class="btn btn-danger float-end"><i
                                class="bi bi-arrow-left-circle"></i></a>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid
                                        @enderror "
                                        id="name">

                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control @error('description')is-invalid
                                    @enderror"
                                        name="description" id="description">{{ old('description') }}</textarea>
                                    <label for="description">Description</label>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
<<<<<<< HEAD
                                    <label for="image" class="form-label">Upload Image</label>
=======
                                    <label for="image" class="form-label">Image</label>
>>>>>>> d6a4a0299425efb4f8a3798570620bf2ff3fe385
                                    <input class="form-control" type="file" name="image" id="image">
                                </div>

                                <div class="mb-3">
                                    <label for="is_active" class="form-check-label">Is Active</label>
                                    <input type="checkbox" name="is_active" class="form-check-input" id="is_active">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</x-layout>
