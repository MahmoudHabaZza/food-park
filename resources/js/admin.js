window.Echo.private("chat." + loggedInUserId).listen("ChatEvent", function (e) {
    console.log(e);
    let currentDate = new Date();
    let formattedTime = currentDate.toLocaleString("en-US", {
        day: "numeric",
        month: "numeric",
        year: "numeric",
        hour: "numeric",
        minute: "numeric",
        hour12: true,
    });
    let html = `<div class="chat-item" style=""><img src="${e.avatar}" style="width:50px;height:50px;object-fit:cover;">
                    <div class="chat-details">
                        <div class="chat-text">${e.message}</div>
                        <div class="chat-time">${formattedTime}</div>
                    </div>
                </div>`;
    $(".chat-content").append(html);
    $('.chat-content').scrollTop($('.chat-content').prop("scrollHeight"));
});
