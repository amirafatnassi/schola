<x-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="g-5">
                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
<div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control" value="{{ old('description') }}" rows="5" required>
                        </div>

                        <div class="mb-3 col-4">
                            <label>Category</label>
                            <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
