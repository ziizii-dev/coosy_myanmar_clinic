
@extends('layouts.admin_master_deshboard')

@section('title','dashboard')

@section('content')
<div class="container">
    <div class="">
        <div class="col-12 row" style="margin-top:200px;">
           
            <div class="col-4">
                <a href="{{ route('clinic.list') }}" class="menu-title btn btn-light w-20px d-flex justify-content-center align-items-center" style="border: 1px solid blue;">
                    <div style="color: blue;">Clinic Lists</div>
                </a>
                
                
            </div>
        </div>
    </div>
    <div class="">
        <div class="col-12 row" style="margin-top:200px;">
            <div class="col-4">
                <a href="{{ route('clinic.schedule') }}" class="menu-title btn btn-light w-20px d-flex justify-content-center align-items-center"  style="border: 1px solid blue;">
                    <div style="color: blue;">Clinic Schedule</div>
                </a>
            </div>

            <div class="col-4">   
                
                    <a href="{{ route('clinic.long_holiday') }}" class="menu-title btn btn-light w-20px d-flex justify-content-center align-items-center" style="border: 1px solid blue;">
                        <div style="color: blue;">Clinic Long Holiday</div>
                    </a>
                    
               
            </div>
        </div>
    </div>
    <div class="modal fade" id="create_clinic" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Clinic Form</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-material m-t-40" method="post" action="{{ route('clinic.day') }}"
                        enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold ms-2">Day Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid
                            @enderror" placeholder="Enter Name">
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        </div>                   
                        <input type="submit" name="btnsubmit" class="btnsubmit  btn btn-primary" value="Create">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection