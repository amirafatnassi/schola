<x-layout>

    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Cours</h6>
                <!-- <h1 class="mb-5">Web Design</h1> -->
            </div>
            <div class="row g-4 justify-content-center">
                @foreach ($courses as $cours)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="img/course-1.jpg" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="{{route('courses.show', $cours->id)}}" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Lire la suite</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Rejoignez-nous</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">{{$cours->price}} DNT</h3>
                            <div class="mb-3">
                                <div class="stars">
                                    <div class="star-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <span class="fa fa-star {{ $cours->rating >= $i ? 'text-warning' : 'text-muted' }}"></span>
                                        @endfor
                                    </div>
                                </div>
                                <small>({{$cours->rating}})</small>
                            </div>
                            <h5 class="mb-4">{{$cours->title}}</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$cours->instructor->name}}</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{$cours->duration}} h</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$cours->students->count()}} étudiants</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses End -->

</x-layout>
