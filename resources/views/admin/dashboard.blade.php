@extends('admin.master')

@section('content')



<!-- BEGIN CONTENT -->

<div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->

    <div class="page-content">

     

        

                                <div class="note note-success hide">

                                        <h4 class="block transactions_succes_msg">3ed</h4>

                                    </div>

        

        

        <div class="page-bar">

            <ul class="page-breadcrumb">

                <li>

                    <a href="{{url('dashboard')}}">Dashboard</a>

                    <i class="fa fa-circle"></i>

                </li>


            </ul>

            

        </div>

        <!-- END PAGE BAR -->

        <!-- BEGIN PAGE TITLE-->

        <h3 class="page-title"> Dashboard

          

        </h3>

        <!-- END PAGE TITLE-->

        <!-- END PAGE HEADER-->

        <!-- BEGIN DASHBOARD STATS 1-->

        <div class="row">

                       @if ($message = Session::get('success'))

                        <div class="alert alert-success">

                        <p>{{ $message }}</p>

                        </div>

                        @endif

                           

                        

                        @foreach($transactions_types as $transactions_type )

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">

                            <a class="dashboard-stat dashboard-stat-v2 {{$a[array_rand($a)] }}" href="#"  data-toggle="modal" data-target="#myModal"  onclick="load_form({{$transactions_type->id}},'{{$transactions_type->name}}');">

                                <div class="visual">

                                    <i class="fa fa-comments"></i>

                                </div>

                                <div class="details">

                                    <div class="number">

<!--                                        <span data-counter="counterup" data-value="1349">0</span>-->

                                    </div>

                                    <div class="desc"> {{$transactions_type->name}} </div>

                                </div>

                            </a>

                        </div>

                        @endforeach

         

        </div>

        <div class="clearfix"></div>

    </div>

    <!-- END CONTENT BODY -->

</div>

@endsection