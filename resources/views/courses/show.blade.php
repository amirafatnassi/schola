<x-layout>

    <!-- 404 Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    @if($course->certificate_available)<i class="bi bi-award-fill display-1 text-primary"></i>@endif
                    <h1 class="mb-4">{{$course->title}}</h1>
                    <div class="stars">
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <span class="fa fa-star {{ $course->rating >= $i ? 'text-warning' : 'text-muted' }}"></span>
                                @endfor
                        </div>
                    </div>
                    <small>({{$course->rating}})</small>
                    <h3 class="mb-0">{{$course->price}} DNT</h3>
                    <p class="mb-4">{{$course->description}}</p>

                    <div class="d-flex border-top">
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$course->level}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-language text-primary me-2"></i>{{$course->language}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$course->instructor->name}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>{{$course->duration}} h</small>
                        <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>{{$course->students->count()}} étudiants</small>
                    </div>
                </div>
                <div class="text-start">
                    <hr class="m-2">

                    <h2 class="mb-4">Modules</h2>
                    @foreach($course->modules as $mod)
                    <h5 class="mb-0">{{$mod->order}} - {{$mod->title}}</h5>
                    <p class="mb-4">{{$mod->content}}</p>
                    @if($mod->duration) <p class="mb-4">{{$mod->duration}} h</p>@endif
                    @endforeach
                </div>
                <div class="row text-center justify-content-center align-items-center">
                    @php
                    $user = Auth::user();
                    $isEnrolled = $user->courses->contains($course->id);
                    @endphp

                    <div class="col-auto mb-2">
                        @if ($isEnrolled || session('enrolled_course') == $course->id || session('already_enrolled') == $course->id)
                        <button class="btn btn-primary rounded-pill py-3 px-5" disabled>Enrolled</button>
                        @else
                        <form action="{{ route('courses.enroll', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary rounded-pill py-3 px-5">Enroll</button>
                        </form>
                        @endif
                    </div>

                    <div class="col-auto mb-2">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ url('/') }}">Go Back To Home</a>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- 404 End -->

</x-layout>
