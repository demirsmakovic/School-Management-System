@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Edit User</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-12">
                          
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                   <h5>User Name <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                   <input type="text" name="name" class="form-control" value="{{ $user->name }}" required data-validation-required-message="This field is required"> </div>
                                 </div>
                             </div>

                            <div class="col-md-6">
                               <div class="form-group">
                                  <h5>User Email <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                  <input type="email" name="email" class="form-control" value="{{ $user->email }}" required data-validation-required-message="This field is required"> </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                   <h5>User Mobile <span class="text-danger">*</span></h5>
                                   <div class="controls">
                                   <input type="text" name="mobile" class="form-control" value="{{ $user->mobile }}" required data-validation-required-message="This field is required"> </div>
                                 </div>
                             </div>

                            <div class="col-md-6">
                               <div class="form-group">
                                  <h5>User Address <span class="text-danger">*</span></h5>
                                  <div class="controls">
                                  <input type="text" name="address" class="form-control" value="{{ $user->address }}" required data-validation-required-message="This field is required"> </div>
                                </div>
                            </div>
                            
                        </div>
                          
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>User Gender<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="gender" id="select" required class="form-control">
                                        <option value="" selected="" disabled="">Select Gender</option>
                                        <option value="Male" {{ $user->gender == "Male" ? "selected" : "" }}>Male</option>
                                        <option value="Female"  {{ $user->gender == "Female" ? "selected" : "" }}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                               <h5>Profile Image <span class="text-danger">*</span></h5>
                               <div class="controls">
                               <input type="file" id="image" name="image" class="form-control"> </div>
                             </div>
                         
                         <div class="form-group">
                            <div class="controls">
                               <img id="showImage" src="{{ (!empty($user->image)) ? url('upload/user_images/'.$user->image) : url('upload/user_images/no_image.jpg') }}"
                               alt="User Avatar" width="100px" height="100px">
                            </div>
                         </div>
                        </div>
                      </div>
                    
                          
                      <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-info" value="Update">
                      </div>
                  </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
</div>
<!-- /.content-wrapper -->



<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>




@endsection