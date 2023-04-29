@extends('admin.main_master')
@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @php
            $foundation=\App\Models\Foundation::count('id');
            $activity=\App\Models\Activity::count('id');
            $donation=\App\Models\Donation::sum('amount');
            $user=\App\Models\User::count('id');
            @endphp
            <div class="col-xl-3 col-6">
                <div class="box overflow-hidden pull-up">
                    <div class="box-body">
                        <div class="icon bg-primary-light rounded w-60 h-60">
                            <i class="text-primary mr-0 font-size-24 mdi mdi-account-multiple"></i>
                        </div>
                        <div>
                            <p class="text-mute mt-20 mb-0 font-size-16">Users</p>
                            <h3 class="text-white mb-0 font-weight-500">{{$user}}<small class="text-success"><i class="fa fa-caret-up"></i></small></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-6">
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
            <div class="col-xl-3 col-6">
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
            <div class="col-xl-3 col-6">
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
                            $donations=\App\Models\Donation::with('foundation')->latest()->take(5)->get();

                        @endphp
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
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection
