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
                <h3 class="box-title">Fee Amount List</h3>
                <a href="{{ route('add.fee.amount') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Fee Amount</a>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th width="10%">SL</th>
                              <th>Fee Category</th>
                              <th width="20%">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($allData as $key => $amount)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $amount['fee_cateogry']['name'] }}</td>
                            <td>
                              <a href="{{ route('fee_amount.edit', $amount['fee_cateogry']['id']) }}" class="btn btn-info">Edit</a>
                              <a href="" class="btn btn-danger" id="delete">Delete</a>
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