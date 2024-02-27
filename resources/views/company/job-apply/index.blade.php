@extends('company.layouts.master')

@section('title')
    || All Application
@endsection

@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">

            @include('company.layouts.sidebar')


            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">

                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>All Application</h3>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                {{ $dataTable->table() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
    
    function confirmApprove(id) {
            if (confirm('Are you sure you want to approve this job application?')) {
                document.getElementById('approveForm' + id).submit();
            }
        }

        function confirmReject(id) {
            if (confirm('Are you sure you want to reject this job application?')) {
                document.getElementById('rejectForm' + id).submit();
            }
        }
    </script>
@endpush
