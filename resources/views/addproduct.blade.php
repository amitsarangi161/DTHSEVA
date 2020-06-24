@extends('layouts.app')
@section('content')
	 <!-- Main content -->
  <div class="row">
    <div class="col-md-12">
      <div class="box box-danger">
        <div class="box-header">
        </div>
        <form class="form-horizontal bordered-group" action="/psetup/product" method="POST" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}

           <div class="form-group"> 
            <label class="col-sm-2 control-label"> Select a Brand</label>
            <div class="col-sm-8"> 
              <select type="text" name="brandid" id="brandid" class="form-control" required> 
                 <option value="">SELECT A BRAND</option>
                 @foreach($brands as $key => $brand) 
                  <option value="{{ $brand->id }}">{{ $brand->brandname }}</option>
                  @endforeach
               </select>
            </div>
          </div>
          <div class="form-group"> 
            <label class="col-sm-2 control-label">Product Name</label>
            <div class="col-sm-8"> <input class="form-control" name="productname" placeholder="Enter Product name" id="productname"></div>
          </div>
          
          <div class="form-group"> 
            <label class="col-sm-2 control-label">Product Cost</label>
            <div class="col-sm-8"> <input class="form-control" name="cost" id="basecost" placeholder="Enter product Cost"></div>
          </div>
           <div class="form-group"> 
            <label class="col-sm-2 control-label"> Promo-Cost</label>
            <div class="col-sm-8"> <input type="text" name="promocost" value="" required class="form-control"></div>
          </div> 
          <div class="form-group"> 
            <label class="col-sm-2 control-label">Booking Cost</label>
            <div class="col-sm-8"> <input type="text" name="bookingamount" value="" required class="form-control"></div>
          </div>

          <div class="form-group"> 
            <label class="col-sm-2 control-label">Installation Amount</label>
            <div class="col-sm-8"> <input type="text" name="installamt" value="" required class="form-control"></div>
          </div>

           <div class="form-group"> 
            <label class="col-sm-2 control-label"> Description</label>
             <div class="col-sm-8">
             <!--<textarea type="text" name="description" required class="form-control"></textarea>-->
            <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
   
          <div class="box">
            <div class="box-body pad">
             
                <textarea class="textarea" type="text" name="fulldescription" requiredplaceholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
            </div>
          </div>
          

          </div>
          </div>
           <div class="form-group"> 
            <label class="col-sm-2 control-label"> Keypoints</label>
           <div class="col-sm-8">
            <textarea type="text" name="shortdescription" required class="form-control"></textarea>
          </div>
          </div>
              <div class="form-group">
                      <label class="col-sm-2 control-label">Cashback by Type</label>
                      <div class="col-sm-8">
                          <select class="form-control" name="cashback_by_type" id="cashback_by_type" onchange="validatevalue()">
                              <option value="">Select a Cashback By Type</option>
                              
                              <option value="FLAT">FLAT</option>
                              <option value="PERCENTAGE">PERCENTAGE</option>
                          </select>
                      </div>
                    </div>

                 <div class="form-group">
                      <label class="col-sm-2 control-label">Cashback Value</label>
                      <div class="col-sm-8">
                          <input type="text" class="form-control" name="cashback_value" id="cashback_value" placeholder="Enter Cashback Value" autocomplete="off">
                      </div>
                    </div>                    


           <div class="form-group">
                      <label class="col-sm-2 control-label">Cover Image</label>
                      <div class="col-sm-8">
                        <input name="image1" type="file" onchange="readURL(this);">
                        <p class="help-block">Upload .png, .jpg or .jpeg image files only</p>
                        <img style="height:70px;width:95px;" alt="noimage"  src="{{ asset('/img/productimage/dflt.jpeg')}}" id="imgshow">
                      </div>
                    </div>
            <div class="form-group">
                      <label class="col-sm-2 control-label"> Image-1</label>
                      <div class="col-sm-8">
                        <input name="image2" type="file" onchange="readURL1(this);">
                        <p class="help-block">Upload .png, .jpg or .jpeg image files only</p>
                        <img style="height:70px;width:95px;" alt="noimage"  src="{{ asset('/img/productimage/dflt.jpeg')}}" id="imgshow1">
                      </div>
                    </div>
            <div class="form-group">
                      <label class="col-sm-2 control-label"> Image-2</label>
                      <div class="col-sm-8">
                        <input name="image3" type="file" onchange="readURL2(this);">
                        <p class="help-block">Upload .png, .jpg or .jpeg image files only</p>
                        <img style="height:70px;width:95px;" alt="noimage"  src="{{ asset('/img/productimage/dflt.jpeg')}}" id="imgshow2">
                      </div>
                    </div>
            <div class="form-group">
                      <label class="col-sm-2 control-label"> Image-3</label>
                      <div class="col-sm-8">
                        <input name="image4" type="file" onchange="readURL3(this);">
                        <p class="help-block">Upload .png, .jpg or .jpeg image files only</p>
                        <img style="height:70px;width:95px;" alt="noimage"  src="{{ asset('/img/productimage/dflt.jpeg')}}" id="imgshow3">
                      </div>
                    </div>
          
         

         
        <div class="box-footer">
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" class="btn btn-success pull-right" onclick="return confirm('Do You want to Save this Product?')">Submit</button>
        </div>

        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function validatevalue()
    {
       var cashback_by_type=$("#cashback_by_type").val();
       if(cashback_by_type!='')
       {
           $("#cashback_value").prop('required',true);
       }
       else
       {
           $("#cashback_value").prop('required',false);
       }
    }
  function readURL(input) {
    

       if (input.files && input.files[0]) {
            var reader = new FileReader();
              
            reader.onload = function (e) {
                $('#imgshow')
                    .attr('src', e.target.result)
                    .width(95)
                    .height(70);
          
            };

            reader.readAsDataURL(input.files[0]);

        }
    } function readURL1(input) {
    

       if (input.files && input.files[0]) {
            var reader = new FileReader();
              
            reader.onload = function (e) {
                $('#imgshow1')
                    .attr('src', e.target.result)
                    .width(95)
                    .height(70);
          
            };

            reader.readAsDataURL(input.files[0]);

        }
    } function readURL2(input) {
    

       if (input.files && input.files[0]) {
            var reader = new FileReader();
              
            reader.onload = function (e) {
                $('#imgshow2')
                    .attr('src', e.target.result)
                    .width(95)
                    .height(70);
          
            };

            reader.readAsDataURL(input.files[0]);

        }
    } function readURL3(input) {
    

       if (input.files && input.files[0]) {
            var reader = new FileReader();
              
            reader.onload = function (e) {
                $('#imgshow3')
                    .attr('src', e.target.result)
                    .width(95)
                    .height(70);
          
            };

            reader.readAsDataURL(input.files[0]);

        }
    }
  </script>
@endsection


