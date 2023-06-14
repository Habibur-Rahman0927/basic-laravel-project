@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Multi Image</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <h4 class="card-title">Multi Image All</h4>
                                </div>
                                <div class="col-6">
                                    <a href="{{route('about.multi.image')}}" class="btn btn-info sm" style="float: right">Add Multi Image</a>
                                </div>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @php($i = 1)
                                    @foreach ($allMultiImage as $image)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                <img src="{{ !empty($image->multi_image) ? asset('/') . $image->multi_image : asset('backend\assets\images\no_image.jpg') }}"
                                                    style="width: 60px; height:50px" alt="Card image cap">
                                            </td>
                                            <td>
                                                
                                                <a href="{{ route('edit.multi.image', $image->id) }}" class="btn btn-info sm" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('delete.multi.image', $image->id) }}" class="btn btn-danger sm" id="delete" title="Delete"><i class=" fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection
