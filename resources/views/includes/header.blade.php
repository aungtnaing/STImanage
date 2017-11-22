<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><h4 style="color:#3fe265;">STIMU Management System</h4></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li><a href="/dashboard">dashbord</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i><span>{{ Auth::user()->name }}</span> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{ url('dashboarduserprofile') }}"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       

                        @if(Auth::user()->roleid==2 || Auth::user()->roleid==3 || Auth::user()->roleid==4 || Auth::user()->roleid==1)

                        <li>
                            <a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                             
                        </li>
                        @endif

                        @if(Auth::user()->roleid==1 || Auth::user()->roleid==2)

                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Staff Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                              
                        <li>
                            <a href="/userspannel">user manager</a>
                        </li>
                         <li>
                            <a href="/todolistmanager">todolist manager</a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        @endif



                        @if(Auth::user()->roleid==3 || Auth::user()->roleid==1)

                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Admission Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                            <a href="/enquirys">enquiry information</a>
                        </li>
                         <li>
                            <a href="/mainslides">mainslide manager</a>
                        </li>
                         <li>
                            <a href="#">student registration manager</a>
                        </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        @endif
                        @if(Auth::user()->roleid==4 || Auth::user()->roleid==1)

                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Campus Management<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                            <a href="/enquirys">campus information</a>
                        </li>
                         <li>
                            <a href="/mainslides">campus manager</a>
                        </li>
                        
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        @endif

                          
                        <li>
                            <a href="/todolists">your todolist</a>
                        </li>
                       
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>