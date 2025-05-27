<x-layout>


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" style="width: 450px; height: 450px; object-fit: cover;" src="{{ asset('storage/' . $student->avatar) }}" alt="">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    <a class="btn btn-sm-square btn-primary mx-1" href="{{ $student->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href="{{ $student->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-sm-square btn-primary mx-1" href="{{ $student->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="fa fa-star {{ $student->rating >= $i ? 'text-warning' : 'text-muted' }}"></span>
                                        @endfor
                                        ({{$student->rating}})
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">{{$student->role}}</h6>
                    <h1>{{$student->name}}</h1>
                    <small>{{$student->email}}</small>
                    <hr>
                    <h3>Courses:</h3>
                    <div class="row gy-2 gx-4 mb-4">
                        @foreach($student->courses as $course)
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>{{$course->title}}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

</x-layout>
