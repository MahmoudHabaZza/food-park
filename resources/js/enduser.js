window.Echo.private("chat." + loggedInUserId).listen("ChatEvent", function (e) {
    let formattedDate = formatDate();
    let html = `<div class="fp__chating">
                                    <div class="fp__chating_img">
                                        <img src="${e.avatar}" alt="" class="img-fluid w-100" style="border-radius:50%;">
                                    </div>
                                    <div class="fp__chating_text">
                                        <p>${e.message}</p>
                                        <span>${formattedDate}</span>
                                    </div>
                                </div>`;
    $(".fp__chat_body").append(html);
    $(".fp__chat_body").scrollTop($(".fp__chat_body").prop("scrollHeight"));
});
