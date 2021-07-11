$(document).on("click", '.submit', function(event) {
    var to_user_id = $(this).attr('id');
    to_user_id = to_user_id.replace(/chatButton/g, "");
    sendMessage(to_user_id);
    });

function updateUserChat() {
    $('li.contact.active').each(function(){
    var to_user_id = $(this).attr('data-touserid');
    $.ajax({
    url:"chat_action.php",
    method:"POST",
    data:{to_user_id:to_user_id, action:'update_user_chat'},
    dataType: "json",
    success:function(response){
    $('#conversation').html(response.conversation);
    }
    });
    });
}