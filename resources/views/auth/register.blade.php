<x-layout>
    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="mx-auto">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-6 col-md-2">
                                    <x-form-label for="role">Role <span class="text-danger">*</span></x-form-label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="student">Student</option>
                                        <option value="instructor">Instructor</option>
                                    </select>
                                    <x-form-error name="role" />
                                </div>

                                <div class="col-6 col-md-5">
                                    <x-form-label for="firstname">First name<span class="text-danger">*</span></x-form-label>
                                    <x-form-input id="firstname" name="firstname" placeholder="Firstname" value="{{ old('firstname') }}" autocomplete="firstname"  minlength="3" maxlength="20" required />
                                    <x-form-error name="firstname" />
                                </div>

                                <div class="col-6 col-md-5">
                                    <x-form-label for="lastname">Last name <span class="text-danger">*</span></x-form-label>
                                    <x-form-input type="text" id="lastname" name="lastname" placeholder="Lastname" value="{{ old('firstname') }}" minlength="3" maxlength="20" required />
                                    <x-form-error name="lastname" />
                                </div>
                            </div>
                            <div class="mb-1">
                                <label for="email" class="form-label">E-mail</label>
                                <x-form-input name="email" type="email" placeholder="example@example.com" value="{{ old('email', session('last_user_email', ''))}}" required autocomplete="email" autofocus />
                                <x-form-error name="email" />
                            </div>
                            <div class="row">
                                <div class="col-6 mb-1">
                                    <x-form-label for="password">Password</x-form-label>
                                    <x-form-input id="password" type="password" placeholder="*********" name="password" required autocomplete="current-password" />
                                    <x-form-error name="password" />
                                </div>
                                <div class="col-6 mb-1">
                                    <x-form-label for="password_confirmation">Password confirmation</x-form-label>
                                    <x-form-input id="password_confirmation" type="password" placeholder="*********" name="password_confirmation" required />
                                    <x-form-error name="password_confirmation" />
                                </div>
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
                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Log in</button>
                                    </div>
                                </div>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ url('/register') }}" class="link-danger">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
