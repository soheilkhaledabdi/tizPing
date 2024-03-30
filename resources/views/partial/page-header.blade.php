<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-right">

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <a  class="btn header-item noti-icon" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="margin-bottom: -25px;">
                        <i class="mdi mdi-logout" style="font-size: 18px;"></i>
                    </a>
                </div>

                <div class="dropdown d-none d-lg-inline-block ml-1">
                    <button type="button" class="btn header-item noti-icon waves-effect"
                            data-toggle="fullscreen">
                        <i class="mdi mdi-fullscreen"></i>
                    </button>
                </div>


            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">

                </div>

                <button type="button"
                        class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

            </div>

        </div>
    </div>
</header>
