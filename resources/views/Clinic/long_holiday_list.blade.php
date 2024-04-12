@extends('layouts.admin_master_deshboard')
@section('title', 'dashboard')

@section('content')
<div class="container mt-8">
    <div class="row col mt-20">
        <div class="col-4">
         {{-- Clinic Schedule --}}
         {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#create_clinic">Addff Schedule</button> --}}
         <div class=""> <label for=""> Clinic Long Holiday</label></div>

        </div>
        
        <div class="row col-8">
           <div class="col-6">
           </div>
           <div class="row col-6">
            <div class="col-5">
                {{-- <div class=""> <label for="">Select Clinic</label></div> --}}

            </div>
            
            
           </div>
        </div>
      </div>
       <div class="container">
                 <div class="row col-12">
                    <div class="row mt-20px">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h4 class="card-title"> </h4>
                                    <div class="table-responsive text-black">
                                        <form action="{{route('clinic.long_holiday_store')}} " method="post">
                                            @csrf
                                            <div class="row col-12">
                                               
                                                <div class="col-2">
                                                    <select class="form-control select2 m-b-10 @error('clinic_id') is-invalid
                                                    @enderror "  name="clinic_id" style="width: 100%" >
                                                        @foreach($clinics as $clinic)
                                                        <option value="{{$clinic->id}}"  >{{$clinic->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('clinic_id')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                    
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <input type="date" class="form-control  @error('start_date') is-invalid
                                                    @enderror " name="start_date"
                                                 value=" " >
                                                 @error('start_date')
                                                 <div class="invalid-feedback">
                                                     {{$message}}
                                                 </div>
                 
                                                 @enderror
                                                </div>
                                                        -
                                                <div class="col-3">
                                                    <input type="date" class="form-control  @error('end_date') is-invalid
                                                    @enderror " name="end_date" value="" >
                                                    @error('end_date')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                    
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" class="form-control  @error('reason') is-invalid
                                                    @enderror" name="reason"
                                                    value="" placeholder="Remark" >
                                                    @error('reason')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                    
                                                    @enderror
                                                </div>
                                                <div class="row col-1">
                                                    <div class="" style="width:6px;">
                                                        <button class="btn btn-primary">Save</button>
                                                    </div>     
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>  
                                    
                                </div>
                                
                                
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">

                                    <h4 class="card-title"> </h4>
                                    <div class="table-responsive text-black">
                                        @foreach($long_holidays as $long_holiday)
                                        <div class="row col-12">
                                               
                                            <div class="col-2">
                                                <p>
                                                    {{$long_holiday->clinic->name}}
                                                </p>
                                               
                                            </div>
                                            <div class="col-3">
                                                <input type="date" class="form-control" value="{{$long_holiday->start_date}}" >
                                             
                                            </div>
                                                    -
                                            <div class="col-2">
                                                <input type="date" class="form-control"  value="{{$long_holiday->end_date}}" >
                                                
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control " name="reason"
                                                value="{{$long_holiday->reason}} " placeholder="Remark" >
                                                
                                            </div>
                                            <div class="row col-1">
                                                <div class="" style="width:4px;">
                                                    <a href="#" class="btn btn-sm btn-outline-warning"
                                                    data-toggle="modal" data-target="#edit_clinic_longholiday{{$long_holiday->id}}">
                                                    <i class="fas fa-edit"></i></a>
                                                <a href=" {{route('clinic.long_holiday_delete',$long_holiday->id)}}" class="btn btn-sm btn-outline-danger"
                                                    id="delete">Delete</a>
                                                </div>     
                                            </div>
                                            
                                        </div>
                                        {{-- update --}}
                                        
                                        <div class="modal fade" id="edit_clinic_longholiday{{$long_holiday->id}}" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Clinic Time Form</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                            
                                                <div class="modal-body">
                                                    <form class="form-material m-t-40" method="post" action="{{route('clinic.long_holiday_update')}} "
                                                        enctype='multipart/form-data'>
                                                        @csrf
                                                        <input type="hidden" value="{{$long_holiday->id}} " name="id">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold ms-2">Select Clinic</label>
                            
                                                            <select class="form-control select2 m-b-10 @error('clinic_id') is-invalid
                                                            @enderror "  name="clinic_id" style="width: 100%" >
                                                                @foreach($clinics as $clinic)
                                                                <option value="{{$clinic->id}}" @if($long_holiday->clinic_id === $clinic->id) selected='selected' @endif >{{$clinic->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('clinic_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                            
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold ms-2">Start Date</label>
                                                            <input type="text" name="start_date" class="form-control @error('start_date') is-invalid
                                                            @enderror" value="{{$long_holiday->start_date}} ">
                                                            @error('start_date')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                            
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold ms-2">End Date</label>
                                                            <input type="text" name="end_date" class="form-control @error('end_date') is-invalid
                                                            @enderror" value="{{$long_holiday->end_date}} ">
                                                            @error('end_date')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                            
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">Remark</label>
                                                            <input type="text" name="reason" class="form-control @error('reason') is-invalid
                                                            @enderror" value="{{$long_holiday->reason}}">
                                                            @error('reason')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                            
                                                            @enderror
                                                        </div>
                            
                            
                                                        <input type="submit" name="btnsubmit" class="btnsubmit  btn btn-primary" value="Update">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        {{-- update end --}}
                                        @endforeach
                                        
                                    </div>  
                                    
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </div>
                 </div>
                 
       </div>
  </div>

@endsection
