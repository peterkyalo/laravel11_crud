<x-layout>
    <x-slot name="title">
        404
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

                <div class="shadow p-2 justify-center">
                    <p class="text-danger text-bold">Whoops!! Page not found!</p>
                    <a href="{{ route('home.index') }}">Go back to homepage</a>
                </div>
            </div>
        </div>
    </div>

</x-layout>
