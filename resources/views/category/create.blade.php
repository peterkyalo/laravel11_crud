<x-layout>
    <x-slot name="title">
        Add Categories
    </x-slot>

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('category.create') }}" class="btn btn-primary float-end">Add Category</a>
                    </div>
                    <div class="card-body">
                        <div class="container">
                            <form>
                                <div class="mb-3 row">
                                    <label for="inputName" class="col-4 col-form-label">Name</label>
                                    <div class="col-8">
                                        <input type="text" class="form-control" name="inputName" id="inputName"
                                            placeholder="Name" />
                                    </div>
                                </div>
                                <fieldset class="mb-3 row">
                                    <legend class="col-form-legend col-4">
                                        Group name
                                    </legend>
                                    <div class="col-8">
                                        you can use radio and checkboxes here
                                    </div>
                                </fieldset>
                                <div class="mb-3 row">
                                    <div class="offset-sm-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">
                                            Action
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>

</x-layout>
