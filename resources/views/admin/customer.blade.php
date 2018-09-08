@extends('admin.master')

@section('content')

<div class="page-content-wrapper">

                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">

                    <!-- BEGIN PAGE HEADER-->

                    <!-- BEGIN THEME PANEL -->

                    

                    <!-- END THEME PANEL -->

                    <!-- BEGIN PAGE BAR -->

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

                

                   

                    

                    <div class="row">

                      @if ($message = Session::get('success'))

                        <div class="alert alert-success">

                        <p>{{ $message }}</p>

                        </div>

                        @endif

                        <div class="col-md-12">

                            <!-- BEGIN EXAMPLE TABLE PORTLET-->

                            <div class="portlet box green">

                                <div class="portlet-title">

                                    <div class="caption">

                                        <i class="fa fa-globe"></i>All Customers </div>

                                    <div class="tools"> </div>

                                </div>

                                <div class="portlet-body">
                                    
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                <th class="all"> Name</th>

                                                <th class="all" style="width: 250px;">Street</th>

                                                <th class="all">City</th>

                                                <th class="all">State</th>

                                                <th class="all">Zip Code</th>

                                                

                                                

                                                

                                                

                                                

                                            </tr>

                                        </thead>

                                        <tbody>

                                           @foreach ($Customers as $Customer)

                                            <tr>

    <td class="all">{{ $Customer ->name}}</td>

    <td class="all">{{ $Customer ->line1}} {{ $Customer ->line2}}</td>

    <td class="all">{{ $Customer ->city}}</td>

    <td class="all">{{ $Customer ->state}}</td>

    <td class="all">{{ $Customer ->postcode}}</td>

             

                                      </tr>

                                         @endforeach

                                        </tbody>

                                    </table>

                                </div>

                            </div>

                            <!-- END EXAMPLE TABLE PORTLET-->

                        </div>

                        

                    </div>

                </div>

                <!-- END CONTENT BODY -->

            </div>

@endsection