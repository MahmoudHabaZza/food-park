@extends('admin.layouts.master')
@section('title')
    Messages
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Chat Box</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Chat Box</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card" style="height: 70vh">
                        <div class="card-header">
                            <h4>Who's Online?</h4>
                        </div>
                        <div class="card-body" >
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($senders as $sender)
                                @php
                                    $chatUser = \App\Models\User::find($sender->sender_id);
                                    $unseenMessages = \App\Models\Chat::where('sender_id',$chatUser->id)
                                        ->where('receiver_id',auth()->user()->id)->where('seen',0)->count();
                                @endphp
                                <li class="media fp_chat_user" data-user="{{ $chatUser->id }}" data-name="{{ $chatUser->name }}" style="cursor: pointer;">
                                    <img alt="image" class="mr-3 rounded-circle" width="50"
                                        src="{{ asset($chatUser->avatar)  }}" style="width:50px;height:50px;object-fit:cover;">
                                    <div class="media-body">
                                        <div class="mt-0 mb-1 font-weight-bold">{{ $chatUser->name }}</div>
                                        <div class="text-warning text-small font-600-bold got_new_message">
                                            @if ($unseenMessages > 0)
                                                <i class="beep"></i>New Message
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-9">
                    <div class="card chat-box" id="mychatbox" data-inbox="" style="height: 70vh">
                        <div class="card-header">
                            <h4 id="chat-header">Chat</h4>
                        </div>
                        <div class="card-body chat-content" >
                        </div>
                        <div class="card-footer chat-form">
                            <form id="chat-form">
                                @csrf
                                <input type="text" class="form-control fp_send_message" placeholder="Type a message" name="message">
                                <input type="hidden" name="msg_temp_id" class="msg_temp_id" value="">
                                <input type="hidden" name="receiver_id" value="" id="receiver_id">
                                <button class="btn btn-primary" type="submit">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function(){

            function scrollToBottom() {
                let chatContent = $('.chat-content');
                chatContent.scrollTop(chatContent.prop("scrollHeight"));
            }

            var userId = "{{ auth()->user()->id }}";
            $('#receiver_id').val("");
            $('.fp_chat_user').on('click',function(){

                let senderId = $(this).data("user");
                let userName = $(this).data("name");
                $('#mychatbox').attr('data-inbox',senderId);
                $('#receiver_id').val(senderId);
                $.ajax({
                    method: "GET",
                    url:'{{ route("admin.chat.get-chat",":senderId") }}'.replace(":senderId",senderId),
                    beforeSend:function(){
                        $('.chat-content').empty();
                        $('#chat-header').text("Chat With "+userName);
                    },
                    success:function(response){
                        $('.chat-content').empty();

                        $.each(response,function(index,message){
                            let avatar = "{{ asset(':avatar') }}".replace(':avatar',message.sender.avatar);
                            let formattedTime = formatDate(new Date(message.created_at));
                            let html = `<div class="chat-item ${message.sender_id == userId ? 'chat-right' : 'chat-left'}" style=""><img src="${avatar}" style="width:50px;height:50px;object-fit:cover;">
                                <div class="chat-details">
                                    <div class="chat-text">${message.message}</div>
                                    <div class="chat-time">${formattedTime}</div>
                                </div>
                            </div>`;
                            $('.chat-content').append(html);
                            scrollToBottom();
                        })

                        $('.fp_chat_user').each(function(){
                            if(senderId == $('#mychatbox').attr('data-inbox')){
                                $(this).find(".got_new_message").html("");
                            }
                        })
                    },
                    error:function(xhr,status,error){

                    }
                });
            })
            $('#chat-form').on('submit',function(e){
                e.preventDefault();
                var msg_temp_id = Math.floor(Math.random() * 10000) + 1;
                $('.msg_temp_id').val(msg_temp_id);


                let formData = $(this).serialize();
                $.ajax({
                    method: "POST",
                    url: "{{ route('admin.chat.send-message') }}",
                    data: formData,
                    beforeSend: function() {
                            let message = $('.fp_send_message').val();
                            if(message != '' && $('#receiver_id').val() != ''){
                                let avatar = "{{ asset(auth()->user()->avatar) }}";
                                let html = `<div class="chat-item chat-right" style=""><img src="${avatar}">
                                    <div class="chat-details">
                                        <div class="chat-text">${message}</div>
                                        <div class="chat-time msg_sending ${msg_temp_id}">sending...</div>
                                    </div>
                                </div>`;
                            $('.chat-content').append(html);
                            $('.fp_send_message').val('');
                            $('.fp_chat_user').each(function(){
                            let senderId = $(this).data("user");
                            if($('#mychatbox').attr('data-inbox') == senderId){
                                $(this).find('.got_new_message').html('');
                            }
                            })
                            scrollToBottom()
                        }

                    },
                    success: function(response) {
                        if($('.msg_temp_id').val() == response.msg_temp_id){
                            let formattedDate = formatDate();
                            $('.'+ msg_temp_id).text(formattedDate);
                        }
                    },
                    error: function(xhr, status, error) {
                        errors = xhr.responseJSON.errors;
                        $.each(errors,function(key, value){
                            toastr.error(value);
                        });
                    }
                });
            });

        })

    </script>
@endsection
