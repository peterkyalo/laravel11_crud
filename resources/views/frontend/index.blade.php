<x-layout>
    <x-slot:title>
        Laravel CRUD
    </x-slot>
    <div class="py-4">
        <div class="container">
            {{-- @php
                $successMessage = 'Data saved successfully';
            @endphp
            <x-alert-message :message="$successMessage" /> --}}
            <h4>Welcome to home dashboard</h4>
            <hr>
        </div>
    </div>
    <x-slot:scripts>
        <script>
            console.log('This is my scripts area')
        </script>
    </x-slot>
</x-layout>
