@extends('layouts.admin_master_deshboard')
@section('title', 'dashboard')

@section('content')
  <div class="container mt-8">
    <div class="row col mt-20">
        <div class="col-4">
         {{-- Clinic Schedule --}}
         {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#create_clinic">Addff Schedule</button> --}}
         <div class=""> <label for=""> Clinic Schedule</label></div>

        </div>
        <div class="modal fade" id="create_clinic" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Clinic Time Form</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form class="form-material m-t-40" method="post" action="{{route('clinic.time_store')}} "
                            enctype='multipart/form-data'>
                            @csrf
                            
                            <div class="form-group">
                                <label class="font-weight-bold ms-2">Select Clinic</label>

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
                            <div class="form-group">
                                <label class="font-weight-bold ms-2">Clinic Day Name</label>
                                <input type="text" name="day_of_week" class="form-control @error('day_of_week') is-invalid
                                @enderror" placeholder="Enter Day of week">
                                @error('day_of_week')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Opening Hour</label>
                                <input type="time" name="opening_hour" class="form-control " placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Closing Hour</label>
                                <input type="time" name="closing_hour" class="form-control" placeholder="Enter Phone">
                            </div>


                            <input type="submit" name="btnsubmit" class="btnsubmit  btn btn-primary" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row col-8">
           <div class="col-6">
           </div>
           <div class="row col-6">
            <div class="col-5">
                {{-- <div class=""> <label for="">Select Clinic</label></div> --}}

            </div>
            <div class="col-7 mb-4">
                <button class="btn btn-primary" data-toggle="modal" data-target="#create_clinic">Add Schedule</button>
                {{-- <select class="form-control select2 m-b-10" name="category_id" style="width: 100%"  onchange="showSubCategoryUpdate(this.value)">
                    @foreach($clinics as $clinic)
                    <option value="{{$clinic->id}}"  >{{$clinic->name}}</option>
                    @endforeach
                </select> --}}
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
                                    @foreach($clinic_times as $clinic_time)
                                   @if ($clinic_time->is_holiday == "1")
                                   <div class="table-responsive text-black">
                                    <div class="row col-12">
                                        <div class="col-2">
                                            <label for="">{{$clinic_time->day_of_week}} </label>
            
                                        </div>

                                        <div class="col-7" style="width:4px;">
                                          
                                                <input type="text" class="col-12 btn btn-sm btn-outline-danger" value="Holiday">
                                        </div>
                                        
                                        <div class="row col-3">
                                            <div class="col-4" style="width:4px;">
                                                <a href="#" class="btn btn-sm btn-outline-warning" 
                                                   data-toggle="modal" data-target="#edit_clinic_time{{$clinic_time->id}}">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="col-4" style="width:4px;">
                                                <a href=" {{route('clinic.time_delete',$clinic_time->id)}}" class="btn btn-sm btn-outline-danger"
                                                    id="delete">Delete</a>
                                            </div>
                                            
                                            @if($clinic_time->is_holiday == "1")
                                            <div class="col-4" style="width:6px;">
                                                <a href="{{route('clinic.holiday_change',$clinic_time->id)}} " class="btn btn-sm btn-outline-success" >
                                                    Holiday
                                                </a>
                                            </div>
                                            @else 
                                            <div class="col-4" style="width:6px;">
                                                <a href="#" class="btn btn-sm btn-outline-primary" 
                                                   data-toggle="modal" data-target="#edit_clinic{{$clinic->id}}">
                                                    Weekday
                                                </a>
                                            </div>
                                            @endif
                                            
                                        </div>
                                        
                                    </div>
                                </div>   
                                    @else
                                    <div class="table-responsive text-black">
                                        <div class="row col-12">
                                            <div class="col-2">
                                                <label for="">{{$clinic_time->day_of_week}} </label>
                
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" name="wt"
                                             value="{{$clinic_time->opening_hour}} " disabled>
                                            </div>
                                            <div class="col-1">
                                                -
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" name="wt"
                                                value="{{$clinic_time->closing_hour}} " disabled>
                                            </div>
                                            <div class="row col-3">
                                                <div class="col-4" style="width:4px;">
                                                    <a href="#" class="btn btn-sm btn-outline-warning" 
                                                       data-toggle="modal" data-target="#edit_clinic_time{{$clinic_time->id}}">
                                                        Edit
                                                    </a>
                                                </div>
                                                <div class="col-4" style="width:4px;">
                                                    <a href=" {{route('clinic.time_delete',$clinic_time->id)}}" class="btn btn-sm btn-outline-danger"
                                                        id="delete">Delete</a>
                                                </div>
                                                
                                                @if($clinic_time->is_holiday == "1")
                                                <div class="col-4" style="width:6px;">
                                                    <a href="#" class="btn btn-sm btn-outline-success" 
                                                       data-toggle="modal" data-target="#edit_clinic{{$clinic->id}}">
                                                        Holiday 
                                                    </a>
                                                </div>
                                                @else 
                                                <div class="col-4" style="width:6px;">
                                                    <a href="{{route('clinic.holiday_change1',$clinic_time->id)}} " class="btn btn-sm btn-outline-primary" >
                                                        Weekday
                                                    </a>
                                                </div>
                                                @endif
                                                
                                            </div>
                                            
                                        </div>
                                    </div>  
                                    @endif

                              
                                    {{-- //update --}}
                                    <div class="modal fade" id="edit_clinic_time{{$clinic_time->id}}" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Clinic Time Form</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                            
                                                <div class="modal-body">
                                                    <form class="form-material m-t-40" method="post" action="{{route('clinic.time_update')}} "
                                                        enctype='multipart/form-data'>
                                                        @csrf
                                                        <input type="hidden" value="{{$clinic_time->id}} " name="id">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold ms-2">Select Clinic</label>
                            
                                                            <select class="form-control select2 m-b-10 @error('clinic_id') is-invalid
                                                            @enderror "  name="clinic_id" style="width: 100%" >
                                                                @foreach($clinics as $clinic)
                                                                <option value="{{$clinic->id}}" @if($clinic_time->clinic_id === $clinic->id) selected='selected' @endif >{{$clinic->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('clinic_id')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                            
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold ms-2">Clinic Day Name</label>
                                                            <input type="text" name="day_of_week" class="form-control @error('day_of_week') is-invalid
                                                            @enderror" value="{{$clinic_time->day_of_week}} ">
                                                            @error('day_of_week')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                            
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">Opening Hour</label>
                                                            <input type="time" name="opening_hour" class="form-control " value="{{$clinic_time->opening_hour}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">Closing Hour</label>
                                                            <input type="time" name="closing_hour" class="form-control" value="{{$clinic_time->closing_hour}}">
                                                        </div>
                            
                            
                                                        <input type="submit" name="btnsubmit" class="btnsubmit  btn btn-primary" value="Update">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                                
                                
                            </div>
                            
                        </div>
                    </div>
                 </div>
                 
       </div>
  </div>

@endsection
