@extends('layouts.admin_master_deshboard')
@section('title','dashboard')

@section('content')
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Admin Change Password</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password </li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">

                <div class="col-lg-12">
                    {{-- <div class=""></div> --}}
                    <form action="{{route('admin.updatePassword')}}" method="POST" >
                        @csrf
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 ms-2">Old Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="oldPassword" class="form-control @error('oldPassword') is-invalid
                                    @enderror " value="" placeholder="Enter Old Passsword" mt-2 />
                                    @error('oldPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 ms-2">New Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="newPassword" class="form-control @error('newPassword') is-invalid
                                    @enderror " value="" placeholder="Enter New Passsword" />
                                    @error('newPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0 ms-2">Confirm Password</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') is-invalid
                                    @enderror " value=""  placeholder="Enter Confirm Passsword"/>
                                    @error('confirmPassword')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- <div class="card">

                    </div> --}}

                </div>
                            </div>
                            <hr>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
