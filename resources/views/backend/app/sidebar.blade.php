<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{ route('admin.dashboard') }}" style="width:100%; line-height:25px">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                    height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">Employee Attendance Manager</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">



                <li class="has-sub active expand">
                    <a class="sidenav-item-link" href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>



                @hasrole('Admin')
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#ui-elements" aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Employee Lists</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ui-elements" data-parent="#sidebar-menu">
                        <div class="sub-menu">


                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('create.employee') }}">
                                    <span class="nav-text">Create Employee</span>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('employee.lists') }}">
                                    <span class="nav-text">Employee Lists</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                @endrole


                @hasrole('Admin')
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#ui-element" aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Employee Details</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ui-element" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('create.employee.details') }}">
                                    <span class="nav-text">Create Employee Details</span>
                                </a>
                            </li>

                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('employee.details') }}">
                                    <span class="nav-text">Employee Details Lists</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>
                @endrole
                @hasrole('Admin')
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#ui-element2" aria-expanded="false" aria-controls="ui-elements">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Contact Lists</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="ui-element2" data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('create.contact') }}">
                                    <span class="nav-text">Create Contact</span>
                                </a>
                            </li>

                            <li class="has-sub">
                                <a class="sidenav-item-link" href="{{ route('employee-contact-lists') }}">
                                    <span class="nav-text">Contact Lists</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>
                @endrole
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
                        aria-expanded="false" aria-controls="charts">
                        <i class="mdi mdi-folder-multiple-outline"></i>
                        <span class="nav-text">Attendance</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse" id="charts" data-parent="#sidebar-menu">
                        <div class="sub-menu">



                            <li>
                                <a class="sidenav-item-link" href="{{ route('add.attendance') }}">
                                    <span class="nav-text">Add Attendance</span>

                                </a>
                            </li>

                            <li>
                                <a class="sidenav-item-link" href="{{ route('attendance.lists') }}">
                                    <span class="nav-text">Attendance Present Lists</span>

                                </a>
                            </li>
                            
                            <li>
                                <a class="sidenav-item-link" href="{{ route('atten.lists') }}">
                                    <span class="nav-text">Attendance Lists Report</span>

                                </a>
                            </li>



                        </div>
                    </ul>
                </li>


            </ul>

        </div>


    </div>
</aside>
