<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="" alt=""
                     class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16 line-height-h"></a>
                <p class="text-body mt-1 mb-0 font-size-13"></p>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class=" waves-effect">
                        <i class="bx bx-server"></i>
                        <span>داشبورد</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('profile') }}" class=" waves-effect">
                        <i class="mdi mdi mdi-face-profile"></i>
                        <span>پروفایل</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('settings') }}" class=" waves-effect">
                        <i class="mdi mdi mdi-settings"></i>
                        <span>تنظیمات</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('servers') }}" class=" waves-effect">
                        <i class="mdi mdi mdi-airplay"></i>
                        <span>سرور ها</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
