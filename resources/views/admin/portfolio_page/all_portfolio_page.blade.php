@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Portfolio</h4>
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
                                    <h4 class="card-title">Portfolio All</h4>
                                </div>
                                <div class="col-6">
                                    <a href="{{route('add.portfolio')}}" class="btn btn-info sm" style="float: right">Add Portfolio</a>
                                </div>
                            </div>

                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Portfolio Name</th>
                                        <th>Portfolio Title</th>
                                        <th>Portfolio Image</th>
                                        {{-- <th>Portfolio Description</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @php($i = 1)
                                    @foreach ($allPortfolio as $portfolio)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{$portfolio->portfolio_name}}</td>
                                            <td>{{$portfolio->portfolio_title}}</td>
                                            <td>
                                                <img src="{{ !empty($portfolio->portfolio_image) ? asset('/') . $portfolio->portfolio_image : asset('backend\assets\images\no_image.jpg') }}"
                                                style="width: 60px; height:50px" alt="Card image cap">
                                            </td>
                                            {{-- <td>{!! $portfolio->portfolio_description !!}</td> --}}
                                            <td>
                                                
                                                <a href="{{ route('edit.portfolio', $portfolio->id) }}" class="btn btn-info sm" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('delete.portfolio', $portfolio->id) }}" class="btn btn-danger sm" id="delete" title="Delete"><i class=" fas fa-trash"></i></a>
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
