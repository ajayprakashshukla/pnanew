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
                                        <i class="fa fa-globe"></i>All User </div>
                                    <div class="tools">
                                       
                                    
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                
                                                <th class="all">Serial No#</th>
                                                <th class="all">Name</th>
                                                <th class="all">Email</th>
                                                <th class="all">Password</th>
                                                
                                              
                                            <!--      <th class="all">DefaultLocation</th>
                                                <th class="all">LastModifiedOn</th>-->
                                             </tr>
                                        </thead>
                                        <tbody>
                                           <?php $i=0;?>
                                           @foreach ($users as $userss)
                                            <tr>
                                                <td class="all"> {{ ++$i}}</td>
                                                <td class="none">{{ $userss ->name}}</td>
                                                <td class="none">{{ $userss ->email}}</td>
                                          <td class="none">{{ $userss ->show_password}}</td>
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
                
                
                    <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
                                        <div class="modal-dialog"> 
                                             {!! Form::open(['class'=>'form-horizontal form-bordered','', 'method'=>'post','files'=>true]) !!}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                    <h4 class="modal-title">Modal Title</h4>
                                                </div>
                                                <div class="modal-body">
                                
                                 
                                        <div class="form-body">
                                          <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Date:</label>
                                            <div class="col-sm-10"> 
                                             <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                                 <input type="text" name="dates" class="form-control" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
                                            </div>
                                          </div>      
                                            
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Invoice Number:</label>
                                            <div class="col-sm-10"> 
                                                <input type="text" class="form-control" name="invoice_no" id="Invoice" placeholder="">
                                            </div>
                                          </div>                                            
                                        <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Serial #:</label>
                                            <div class="col-sm-10"> 
                                                <input type="text" class="form-control"  name="serial_no" readonly id="Serial" placeholder="">
                                            </div>
                                          </div>
                                           <div class="form-group">
                                            <label class="control-label col-sm-2" for="pwd">Upload files:</label>
                                            <div class="col-sm-10"> 
                                                <input type="file" name="files" class="form-control" id="Upload" placeholder="">
                                            </div>
                                          </div>
                                            
                                            
                                        </div>
                                                                                  
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <input  type="submit" class="btn green" value="Save changes">
                                                </div>
                                            </div>
                                            
                                              {!! Form::close() !!}
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                
                <!-- END CONTENT BODY -->
            </div>



@endsection