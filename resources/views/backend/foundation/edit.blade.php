<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('../images/favicon.ico')}}">

    <title>User - Dashboard</title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

<div class="wrapper">

    {{--    Main Header--}}
    @include('frontend.profile.body.header')

    <!-- Left side column. contains the logo and sidebar -->
    {{--    main Sidebar--}}
    @include('frontend.profile.body.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">

                <!-- Basic Forms -->
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Edit Foundation</h4>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col">
                                <form method="post" action="{{route('update.foundation')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$foundations->id}}">
                                    <input type="hidden" name="old_img" value="{{$foundations->image}}">
                                    <div class="row">
                                        <div class="col-12">

                                            {{--                                        start 1st row--}}

                                            {{--                                        end 1st row--}}
                                            {{--                                        start 2nd row--}}
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Foundation name (En) <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="name" class="form-control" required="" value="{{$foundations->name}}" >
                                                            @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Foundation Motto<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="motto" class="form-control" required="" value="{{$foundations->motto}}"  >
                                                            @error('motto')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h5>Foundation Video <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="video_link" class="form-control" required="" value="{{$foundations->video_link}}" >
                                                            @error('video_link')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                            {{--                                        end 2nd row--}}

                                            {{--                                        start 3rd row--}}


                                            {{--                                        end 3rd row--}}
                                            {{--                                        start 4th row--}}

                                            {{--                                        end 4th row--}}

                                            {{--                                        start 5th row--}}

                                            {{--                                        end 5th row--}}

                                            {{--                                        start 6th row--}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Foundation Main Thumbnail <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="file" name="image" class="form-control" onChange="mainThumbnailUrl(this)"   >
                                                            @error('image')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                            <img src="" id="mainThumbnail">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            {{--                                        end 6th row--}}

                                            {{--                                        start 7th row--}}

                                            {{--                                        end 7th row--}}
                                            {{--                                        start 8th row--}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Foundation Description English <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <textarea id="editor1"  rows="10" cols="80" name="description" class="form-control" required placeholder="Enter Description">{!! $foundations->description !!}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            {{--                                        end 8th row--}}






                                        </div>


                                    </div>
                                    <hr>



                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Foundation">
                                    </div>
                                </form>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>



    </div>
    <!-- /.content-wrapper -->
    {{--   Main Footer--}}
    @include('frontend.profile.body.footer')

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->


</div>
<!-- ./wrapper -->


<!-- Vendor JS -->
<script src="{{asset('backend/js/vendors.min.js')}}"></script>
<script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
<script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
<script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

<!-- Sunny Admin App -->
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

        case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

        case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

        case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
    }
    @endif
</script>
<script type="text/javascript">
    function mainThumbnailUrl(input){
        if(input.files && input.files[0]){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumbnail').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



</body>
</html>
