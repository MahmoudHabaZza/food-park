@extends('EndUser.layouts.master')
@section('title')
    {{ auth()->user()->name }} | Dashboard
@endsection
@section('content')
    <!--=============================
                                                                        BREADCRUMB START
                                                                    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(@config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>user dashboard</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                        BREADCRUMB END
                                                                    ==============================-->


    <!--=========================
                                                                        DASHBOARD START
                                                                    ==========================-->
    <section class="fp__dashboard mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="fp__dashboard_area">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__dashboard_menu">
                            <div class="dasboard_header">
                                <div class="dasboard_header_img">
                                    <img src="{{ auth()->user()->avatar }}" alt="user" class="img-fluid w-100">
                                    <label for="upload"><i class="far fa-camera"></i></label>
                                    <form id="avatar_form" enctype="multipart/form-data" method="PUT">
                                        @csrf
                                        @method('PUT')
                                        <input type="file" name="avatar" id="upload" hidden>
                                    </form>
                                </div>
                                <h2>{{ auth()->user()->name }}</h2>
                            </div>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-home" type="button" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true"><span><i
                                            class="fas fa-user"></i></span> Parsonal Info</button>

                                <button class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-address" type="button" role="tab"
                                    aria-controls="v-pills-address" aria-selected="true"><span><i
                                            class="fas fa-user"></i></span>address</button>

                                <button class="nav-link" id="v-pills-reservation-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-reservation" type="button" role="tab"
                                    aria-controls="v-pills-reservation" aria-selected="false"><span><i
                                            class="fas fa-bags-shopping"></i></span> Reservations</button>

                                <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-profile" type="button" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="true"><span><i
                                            class="fas fa-bags-shopping"></i></span> Order</button>
                                @php
                                    @$unseenMessages = \App\Models\Chat::where([
                                        'sender_id' => 1,
                                        'receiver_id' => @auth()->user()->id,
                                        'seen' => 0,
                                    ])->count();
                                @endphp
                                <button class="nav-link fp_chat_message" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-settings" type="button" role="tab"
                                    aria-controls="v-pills-settings" aria-selected="true"><span><i
                                            class="far fa-comment-dots"></i></span> Message
                                    <b class="unseen_messages_count">{{ $unseenMessages > 0 ? 1 : 0 }}</b>
                                </button>

                                <button class="nav-link" id="v-pills-messages-tab2" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-messages2" type="button" role="tab"
                                    aria-controls="v-pills-messages2" aria-selected="true"><span><i
                                            class="far fa-heart"></i></span> wishlist</button>

                                <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-messages" type="button" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="true"><span><i
                                            class="fas fa-star"></i></span> Reviews</button>

                                <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-pills-password" type="button" role="tab"
                                    aria-controls="v-pills-password" aria-selected="true"><span><i
                                            class="fas fa-user-lock"></i></span> Change Password </button>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf

                                    <button class="nav-link"
                                        style="width:100%;"
                                        onclick="event.preventDefault();this.closest('form').submit();"
                                        type="button"><span> <i class="fas fa-sign-out-alt"></i>
                                        </span> Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__dashboard_content">
                            <div class="tab-content" id="v-pills-tabContent">

                                @include('EndUser.Dashboard.Sections.change-password')
                                @include('EndUser.Dashboard.Sections.review-section')
                                @include('EndUser.Dashboard.Sections.personal-info-section')
                                @include('EndUser.Dashboard.Sections.address-section')
                                @include('EndUser.Dashboard.Sections.reservation-section')
                                @include('EndUser.Dashboard.Sections.order-section')
                                @include('EndUser.Dashboard.Sections.message-section')
                                @include('EndUser.Dashboard.Sections.wishlist-section')




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('#upload').on('change', function() {
                let form = $('#avatar_form')[0];
                let formData = new FormData(form);

                $.ajax({
                    method: 'POST',
                    url: '{{ route('profile.update.avatar') }}',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status === 'success') {

                            window.location.reload();
                        }

                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message)
                        console.log(error)
                    }
                });
            })




        });
    </script>
@endpush
