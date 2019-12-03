 
<html> 
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
    </head>
    <body>      
        <div class="" style="text-align: center">
            <div class="row">
                <div class="card">
                    <div class="card-body" >
                        <!--<form action="{{ route('attendances.index') }}" class="inline">-->
                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="attendance_date" class="col-md-1">{{ __('Date') }}</label>

                            <div class="col-md-4" class="form-group"  >
                                {!! Form::date('attendance_date', null, array('placeholder' => 'Date','class' => 'form-control date', 'id'=>'attendance_date')) !!}
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="class_name" class="col-md-1">Select Class:</label>
                            <div class="col-md-4" class="form-group">
                                <select name="class_id" class="form-control" id="class_id" >
                                    <option value="">--- Select Class ---</option>
                                    @foreach ($arr_class as $value)
                                    <option value="{{ $value['id'] }}" {{ ( isset($attendance) && $attendance['class_id'] == $value['id']) ? 'selected="selected"' : '' }}>{{ $value['class_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row" style="margin-right: 1%;   width: 160%;">
                            <label for="section_id" class="col-md-1">Select Section:</label>
                            <div class="col-md-4" class="form-group">
                                <select name="section_id" class="form-control" id="section_id" onchange="get_data()">
                                    <option value="">--- Select Section ---</option>
                                    @foreach ($arr_section as $value)
                                    <option value="{{ $value['id'] }}" {{ ( isset($student) && $student['section_id'] == $value['id']) ? 'selected="selected"' : '' }}>{{ $value['section_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <div id="card-body"> 

                            </div>
                        </div> 

                        <div class="form-group row">
                            <div class="col-md-9 offset-sm-3">
                                <button type="button" name="save"  id="button"  class="btn btn-primary mr-2" onclick="btnclk()"> Save</button>

                            </div>
                        </div>
                        <!--</form>-->

                    </div>
                </div>
            </div>
        </div>
        <h3 id="result"></h3>
    </body>
</html>

<script type="text/javascript">


    function get_data() {
        $("#card-body").text("");
        var a = document.getElementById('class_id');
        var b = document.getElementById('section_id');
        console.log(a);
        console.log(b);
        var cid = a.options[a.selectedIndex].value;
        var sid = b.options[b.selectedIndex].value;
        if (cid && sid) {
            $.ajax({
                type: "get",
                url: "/getStudentByClass/" + cid + "/" + sid, //Please see the note at the end of the post**
                success: function (res)
                {
                    if (res)
                    {

                        $.each(res, function (key, value) {
                            $("#card-body").append('<input type="checkbox"  name="arr_students" value="' + key + '">' + value + '<br>');
                        });
                    }
                }

            });
        }
    }



    function btnclk() {

        var student = [];
        var allstudent = [];
        var checkedstudent = [];
        var status = [];
        var class_id = $('#class_id').val();
        var section_id = $('#section_id').val();
        var attendance_date = $('#attendance_date').val();

        $.each($("input[name='arr_students']"), function () {
            allstudent.push($(this).val());
        });

        $.each($("input[name='arr_students']:checked"), function () {
            checkedstudent.push($(this).val());
        });
        $.each(allstudent, function (stud, val) {
            $.each($("input[name='arr_students']"), function (key, value) {

//                console.log('student', val, checkedstudent[key], value);
                if (val == checkedstudent[key]) {
                    status.push([val, 'Yes']);
                    return true;
                }
            });
            if (val != checkedstudent[stud] && status.push != 'Yes')
            {
                status.push([val, 'No']);
                return true;
            }
        });

        $.ajax({
            type: "POST",
            url: "{{route('attendances.store')}}",
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                'student': status,
                'class': class_id,
                'section': section_id,
                'attendance_date': attendance_date
            },
        }).done(function (response) {
//            console.log(response);
        });
        window.location.href = "{{URL::to('attendances')}}"
    }

</script>





