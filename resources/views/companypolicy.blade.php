@extends('layouts.app')
@section('content')
	 <!-- Main content -->
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
        </div>
        <form class="form-horizontal bordered-group" action="/companypolicyupdate" method="POST" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}



           <div class="form-group"> 
            <label class="col-sm-2 control-label"> ABOUT US</label>
             <div class="col-sm-8">
             <!--<textarea type="text" name="description" required class="form-control"></textarea>-->
            <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
   
          <div class="box">
            <div class="box-body pad">
             
                <textarea class="textarea" type="text" name="aboutus" requiredplaceholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$company->aboutus!!}</textarea>
             
            </div>
          </div>
          

          </div>
          </div>

           <div class="form-group"> 
            <label class="col-sm-2 control-label"> CANCELLATION & REFUND POLICY</label>
             <div class="col-sm-8">
             <!--<textarea type="text" name="description" required class="form-control"></textarea>-->
            <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
   
          <div class="box">
            <div class="box-body pad">
             
                <textarea class="textarea" type="text" name="refund" requiredplaceholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$company->refund!!}</textarea>
             
            </div>
          </div>
          

          </div>
          </div>

           <div class="form-group"> 
            <label class="col-sm-2 control-label"> TERMS & CONDITIONS</label>
             <div class="col-sm-8">
             <!--<textarea type="text" name="description" required class="form-control"></textarea>-->
            <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
   
          <div class="box">
            <div class="box-body pad">
             
                <textarea class="textarea" type="text" name="tnc" requiredplaceholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$company->tnc!!}</textarea>
             
            </div>
          </div>
          

          </div>
          </div>

           <div class="form-group"> 
            <label class="col-sm-2 control-label"> PRIVACY POLICY</label>
             <div class="col-sm-8">
             <!--<textarea type="text" name="description" required class="form-control"></textarea>-->
            <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
   
          <div class="box">
            <div class="box-body pad">
             
                <textarea class="textarea" type="text" name="privacy" requiredplaceholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{!!$company->privacy!!}</textarea>
             
            </div>
          </div>
          

          </div>
          </div>

         

         
        <div class="box-footer">
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" class="btn btn-success pull-right">Submit</button>
        </div>

        </form>
      </div>
    </div>
  </div>
@endsection


