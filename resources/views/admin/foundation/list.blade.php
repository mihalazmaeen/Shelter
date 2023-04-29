@extends('admin.main_master')
@section('admin')
    <div class="container-full">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">All Foundations</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Motto</th>
                                        <th>Description</th>
                                        <th>Video</th>
                                        <th>Aprrove Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($foundations as $item)
                                        <tr>
                                            <td><img src="{{asset($item->image)}}" style="width: 60px; height: 50px"></td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->motto}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>
                                                {{$item->video_link}}
                                            </td>
                                            <td>
                                                @if ($item->approved == NULL)
                                                    <span class="badge badge-pill badge-danger">Pending</span>
                                                @else
                                                    <span class="badge badge-pill badge-success">Approved</span>

                                                @endif
                                            </td>


                                            <td width="15%">

                                                <a href="{{route('approve.foundation',$item->id)}}" class="btn btn-info" title="approve foundation"><i class="fa fa-arrow-up"></i></a>
                                                <a href="{{route('delete.foundation',$item->id)}}" id="delete" class="btn btn-danger" title="Delete Foundation"><i class="fa fa-trash"></i></a>

                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->




            </div>
            <!-- /.row -->
        </section>

        <!-- Main content -->

        <!-- /.content -->
    </div>
@endsection
