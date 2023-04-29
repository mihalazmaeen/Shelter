<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('../images/favicon.ico')}}">

    <title>Admin - Dashboard</title>

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
    @include('admin.body.header')

    <!-- Left side column. contains the logo and sidebar -->
    {{--    main Sidebar--}}
    @include('admin.body.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <div class="container-full">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">All Donations</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            {{-- <th>Foundation Name</th> --}}
                                            <th>Donor Name</th>
                                            <th>Donor Phone</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                            <th>TID</th>
                                            <th>Date</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($donations as $item)
                                            <tr>

                                                {{-- <td>{{$item->foundation->name}}</td> --}}
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->phone}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>
                                                    {{$item->card ==1 ? 'Card' : 'Bkash' }}
                                                </td>
                                                <td>
                                                    {{$item->card_transaction != NULL ? $item->card_transaction : $item->bkash_transaction }}
                                                </td>
                                                <td>
                                                    {{$item->created_at->format('jS \\of F Y h:i:s A') }}
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



    </div>
    <!-- /.content-wrapper -->
    {{--   Main Footer--}}
    @include('admin.body.footer')

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

<script type="text/javascript">
    $(function(){
        $(document).on('click','#delete', function(e){
            e.preventDefault();
            let link=$(this).attr('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=link;
                    Swal.fire(
                        'Deleted!',
                        'Selected data has been deleted.',
                        'success'
                    )
                }
            })
        })
    })

</script>


</body>
</html>
