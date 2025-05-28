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
                <div class="col-lg-6 fadeInUp" data-wow-delay="0.3s">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-6">
                                <label>First Name</label>
                                <input type="text" name="firstname" class="form-control" value="{{ old('firstname', Auth::user()->firstname) }}" required>
                            </div>

                            <div class="mb-3 col-6">
                                <label>Last Name</label>
                                <input type="text" name="lastname" class="form-control" value="{{ old('lastname', Auth::user()->lastname) }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Facebook</label>
                                <input type="url" name="facebook" class="form-control" value="{{ old('facebook', Auth::user()->facebook) }}">
                            </div>

                            <div class="mb-3">
                                <label>Instagram</label>
                                <input type="url" name="instagram" class="form-control" value="{{ old('instagram', Auth::user()->instagram) }}">
                            </div>

                            <div class="mb-3">
                                <label>LinkedIn</label>
                                <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', Auth::user()->linkedin) }}">
                            </div>

                            <div class="mb-3">
                                <label>Avatar</label>
                                <input type="file" id="avatar" name="avatar" class="form-control">
                                @if(Auth::user()->avatar)
                                <img src="{{ asset('img/profile-pictures/' . Auth::user()->avatar) }}" class="mt-2" width="100" accept="image/jpeg,image/png">
                                <small id="fileSizeNote" class="text-muted d-block"></small>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <script>
        document.getElementById('avatar').addEventListener('change', function() {
            const file = this.files[0];
            const maxSizeMB = 10;
            const allowedTypes = ['image/jpeg', 'image/png'];
            const preview = document.getElementById('avatarPreview');
            const sizeNote = document.getElementById('fileSizeNote');

            preview.style.display = 'none';
            sizeNote.textContent = '';

            if (file) {
                if (!allowedTypes.includes(file.type)) {
                    alert("Only JPG and PNG images are allowed.");
                    this.value = '';
                } else if (file.size > maxSizeMB * 1024 * 1024) {
                    alert("Image must be less than " + maxSizeMB + "MB.");
                    this.value = '';
                } else {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                        sizeNote.textContent = "File size: " + (file.size / 1024 / 1024).toFixed(2) + " MB";
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    </script>


</x-layout>
