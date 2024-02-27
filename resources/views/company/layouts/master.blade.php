<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <title> @yield('title') </title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" type="image/png" href="">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/jquery.nice-number.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/add_row_custon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/ranger_style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/jquery.classycountdown.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/css/responsive.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">

</head>

<body>


    <!--=============================DASHBOARD MENU START==============================-->

    <div class="wsus__dashboard_menu">
        <div class="wsusd__dashboard_user">
            <img src="{{ asset(Auth::user()->image) }}" alt="img" class="img-fluid">
            <p>{{ Auth::user()->name }}</p>
        </div>
    </div>
    <!--=============================DASHBOARD MENU END==============================-->


    <!--=============================DASHBOARD START==============================-->

    @yield('content')

    <!--=============================DASHBOARD START==============================-->


    <!--============================SCROLL BUTTON START==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================ SCROLL BUTTON  END==============================-->

    <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
    <!--jquery library js-->
    <script src="{{ asset('frontend/dashboard/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('frontend/dashboard/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('frontend/dashboard/js/Font-Awesome.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('frontend/dashboard/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('frontend/dashboard/js/slick.min.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('frontend/dashboard/js/simplyCountdown.js') }}"></script>
    <!--product zoomer js-->
    <script src="{{ asset('frontend/dashboard/js/jquery.exzoom.js') }}"></script>
    <!--nice-number js-->
    <script src="{{ asset('frontend/dashboard/js/jquery.nice-number.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('frontend/dashboard/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/dashboard/js/jquery.countup.min.js') }}"></script>

    <!--add row js-->
    <script src="{{ asset('frontend/dashboard/js/add_row_custon.js') }}"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('frontend/dashboard/js/multiple-image-video.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('frontend/dashboard/js/sticky_sidebar.js') }}"></script>
    <!--price ranger js-->
    <script src="{{ asset('frontend/dashboard/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/dashboard/js/ranger_slider.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('frontend/dashboard/js/isotope.pkgd.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('frontend/dashboard/js/venobox.min.js') }}"></script>
    <!--classycountdown js-->
    <script src="{{ asset('frontend/dashboard/js/jquery.classycountdown.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <!--main/custom js-->
    <script src="{{ asset('frontend/dashboard/js/main.js') }}"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <script>
        $('.summernote').summernote({
            height: 200
        })

        $('.datepicker').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            singleDatePicker: true
        });
    </script>


    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('body').on('click', '.delete-item', function(event) {

                event.preventDefault();

                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,

                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )

                                    window.location.reload();

                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Delete',
                                        data.message,
                                        'error'
                                    )
                                }

                            },

                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })


                    }

                })
            })
    })
</script>


<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.approve', function(event) {
            event.preventDefault();
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do You want Approve This Application",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Approved'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    $(this).closest('form').submit();
                    
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,

                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Applied',
                                        data.message,
                                        'success'
                                    )

                                    window.location.reload();

                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Delete',
                                        data.message,
                                        'error'
                                    )
                                }
                            },

                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })

                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '.reject', function(event) {
            event.preventDefault();
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "Do You want to Reject This Application",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Reject'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If user confirms, submit the form
                    $(this).closest('form').submit();
                    
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,

                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Applied',
                                        data.message,
                                        'success'
                                    )

                                    window.location.reload();

                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        'Cant Delete',
                                        data.message,
                                        'error'
                                    )
                                }
                            },

                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        })

                }
            });
        });
    });
</script>

    @stack('scripts');

</body>

</html>
