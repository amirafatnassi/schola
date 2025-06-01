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
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-info text-primary me-2"></i>{{$course->category->name}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$course->level}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-language text-primary me-2"></i>{{$course->language}}</small>
                        <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>{{$course->instructor->firstname}} {{$course->instructor->lastname}}</small>
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
                <div class="row text-start align-items-center">
                    @if ($course->testimonials->count()>0)

                    @foreach($course->testimonials as $testimony)
                    <figure class="max-w-screen-md mx-auto text-center mt-2">
                        <svg class="w-10 h-10 mx-auto mb-3 text-gray-400 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                            <path d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                        </svg>
                        <blockquote>
                            <p class="text-2xl italic font-medium text-gray-900 dark:text-white">"{{$testimony->content}}"</p>
                        </blockquote>
                        <figcaption class="flex items-center justify-center mt-6 space-x-3 rtl:space-x-reverse">
                            <img class="w-6 h-6 rounded-full" src="{{ Auth::user()->avatar ? asset('img/profile-pictures/' . Auth::user()->avatar) : asset('img/profile-pictures/user.jpg') }}" alt="profile picture">
                            <div class="flex items-center divide-x-2 rtl:divide-x-reverse divide-gray-500 dark:divide-gray-700">
                                <cite class="pe-3 font-medium text-gray-900 dark:text-white">{{$testimony->user->firstname}} {{$testimony->user->lastame}}</cite>
                                <cite class="ps-3 text-sm text-gray-500 dark:text-gray-400">{{$testimony->user->role}}</cite>
                            </div>
                        </figcaption>
                    </figure>
                    @endforeach
                    @endif

                    @if ($isEnrolled)
                    <form action="{{ route('testimony.submit') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
                        @csrf
                        <input type="text" value="{{$course->id}}" name="courseId" hidden>

                        <!-- Testimony Label and Textarea -->
                        <div class="mb-3">
                            <label for="testimony" class="form-label fw-bold">Your Testimony</label>
                            <textarea
                                id="testimony"
                                name="testimony"
                                class="form-control"
                                rows="4"
                                placeholder="Share your experience with us..."
                                required></textarea>
                        </div>

                        <!-- Rating Stars -->
                        <div class="mb-3">
                            <label for="rating" class="form-label fw-bold">Your Rating</label>
                            <select id="rating" name="rating" class="form-select" required>
                                <option value="">Select a rating</option>
                                <option value="5">★★★★★ (5 - Excellent)</option>
                                <option value="4">★★★★☆ (4 - Very Good)</option>
                                <option value="3">★★★☆☆ (3 - Good)</option>
                                <option value="2">★★☆☆☆ (2 - Fair)</option>
                                <option value="1">★☆☆☆☆ (1 - Poor)</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2">
                                Submit Testimony
                            </button>
                        </div>
                    </form>

                    @endif

                </div>

            </div>
        </div>
    </div>
    <!-- 404 End -->

</x-layout>
