<div class="sidebar-wrapper" style="width: 308px;">
    <div>
        <div class="logo-wrapper" style="text-align: center">
            <a href="#"><img width="180px" class="img-fluid for-light"
                    src="{{ asset('assets/images/riphah-logo-header.png') }}" alt="" />
                {{-- <div class="row mt-2">
                    <div class="col-md-6">
                        <img width="" class="img-fluid for-light" style="border-radius: 7px;" src="{{ asset('assets/Awards-01.jpg') }}"
                            alt="" />

                    </div>
                    <div class="col-md-6">
                        <img width="" class="img-fluid for-light" style="border-radius: 7px;" src="{{ asset('assets/Awards-02.jpg') }}"
                            alt="" />
                    </div>
                </div> --}}
            </a>

        </div>
        <div class="logo-icon-wrapper">
            <a href="#"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon1.png') }}"
                    alt="" /></a>
        </div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow">
                <i data-feather="arrow-left"></i>
            </div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ route('home') }}"><img class="img-fluid"
                                src="{{ asset('assets/images/logo/logo-icon.png') }}" alt="" /></a>
                        <div class="mobile-back text-end">
                            <span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    {{-- style="margin: 106px 0 0 0 --}}
                    <li class="menu-box">
                        <ul>
                            <!-- Dashboard Link -->
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('home') ? 'active' : '' }}"
                                    href="{{ route('home') }}">
                                    <i data-feather="pie-chart"></i><span class="">Dashboard</span></a>
                            </li>
                            <!-- System Config -->
                            @hasexactroles('admin')
                                {{-- <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="#">
                                        <i data-feather="shield"></i> <span class="">Roles & Permissions</span></a>
                                </li> --}}
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title {{ request()->routeIs('configuration.*') ? 'active' : '' }}"
                                        href="javascript:void(0)">
                                        <i data-feather="settings"></i><span>System Config</span>
                                    </a>
                                    <ul class="sidebar-submenu"
                                        style="{{ request()->routeIs('configuration.*') ? 'display: block;' : 'display: none;' }}">
                                        <li><a href="{{ route('configuration.campus') }}"
                                                class="{{ request()->routeIs('configuration.campus') ? 'active' : '' }}"><span>Campus</span></a>
                                        </li>
                                        <li><a href="{{ route('configuration.departments') }}"
                                                class="{{ request()->routeIs('configuration.departments') ? 'active' : '' }}"><span>Department</span></a>
                                        </li>
                                        <li><a href="{{ route('configuration.sessions') }}"
                                                class="{{ request()->routeIs('configuration.sessions') ? 'active' : '' }}"><span>Sessions</span></a>
                                        </li>
                                        <li><a href="{{ route('configuration.programs') }}"
                                                class="{{ request()->routeIs('configuration.programs', 'configuration.program_add') ? 'active' : '' }}"><span>Programs</span></a>
                                        </li>
                                        <li><a href="{{ route('configuration.fee_structure') }}"
                                                class="{{ request()->routeIs('configuration.fee_structure') ? 'active' : '' }}"><span>Fee
                                                    Structure</span></a></li>
                                    </ul>
                                </li>
                            @endhasexactroles
                            @hasexactroles('admission head')
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title {{ request()->routeIs('analysis.*') ? 'active' : '' }}"
                                        href="javascript:void(0)">
                                        <i data-feather="bar-chart-2"></i><span>Admission Analytics</span>
                                    </a>
                                    <ul class="sidebar-submenu"
                                        style="{{ request()->routeIs('analysis.*') ? 'display: block;' : 'display: none;' }}">
                                        <li><a href="{{ route('analysis.overview') }}"
                                                class="{{ request()->routeIs('analysis.overview') ? 'active' : '' }}"><span>Overview</span></a>
                                        </li>
                                        <li><a href="{{ route('analysis.session_spring') }}"
                                                class="{{ request()->routeIs('analysis.session_spring') ? 'active' : '' }}"><span>Spring
                                                    Session</span></a></li>
                                        <li><a href="{{ route('analysis.session_fall') }}"
                                                class="{{ request()->routeIs('analysis.session_fall') ? 'active' : '' }}"><span>Fall
                                                    Session</span></a></li>
                                        <li><a href="#" class=""><span>History</span></a></li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('eligibility_check') ? 'active' : '' }}"
                                        href="{{ route('eligibility_check') }}">
                                        <i data-feather="check-circle"></i><span class="">Eligibility Check</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('approve_admission') ? 'active' : '' }}"
                                        href="{{ route('approve_admission') }}">
                                        <i data-feather="thumbs-up"></i><span class="">Approve Admission</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title {{ request()->routeIs('approve_application', 'mbbs_application') ? 'active' : '' }}"
                                        href="javascript:void(0)">
                                        <i data-feather="folder"></i><span>Applications</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{ route('approve_application') }}"
                                                class="{{ request()->routeIs('approve_application') ? 'active' : '' }}"><span>Approved
                                                    Applications</span></a></li>
                                        <li><a href="{{ route('mbbs_application') }}"
                                                class="{{ request()->routeIs('mbbs_application') ? 'active' : '' }}"><span>MBBS/BDS
                                                    Applications</span></a></li>
                                    </ul>
                                </li>
                                {{-- <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="#">
                                        <i data-feather="edit-2"></i><span class="">Edit User Application</span></a>
                                </li> --}}
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('register_users') ? 'active' : '' }}"
                                        href="{{ route('register_users') }}">
                                        <i data-feather="user-check"></i><span class="">Register Users</span></a>
                                </li>
                            @endhasexactroles
                            @hasexactroles('finance head')
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title {{ request()->routeIs('fee.*') ? 'active' : '' }}"
                                        href="javascript:void(0)">
                                        <i data-feather="credit-card"></i><span>Fee Management</span>
                                    </a>
                                    <ul class="sidebar-submenu"
                                        style="{{ request()->routeIs('fee.*') ? 'display: block;' : 'display: none;' }}">
                                        <li><a href="{{ route('fee.pending_fee') }}"
                                                class="{{ request()->routeIs('fee.pending_fee') ? 'active' : '' }}"><span>Pending/Rejected
                                                    Fee</span></a>
                                        </li>
                                        <li><a href="{{ route('fee.approved_fee') }}"
                                                class="{{ request()->routeIs('fee.approved_fee') ? 'active' : '' }}"><span>Approved
                                                    Fee</span></a></li>
                                        <li><a href="{{ route('fee.receipt') }}"
                                                class="{{ request()->routeIs('fee.receipt') ? 'active' : '' }}"><span>Receipt</span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title {{ request()->routeIs('finalfee.*') ? 'active' : '' }}"
                                        href="javascript:void(0)">
                                        <i data-feather="sliders"></i><span>Final Fee Setup</span>
                                    </a>
                                    <ul class="sidebar-submenu" style="">
                                        <li><a href="{{ route('finalfee.add') }}"
                                                class="{{ request()->routeIs('finalfee.add') ? 'active' : '' }}"><span>Add
                                                    Final Fee</span></a>
                                        </li>
                                        <li><a href="{{ route('finalfee.view') }}"
                                                class="{{ request()->routeIs('finalfee.view') ? 'active' : '' }}"><span>Manage
                                                    Final Fee</span></a></li>

                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('program_fee_setup') ? 'active' : '' }}"
                                        href="{{ route('program_fee_setup') }}">
                                        <i data-feather="settings"></i><span class="">Program Fee Setup</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title {{ request()->routeIs('fee_report.*') ? 'active' : '' }}"
                                        href="javascript:void(0)">
                                        <i data-feather="clipboard"></i><span>Reports</span>
                                    </a>
                                    <ul class="sidebar-submenu" style="">
                                        <li><a href="{{ route('fee_report.accountant') }}"
                                                class="{{ request()->routeIs('fee_report.accountant') ? 'active' : '' }}"><span>Fee
                                                    Report</span></a>
                                        </li>
                                        <li><a href="{{ route('fee_report.receipt_report') }}"
                                                class="{{ request()->routeIs('fee_report.receipt_report') ? 'active' : '' }}"><span>Receipt
                                                    Report</span></a></li>

                                    </ul>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('fee_challan') ? 'active' : '' }}"
                                        href="{{ route('fee_challan') }}">
                                        <i data-feather="printer"></i><span class="">Fee Challan</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('fee_refund') ? 'active' : '' }}"
                                        href="{{ route('fee_refund') }}">
                                        <i data-feather="corner-up-left"></i><span class="">Fee Refund</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('sap_program.index', 'sap_program.add') ? 'active' : '' }}"
                                        href="{{ route('sap_program.index') }}">
                                        <i data-feather="layers"></i><span class="">SAP Program</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('oas_program.index') ? 'active' : '' }}"
                                        href="{{ route('oas_program.index') }}">
                                        <i data-feather="info"></i><span class="">OAS Program Info</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('program_change') ? 'active' : '' }}"
                                        href="{{ route('program_change') }}">
                                        <i data-feather="shuffle"></i><span class="">Change Student
                                            Program</span></a>
                                </li>
                            @endhasexactroles
                            @hasanyrole('admission head|finance head')
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title {{ request()->routeIs('report.*') ? 'active' : '' }}"
                                        href="javascript:void(0)">
                                        <i data-feather="clipboard"></i><span>Admission Reports</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li><a href="{{ route('report.fee_report') }}"
                                                class="{{ request()->routeIs('report.fee_report') ? 'active' : '' }}"><span>Fee
                                                    Report</span></a></li>
                                        <li><a href="#" class=""><span>Application Report</span></a></li>
                                        <li><a href="#" class=""><span>Application Fee Report</span></a></li>
                                        <li><a href="#" class=""><span>Attendance Report</span></a></li>
                                    </ul>
                                </li>
                            @endhasanyrole

                            @hasexactroles('student')
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav {{ request()->routeIs('application.upload_challan') ? 'active' : '' }}"
                                        href="{{ route('application.upload_challan') }}">
                                        <i data-feather="upload"></i><span class="">Upload Fee Challan</span></a>
                                </li>
                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="#">
                                        <i data-feather="download"></i><span class="">Download Offer
                                            Letter</span></a>
                                </li>
                            @endhasexactroles
                            <li class="sidebar-list">
                                <a class="sidebar-link sidebar-title link-nav" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i data-feather="log-out"></i><span class="">Logout</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow">
                <i data-feather="arrow-right"></i>
            </div>
        </nav>
    </div>
</div>

<script>
    // This script ensures that if a submenu has an active link, the submenu remains open
    document.addEventListener("DOMContentLoaded", function() {
        var activeSubmenu = document.querySelector('.sidebar-submenu .active');
        if (activeSubmenu) {
            var parentUl = activeSubmenu.closest('.sidebar-submenu');
            if (parentUl) {
                parentUl.style.display = "block";
                // Some themes require the 'active' class on the parent sidebar-list as well
                var parentLi = parentUl.closest('.sidebar-list');
                if (parentLi) {
                    parentLi.classList.add('active');
                }
            }
        }
    });
</script>
