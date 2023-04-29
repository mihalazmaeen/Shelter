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

            <!-- Main content -->
            <section class="content">
                @php
                    $foundation=\App\Models\Foundation::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->count('id');
                    $activity=\App\Models\Activity::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->count('id');
                    $foundation_id=\App\Models\Foundation::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->get('id');
                    $donation=\App\Models\Donation::whereIn('foundation_id',$foundation_id)->sum('amount');
                @endphp
                <div class="row">
                    <div class="col-xl-4 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-warning-light rounded w-60 h-60">
                                    <i class="text-warning mr-0 font-size-24 mdi mdi-car"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Foundations</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{$foundation}}<small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-info-light rounded w-60 h-60">
                                    <i class="text-info mr-0 font-size-24 mdi mdi-sale"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Activity</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{$activity}} <small class="text-danger"><i class="fa fa-caret-down"></i></small></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-danger-light rounded w-60 h-60">
                                    <i class="text-danger mr-0 font-size-24 mdi mdi-phone-incoming"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Donations</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{$donation}} BDT<small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-12">
                        <div class="box">
                            <div class="box-header">
                                <h4 class="box-title align-items-start flex-column">
                                    Latest Donations
                                    <small class="subtitle"></small>
                                </h4>
                            </div>
                            <div class="box-body">
                                @php
                                    $donations=\App\Models\Donation::whereIn('foundation_id',$foundation_id)->with('foundation')->latest()->take(5)->get();

                                @endphp
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Foundation Name</th>
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

                                                <td>{{$item->foundation->name}}</td>
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
                        </div>
                    </div>
                </div>
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


</body>
</html>
