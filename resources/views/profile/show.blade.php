<x-layout>


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <div class="team-item bg-light">
                            <div class="overflow-hidden">
                                <img class="img-fluid" style="width: 450px; height: 450px; object-fit: cover;"
                                    src="{{ Auth::user()->avatar ? asset('img/profile-pictures/' . Auth::user()->avatar) : asset('img/profile-pictures/user.jpg') }}"
                                    alt="User Avatar">
                            </div>
                            <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                                <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                    @if(Auth::user()->facebook) <a class="btn btn-sm-square btn-primary mx-1" href="{{ Auth::user()->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a> @endif
                                    @if(Auth::user()->instagram) <a class="btn btn-sm-square btn-primary mx-1" href="{{ Auth::user()->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a> @endif
                                    @if(Auth::user()->linkedin) <a class="btn btn-sm-square btn-primary mx-1" href="{{ Auth::user()->linkedin }}" target="_blank"><i class="fab fa-linkedin"></i></a> @endif
                                </div>
                            </div>
                            @if(Auth::user()->rating)
                            <div class="text-center p-4">
                                <div class="star-rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="fa fa-star {{ Auth::user()->rating >= $i ? 'text-warning' : 'text-muted' }}"></span>
                                        @endfor
                                        ({{Auth::user()->rating}})
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">{{Auth::user()->role}}</h6>
                    <h1>{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h1>
                    <p>Email: {{Auth::user()->email}}</p>
                    <p>Role: {{Auth::user()->role}}</p>
                    <p>ID: {{Auth::user()->id}}</p>
                    <form action="{{ route('profile.edit', Auth::user()->id) }}" method="PUT">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5">Edit profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

</x-layout>
