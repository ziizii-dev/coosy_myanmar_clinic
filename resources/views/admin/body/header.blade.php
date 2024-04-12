<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative search-bar-box">

                </div>
            </div>
           
            
            @php
                 $adminData =App\Models\User::where('id',Auth::user()->id)->first();
            @endphp
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <input type="text" disabled value="{{$adminData->email}} ">
            <img src="{{(!empty($adminData->profile_photo_path))? url('upload/admin_images/'.$adminData->profile_photo_path) : url('upload/default_image.png')}}"  style="width:60px;height:60px" class="user-img" alt="user avatar">
                    

                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{route('admin.profile')}} "><i class="bx bx-user"></i><span>Profile</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('admin.changePassword')}}"><i class="bx bx-lock"></i><span>Change Password</span></a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('admin.logout')}}"><i class='bx bx-home-circle'></i><span>Logout</span></a>
                    </li>
                   
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    {{-- <li><a class="dropdown-item" href="{{route('admin.logout')}} "><i class='bx bx-log-out-circle'></i><span>Logout</span></a> --}}
                    </li>
                </ul>
            </div>


        </nav>
    </div>
</header>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> --}}

