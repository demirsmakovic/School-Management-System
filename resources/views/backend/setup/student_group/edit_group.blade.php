@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      	  

      <!-- Main content -->
      <section class="content">

       <!-- Basic Forms -->
        <div class="box">
          <div class="box-header with-border">
            <h4 class="box-title">Edit Student Group</h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form action="{{ route('student.group.update', $data->id) }}" method="POST">
                    @csrf
                        <div class="col-md-6">
                            <div class="form-group">
                                <h5>Student Group Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                  <input type="text" name="name" class="form-control" value="{{ $data->name }}" required data-validation-required-message="This field is required"> </div>
                                  @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                            </div>
                          </div>
                      
                    
                          
                      <div class="text-xs-right">
                          <input type="submit" class="btn btn-rounded btn-info" value="Submit">
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







@endsection