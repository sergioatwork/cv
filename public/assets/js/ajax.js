var pop_send = {
    content : '<div class="spinner-border text-primary" role="status"></div>',
    html: true,
    placement : 'top', 
    template : '<div class="popover border-primary mb-4" role="tooltip"><div class="popover-body"></div></div>'
    };
var pop_success = {
    content : '<h6 class="text-success text-center m-0">Message envoyé avec succès.</h6>',
    html: true,
    placement : 'top', 
    template : '<div class="popover border-success mb-4" role="tooltip"><div class="popover-body"></div></div>'
    };
var pop_error = {
    content : '<h6 class="text-danger text-center m-0">Une erreur s\'est produite lors de l\'envoi de votre message.<br>Merci de réessayer.</h6>',
    html: true,
    placement : 'top', 
    template : '<div class="popover border-danger mb-4" role="tooltip"><div class="popover-body"></div></div>'
    };

/***
 *     █████╗      ██╗ █████╗ ██╗  ██╗
 *    ██╔══██╗     ██║██╔══██╗╚██╗██╔╝
 *    ███████║     ██║███████║ ╚███╔╝ 
 *    ██╔══██║██   ██║██╔══██║ ██╔██╗ 
 *    ██║  ██║╚█████╔╝██║  ██║██╔╝ ██╗
 *    ╚═╝  ╚═╝ ╚════╝ ╚═╝  ╚═╝╚═╝  ╚═╝
 *                                    
 */

requeteXHR = function(route, dataPost, action){
    var reqXhr = new XMLHttpRequest();
    var data = dataPost;
    reqXhr.onload = function(){action(reqXhr.responseText, reqXhr.status)};
    reqXhr.error = function(){action(reqXhr.responseText, reqXhr.status)};
    reqXhr.abort = function(){action(reqXhr.responseText, reqXhr.status)};
    reqXhr.open("POST", route);
    reqXhr.send(data);
}

returnSendMsg = function(responseXhr, responseStatus){
    $('#btn_send').popover('dispose')
    try {
        if (responseXhr != null && responseStatus == 200) {
            var resultSendMsg = JSON.parse(responseXhr);
            if (resultSendMsg.statusMail) {
                $('#btn_send').popover(pop_success);
                $('#btn_send').popover('show');
            } else {
                throw true;
            }
        } else {
            throw true;
        }
    } catch(error) {
        $('#btn_send').popover(pop_error);
        $('#btn_send').popover('show');
    }
    setTimeout(function(){$('#btn_send').popover('dispose')}, 3000);
}


document.querySelector("#btn_send").addEventListener("click", function(event){
    event.preventDefault();
    var dataForm = new FormData(document.querySelector("#form_send_msg"));
    $('#btn_send').popover(pop_send);
    $('#btn_send').popover('show');
    requeteXHR("backend.php", dataForm, returnSendMsg)}); // voir si l'on peut mettre des valeurs par défaut du type returnSendMsg(null, null)
