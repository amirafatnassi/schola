<x-layout>
    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
                @foreach($instructors as $instructor)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="{{ asset('storage/' . $instructor->avatar) }}" alt="" style="width: 350px; height: 150px; object-fit: cover;">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href="{{ $instructor->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="{{ $instructor->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href="{{ $instructor->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0"><a href="{{url('instructors/'.$instructor->id)}}">{{$instructor->name}}</a></h5>
                            <small>{{$instructor->email}}</small>
                            <div class="">
                                 <a href="{{route('instructors.show', $instructor->id)}}" class="flex-shrink-0 btn btn-sm btn-primary" style="border-radius: 30px;">Visit profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

</x-layout>
