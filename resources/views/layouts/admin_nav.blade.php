<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fas fa-bars"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                               <!-- <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="far fa-envelope"></i></a>
                                    </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="far fa-bell"></i></a>
                                        </li>
                                    <li class="nav-item">
                                            <a class="nav-link" href="#"><i class="far fa-flag"></i></a>
                                        </li> -->
                                        <li class="nav-item dropdown">
                                                <a class="nav-link navbar-avatar waves-effect waves-light waves-round" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="scale-up" role="button">
                                                  <span class="avatar avatar-online">
                                                    <img src="{{URL::to('images/'.Auth::user()->photo)}}" alt="...">
                                                    
                                                  </span>
                                                </a>
                                                <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item waves-effect waves-light waves-round" href="{{url('/account')}}" role="menuitem"> Profile</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a  href="{{ route('logout') }}" class="dropdown-item waves-effect waves-light waves-round"  onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();" role="menuitem">
                                                         Logout
                                                         </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                      </div>
                                              </li>
                                    <li class="nav-item">
                                        <a class="nav-link">{{auth()->user()->name}}</a>
                                    </li>
                        </ul>
                    </div>
                </div>
            </nav>