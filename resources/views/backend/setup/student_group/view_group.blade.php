@extends('admin.admin_master')
@section('admin')



<div class="content-wrapper">
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">
            
           

          <div class="col-12">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Student Group List</h3>
                <a href="{{ route('add.student.group') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student Group</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="10%">SL</th>
                              <th>Name</th>
                              <th width="20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($allData as $key => $class)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $class->name }}</td>
                            <td>
                              <a href="{{ route('student.group.edit', $class->id) }}" class="btn btn-info">Edit</a>
                              <a href="{{ route('student.group.delete', $class->id) }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                          @endforeach
                          
                          
                      </tbody>
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

                     
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>
</div>
<!-- /.content-wrapper -->
             


    
@endsection