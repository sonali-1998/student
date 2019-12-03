 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<html> 
    <body>      
        <div class="" style="text-align: center">
            <div class="row">
                <div class="card">
                    <div class="card-body" >

                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="roll_number" class="col-md-1">{{ __('Roll No') }}</label>

                            <div class="col-md-4" class="form-group">

                                {!! Form::text('roll_number', null, array('placeholder' => 'Roll No.','class' => 'form-control')) !!}
                            </div>
                        </div>


                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="student_name" class="col-md-1">{{ __('Student Name') }}</label>

                            <div class="col-md-4" class="form-group">

                                {!! Form::text('student_name', null, array('placeholder' => 'Student Name','class' => 'form-control')) !!}
                            </div>
                        </div>


                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="father_name" class="col-md-1">{{ __('Father Name') }}</label>

                            <div class="col-md-4" class="form-group">

                                {!! Form::text('father_name', null, array('placeholder' => 'Father Name','class' => 'form-control')) !!}
                            </div>
                        </div>


                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="mother_name" class="col-md-1">{{ __('Mother Name') }}</label>

                            <div class="col-md-4" class="form-group">

                                {!! Form::text('mother_name', null, array('placeholder' => 'Mother Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="address" class="col-md-1">{{ __('Address') }}</label>

                            <div class="col-md-4" class="form-group">

                                {!! Form::text('address', null, array('placeholder' => 'Address','class' => 'form-control')) !!}
                            </div>
                        </div>


                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="dob" class="col-md-1">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-4" class="form-group"  >
                                {!! Form::date('dob', null, array('placeholder' => 'DOB','class' => 'form-control date')) !!}
                            </div>
                        </div>
                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="gender" class="col-md-1">Select Gender:</label>
                            <div class="col-md-4" class="form-group">
                                <select name="gender" class="form-control">
                                    <option value="">--- Select Gender ---</option> 
                                    <option value="Male" {{ ( isset($student) && $student['gender'] == 'Male') ? 'selected="selected"' : '' }}>Male</option>
                                    <option value="Female" {{ ( isset($student) && $student['gender'] == 'Female') ? 'selected="selected"' : '' }}>Female</option>
                             

                                </select>
                            </div>
                        </div>


                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="class_id" class="col-md-1">Select Class:</label>
                            <div class="col-md-4" class="form-group">
                                <select name="class_id" class="form-control">
                                    <option value="">--- Select Class ---</option>
                                    @foreach ($arr_class as $value)
                                    <option value="{{ $value['id'] }}" {{ ( isset($student) && $student['class_id'] == $value['id']) ? 'selected="selected"' : '' }}>{{ $value['class_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="section_id" class="col-md-1">Select Section:</label>
                            <div class="col-md-4" class="form-group">
                                <select name="section_id" class="form-control">
                                    <option value="">--- Select Section ---</option>
                                    @foreach ($arr_section as $value)
                                    <option value="{{ $value['id'] }}" {{ ( isset($student) && $student['section_id'] == $value['id']) ? 'selected="selected"' : '' }}>{{ $value['section_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="form-group row">
                            <div class="col-md-9 offset-sm-3">
                                <button type="submit" name="save"  id="button" class="btn btn-primary mr-2"> <i class="fa fa-save" aria-hidden="true"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>
<script>
$(document).ready(function () {
    $('.date').datetimepicker({
        format: 'MM/DD/YYYY',
    });
});
</script>

