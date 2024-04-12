@extends('layouts.admin_master_deshboard')
@section('title', 'dashboard')

@section('content')
    <div class="container ">
      <br> <br>
        <div class="row page-titles col-12 ">
            <div class=" col-6 align-self-center">
                <h4 class="font-weight-normal">Clinic Page List</h4>
            </div>
            <div class=" row col-6 align-self-left ">
                <div class="col-10"></div>
                <div class="col-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#create_clinic">Create</button>

                    
                </div>
            </div>
        </div> <br> <br>

        <div class="row mt-20px">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title"> </h4>
                        <div class="table-responsive text-black">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Clinic Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>

                                    @foreach ($clinics as $clinic)
                                        <tr>
                                            <td>{{ $i++ }}</td>

                                            <td style="overflow:hidden;white-space: nowrap;">{{ $clinic->name }}</td>
                                            <td style="overflow:hidden;white-space: nowrap;">{{ $clinic->address }}</td>
                                            <td style="overflow:hidden;white-space: nowrap;">{{ $clinic->phone }} </td>
                                            <td class="flex">
                                                <div class="">
                                                </div>
                                                <div class="">
                                                    <a href="#" class="btn btn-sm btn-outline-warning"
                                                        data-toggle="modal" data-target="#edit_clinic{{$clinic->id}}">
                                                        <i class="fas fa-edit"></i></a>
                                                    <a href=" {{route('clinic.delete',$clinic->id)}}" class="btn btn-sm btn-outline-danger"
                                                        id="delete">Delete</a>

                                                </div>
                                            </td>
                                            <div class="modal fade" id="edit_clinic{{$clinic->id}}" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update Clinic Form</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <form class="form-material m-t-40" method="post" action="{{route('clinic.update')}} "
                                                                enctype='multipart/form-data'>
                                                                @csrf
                                                                <input type="hidden" value="{{$clinic->id}} " name="id">
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold">Clinic Name</label>
                                                                    <input type="text" name="name"
                                                                        class="form-control" value="{{$clinic->name}} ">
                                                                </div>
                                                                <div class="form-group">
                                                                  <label class="font-weight-bold"> Address</label>
                                                                  <input type="text" name="address"
                                                                      class="form-control" value="{{$clinic->address}} ">
                                                              </div>
                                                              <div class="form-group">
                                                               <label class="font-weight-bold">Phone</label>
                                                               <input type="number" name="phone"
                                                                   class="form-control" value="{{$clinic->phone}}">
                                                           </div>
                                                                <input type="submit" name="btnsubmit"
                                                                    class="btnsubmit  btn btn-primary" value="Update">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </tr>
                                    @endforeach


                                </tbody>

                            </table>
                        </div>
                    </div>
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
                        <form class="form-material m-t-40" method="post" action="{{ route('clinic.store') }}"
                            enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold ms-2">Clinic Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Enter Address">
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Phone</label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Phone">
                            </div>


                            <input type="submit" name="btnsubmit" class="btnsubmit  btn btn-primary" value="Create">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
