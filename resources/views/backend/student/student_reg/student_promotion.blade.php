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
            <h4 class="box-title">Promotion Student:  {{ $editData['student']['name'] }}  </h4>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col">
                  <form action="{{ route('promotion.update', $editData->student_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editData->id }}">

        <div class="row">
			<div class="col-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <h5>Discount <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="discount" class="form-control" required="" value="{{ $editData['discount']['discount'] }}"> 
                        </div>		 
                    </div>
                </div>{{-- end col-md-6 --}}
            </div>

        


        


        <div class="row"> {{-- first row --}}

            <div class="col-md-6">
                <div class="form-group">
                    <h5>Year <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="year_id" required="" class="form-control">
                                <option value="" selected="" disabled="">Select Year</option>
                                 @foreach($years as $year)
                                <option value="{{ $year->id }}" {{ ($editData->year_id == $year->id) ? 'selected' : '' }}>{{ $year->name }}</option>
                                 @endforeach 
                        </select>
                    </div>		 
                </div>
            </div> {{-- end col-md-6 --}}

            <div class="col-md-6">
                <div class="form-group">
                    <h5>Class <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="class_id"  required="" class="form-control">
                            <option value="" selected="" disabled="">Select Class</option>
                            @foreach($classes as $class)
                            <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id) ? 'selected' : '' }}>{{ $class->name }}</option>
                            @endforeach      
                        </select>
                    </div>		 
                </div>
            </div>{{-- end col-md-6 --}}

            

        </div> {{-- end first row --}}



        <div class="row"> {{-- second row --}}

            <div class="col-md-6">
                <div class="form-group">
                    <h5>Shift <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="shift_id"  required="" class="form-control">
                            <option value="" selected="" disabled="">Select Shift</option>
                             @foreach($shifts as $shift)
                            <option value="{{ $shift->id }}" {{ ($editData->shift_id == $shift->id) ? 'selected' : '' }}>{{ $shift->name }}</option>
                             @endforeach     
                        </select>
                    </div>		 
                </div>
            </div> {{-- end col-md-6 --}}

            <div class="col-md-6">
                <div class="form-group">
                    <h5>Group <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="group_id"   required="" class="form-control">
                            <option value="" selected="" disabled="">Select Group</option>
                             @foreach($groups as $group)
                            <option value="{{ $group->id }}" {{ ($editData->group_id == $group->id) ? 'selected' : '' }}>{{ $group->name }}</option>
                             @endforeach 
                        </select> 
                    </div>		 
                </div>
            </div>{{-- end col-md-6 --}}

        </div> {{-- end second row --}}
        

        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
        </div>
    
        </form>

</div>{{-- end col --}}
</div>{{-- end row --}}
</div>{{-- end box body --}}
</div>{{-- end box --}}
</section>{{-- end section --}}
</div>{{-- end container full --}}
</div>{{-- end content wrapper --}}

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