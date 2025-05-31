<x-layout>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="g-5">
                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">


                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
