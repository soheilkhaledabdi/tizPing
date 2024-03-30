<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <title>داشبورد</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico') }}">


    <!-- Bootstrap Css -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css -->
    <link href="{{ asset('/assets/css/app.css') }}" id="app-style" rel="stylesheet" type="text/css">
    <!-- Theme Color -->
    <meta name="theme-color" content="#283D92">
    @livewireStyles
</head>

<body data-layout="detached" data-topbar="colored">

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

    @include('partial.page-header')

    <!-- ========== Left Sidebar Start ========== -->
    @include('partial.right-menu')
    <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="page-title mb-0 font-size-18">داشبورد</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active">@yield('r_title' , 'به پنل مدیریتی خوش امدید')</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                {{ $slot }}
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-right d-none d-sm-block">
                                قدرت گرفته از <a href="https://soheilkhaledabadi.com">soheil khaledabadi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>

<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('/assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('/assets/libs/node-waves/waves.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    window.addEventListener('SwalConfirm', function(event){
        Swal.fire({
            title: event.detail.title ,
            text: event.detail.html,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'بله حذف بکن',
            cancelButtonText : 'نه'
        }).then((result) => {
            if(result.value){
                window.livewire.emit('delete',event.detail.id);
            }
        })
    })
    window.addEventListener('success', function(event){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: event.detail.message,
            showConfirmButton: false,
            timer: 1500
        })
    });
    window.addEventListener('deleted', function(event){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: event.detail.message,
            showConfirmButton: false,
            timer: 1500
        })
    });
    window.addEventListener('OpenAddModal', function(event){
        $('.OpenAddModals').find('span').html('');
        $('.OpenAddModals').modal('show');
    });
    window.addEventListener('OpenSubModal' , function (event) {
        $('.OpenSubModals').find('span').html('');
        $('.OpenSubModal').modal('show');
    });
    window.addEventListener('OpenEditModal' , function (event) {
        $('.OpenEditModals').find('span').html('');
        $('.OpenEditModals').modal('show');
    });
</script>
@livewireScripts
</body>

</html>
