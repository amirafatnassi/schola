<x-layout>
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mx-auto">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-1">
                                <label for="email" class="form-label">E-mail</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', session('last_user_email', ''))}}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>

                                </span>
                                @enderror
                            </div>
                            <div class="mb-1">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer" id="password-toggle">
                                                <x-icons.eye />
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <div class="row text-center">
                                    <div class="col">
                                        <a type="button" href="{{ route('home') }}" class="btn btn-primary btn-lg">
                                            <x-icons.home1 />
                                        </a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Log in</button>
                                    </div>
                                </div>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ url('/register') }}"
                                        class="link-danger">Register</a></p>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
