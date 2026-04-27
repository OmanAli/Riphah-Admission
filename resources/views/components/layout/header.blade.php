<div class="page-header">
    <div class="header-wrapper row m-0">

        <div class="left-header col horizontal-wrapper ps-0">
            <div class="">
                <div style="color: black;">
                    Online Application Submittion
                </div>

            </div>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">

                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="d-flex profile-media">
                        <img class="b-r-50" src="{{ asset('assets/images/dashboard/profile.jpg') }}"alt="" />
                        <div class="flex-grow-1">
                            <span style="color: black;">{{ auth()->user()->name }}</span>
                            <i class="middle fa fa-angle-down"></i>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li>
                            <a href="{{route('change_password')}}"><i
                                    data-feather="log-in"> </i><span>Change
                                    Password</span></a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    data-feather="log-in"> </i><span>Log
                                    out</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
