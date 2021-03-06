@extends('admin.admin_master')
@section('admin')



<div class="content-wrapper">
    <div class="container-full">
     

      <!-- Main content -->
      <section class="content">
        <div class="row">

    <div class="col-12">
       <div class="box bb-3 border-warning">
       <div class="box-header">
          <h4 class="box-title">Student <strong>Search</strong></h4>
       </div>
   
    <div class="box-body">
      <form method="GET" action="{{ route('student.year.class.wise') }}">
        <div class="row">
          
    <div class="col-md-4">{{-- start col-md-4 --}}
      <div class="form-group">
       <h5>Year <span class="text-danger"> </span></h5>
        <div class="controls">
          <select name="year_id" required="" class="form-control">
            <option value="" selected="" disabled="">Select Year</option>
            @foreach ($years as $year)
            <option value="{{ $year->id }}">{{ $year->name }}</option>  
            @endforeach

          </select>
        </div>		 
      </div>
    </div>{{-- end col-md-4 --}}

    <div class="col-md-4"> {{-- start col-md-4 --}}
      <div class="form-group">
        <h5>Class <span class="text-danger"> </span></h5>
          <div class="controls">
            <select name="class_id"  required="" class="form-control">
              <option value="" selected="" disabled="">Select Class</option>
              @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>  
              @endforeach
            </select>
          </div>		 
      </div>
    </div>{{-- end col-md-4 --}}
     
     
    <div class="col-md-4" style="padding-top: 25px;">{{-- start col-md-4 --}}
      <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
    </div>{{-- end col-md-4 --}}
                    
  </div>{{-- end row --}} 
     
</form>
      
       
      </div>
    </div>
       </div>
   
  

 <div class="col-12">

  <div class="box">
     <div class="box-header with-border">
       <h3 class="box-title">Student List</h3>
       <a href="{{ route('student.add') }}" style="float: right;" class="btn btn-rounded btn-success mb-5">Add Student</a>
     </div>
     <!-- /.box-header -->
     <div class="box-body">
<div class="table-responsive">
  <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
   <th width="10%">SL</th>
   <th>Name</th>
   <th>ID No</th>
   <th>Role</th>
   <th>Year</th>
   <th>Class</th>
   <th>Image</th>
   @if (Auth::user()->role == 'Admin')
   <th>Code</th>    
   @endif
   <th width="20%">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allData as $key => $data)
        <tr>
 <td>{{ $key+1 }}</td>
 <td>{{ $data['student']['name'] }}</td>
 <td>{{ $data['student']['id_no'] }}</td>
 <td>{{ $data['student']['role'] }}</td>
 <td>{{ $data['year']['name'] }}</td>
 <td>{{ $data['class']['name'] }}</td>
 <td>
  <img src="{{ (!empty($data['student']['image']))? url('upload/student_images/'.$data['student']['image']):url('upload/no_image.jpg') }}" style="width: 60px; width: 60px;">
 </td>
 @if (Auth::user()->role == 'Admin')
 <td>{{ $data['student']['code'] }}</td>
 @endif
 <td>
   <a href="{{ route('student.edit', $data->student_id)}}" class="btn btn-info">Edit</a>
   <a href="{{ route('student.promotion', $data->student_id)}}" class="btn btn-danger">Promotion</a>
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