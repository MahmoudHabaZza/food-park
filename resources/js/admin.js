window.Echo.private("chat." + loggedInUserId).listen("ChatEvent", function (e) {
    console.log(e);
    let inbox = $('#mychatbox').attr('data-inbox');
    console.log(inbox);
    if(e.senderId == inbox) {
        let formattedTime = formatDate();

        let html = `<div class="chat-item" style=""><img src="${e.avatar}" style="width:50px;height:50px;object-fit:cover;">
                        <div class="chat-details">
                            <div class="chat-text">${e.message}</div>
                            <div class="chat-time">${formattedTime}</div>
                        </div>
                    </div>`;
        $(".chat-content").append(html);
        $('.chat-content').scrollTop($('.chat-content').prop("scrollHeight"));
    }

    $('.fp_chat_user').each(function(){
        let senderId = $(this).data("user");
        if(e.senderId == senderId){
            $(this).find('.got_new_message').html('<i class="beep"></i>New Message');
        }
    })

    $(".unseen_messages").addClass('beep');
});
