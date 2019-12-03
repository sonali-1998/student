<div>
    <ul class="nav navbar-nav side-nav" style="margin-right: -152px;margin-left: -224px;margin-bottom: -47px;margin-top: -9px;">

        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-user-plus"></i>  Class<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-1" class="collapse">
                <li><a href="{{ action('ClassController@create') }}"><i class="fa fa-angle-double-right"></i> ADD Class</a></li>
                <li><a href="{{ action('ClassController@index') }}"><i class="fa fa-angle-double-right"></i>LIST Class</a></li> 
            </ul>
        </li> 
        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-user-plus"></i>  Section<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-2" class="collapse">
                <li><a href="{{ action('SectionController@create') }}"><i class="fa fa-angle-double-right"></i> ADD Section</a></li>
                <li><a href="{{ action('SectionController@index') }}"><i class="fa fa-angle-double-right"></i>LIST Section</a></li> 
            </ul>
        </li> 
        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-3"><i class="fa fa-fw fa-user-plus"></i>  Student<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-3" class="collapse">
                <li><a href="{{ action('StudentController@create') }}"><i class="fa fa-angle-double-right"></i> ADD Student</a></li>
                <li><a href="{{ action('StudentController@index') }}"><i class="fa fa-angle-double-right"></i>LIST Student</a></li> 
            </ul>
        </li> 
        <li>
            <a href="#" data-toggle="collapse" data-target="#submenu-4"><i class="fa fa-fw fa-user-plus"></i>  Attendance<i class="fa fa-fw fa-angle-down pull-right"></i></a>
            <ul id="submenu-4" class="collapse">
                <li><a href="{{ action('AttendanceController@create') }}"><i class="fa fa-angle-double-right"></i> ADD Attendance</a></li>
                <li><a href="{{ action('AttendanceController@index') }}"><i class="fa fa-angle-double-right"></i>LIST Attendance</a></li> 
            </ul>
        </li> 

    </ul>
</div>