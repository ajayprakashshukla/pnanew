@extends('admin.master')
@section('content')
{!! Html::style(url('/public/assets/global/plugins/select2/css/select2.min.css')) !!}
{!! Html::style(url('/public/assets/global/plugins/select2/css/select2-bootstrap.min.css')) !!}
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
                                <a href="{{url('admin/home')}}">Home</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <a href="#"> Payment Schedule</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Monthly</span>
                            </li>
                        </ul>
                        
                    </div>


                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                
                  <div class="row">

		                  <div class="col-md-12">
		                  	<div class="col-md-2"></div>
	                            <div class="col-md-8" style="border: 8px solid #32c5d2;padding: 24px;margin: 8px;">


                                                 <?php if( !isset($data['search_month'])){
	                                                	$search_month=date('m');
                                                        $search_year=date('Y');	  
	                                                }else{
	                                                	$search_month=$data['search_month'];
                                                        $search_year=$data['search_year'];	  
	                                                }
                                                    ?>
{!! Form::open(['class'=>'register-form','', 'method'=>'post', 'style'=>'display:block']) !!}

            {{ csrf_field() }}

			                  	            <div class="form-group"  >
                                                <label class="control-label col-md-2">Select Month
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-3">
                                                <select id ="search_year" name="search_year" class="form-control select2me ">
                                                 @for($i=2000; $i < 2100; $i++)
                                                 <option {{$i==$search_year?'Selected':''}}> {{$i}}</option>
                                                 @endfor 
                                                 </select>
                                                </div>
                                                <div class="col-md-3">
                                              
	                                                <select id ="search_month" name="search_month" class="form-control select2me ">
	                                                
	                                                 @for($i=1; $i < 13; $i++)
	                                                 <option value="{{$i}}"  {{$i==$search_month?'Selected':''}}> {{date('F', mktime(0, 0, 0, $i))}}</option>
	                                                 @endfor
	                                                 </select>
	                                                

	                                                </div>
	                                                <div class="col-md-3">
	                                                	<button type="submit"  class="btn btn-success">Report</button>
	                                                	</div>
                                                

                                            </div>


                                            </form>
			                    </div>
		                    <div class="col-md-2"></div>

		                  </div>
                  </div>

                    
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
                                        <i class="fa fa-globe"></i>Payment Schedule Monthly </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="all">Company Email</th>
                                                <th class="all">Sharp Id</th>
                                                <th class="all">Due Payment</th>
                                                <th class="">Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($dueData as $data)
                                               <tr>
                                                <td class="all">{{$data['company_email']}}</td>
                                                <td class="all">{{$data['sharp_id']}}</td>
                                                <td class="all">{{$data['due_amount']}}</td>
                                                <td class=""><a href="javascript:void(0);" onclick="userDueWallet('{{$data["company_email"]}}');" class="btn red" >View </a></td>
                                                
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