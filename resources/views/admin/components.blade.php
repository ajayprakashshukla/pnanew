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


                        <div class="col-md-12">

                            <!-- BEGIN EXAMPLE TABLE PORTLET-->

                            <div class="portlet box green">

                                <div class="portlet-title">

                                    <div class="caption">

                                        <i class="fa fa-globe"></i>All componentss </div>

                                    <div class="tools"> </div>

                                </div>

                                <div class="portlet-body">

                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">

                                        <thead>

                                            <tr>

                                                

                                                <th class="all">SKU</th>

                                                <th class="all">Name</th>

                                                <th class="all">Category</th>

                                                <th class="all">Brand</th>

                                                <th class="all">Type</th>

                                              <!--   <th class="all">View Details</th> -->


                                             </tr>

                                        </thead>

                                        <tbody>

                                           @foreach ($components as $component)

                                            <tr>

                                                <td class="all"> {{ $component ->sku}}</td>

                                                <td class="all"> {{ $component ->name}}</td>
                                                <td class="all"> {{ $component ->category}}</td>

                                                <td class="all"> {{ $component ->brand}}</td>

                                                <td class="all"> {{ $component ->type}}</td>

                                                <!-- <td class="all"> <a class="btn red btn-outline sbold" href="{{ url('components_detail') }}/{{$component ->product_id}}"> View </a> </td> -->

                                   

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