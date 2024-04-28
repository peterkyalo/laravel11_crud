<x-layout>
    <x-slot name="title">
        Home
    </x-slot>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">

                @if (session('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <div>
                            {{ session(success) }}
                        </div>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <a href="#" class="btn btn-primary float-end">Add</a>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
