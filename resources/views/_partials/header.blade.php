        <div class="row align-items-center">
            <div class="col-auto">
                <span class="avatar avatar-md"
                    style="
            background-image: url(https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png);
            background-size: cover;
            background-position: top;
          "></span>
            </div>
            <div class="col">
                <h2 class="page-title">{{ Auth::guard(session('role'))->user()->nama }}</h2>
                <div class="page-subtitle">
                    <div class="row">
                        <div class="col-auto">
                            {{ Auth::guard(session('role'))->user()->{session('role') == 'mahasiswa' ? 'nim' : 'nik'} }}
                        </div>
                        <div class="col-auto">
                            @if (session('role') == 'mahasiswa')
                                {{ Auth::guard('mahasiswa')->user()->prodi->nama }}
                            @else
                            {{ ucwords(session('role')) }}
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
