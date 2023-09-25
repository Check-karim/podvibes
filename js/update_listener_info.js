var update_listener = {
    btn : document.getElementById('update_listener_info_btn'),
    btn_del : document.getElementById('del_listener_info_btn'),
    username : document.getElementById('update_username_listener'),
    email : document.getElementById('update_email_listener'),
    password : document.getElementById('update_password_listener'),
    msg_error : document.getElementById('msg_error_update_listener'),
    id_user : document.getElementById('update_id_listener'),
}

$(update_listener.btn).click('click', (event) =>{
    event.preventDefault();

    const request1 = new XMLHttpRequest();

    request1.onload = () => {

        let responseObject = null;
        try {
            console.log(request1.responseText);
            responseObject = JSON.parse(request1.responseText);
        } catch (e) {
            console.log("could not parse json " + e);
            if (e) {
                while (update_listener.msg_error.firstChild) {

                    update_listener
                        .msg_error
                        .removeChild(update_listener.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                update_listener
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_update_listener(responseObject);
        }
    };
    console.log(update_listener.id_user);
    const requestData1 = `id_user=${update_listener.id_user.value}&email=${update_listener.email.value}&username=${update_listener.username.value}&password=${update_listener.password.value}`;
    request1.open('post', './request/updatelistener.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

$(update_listener.btn_del).click('click', (event)=>{
    event.preventDefault()

    const request1 = new XMLHttpRequest();

    request1.onload = () => {

        let responseObject = null;
        try {
            console.log(request1.responseText);
            responseObject = JSON.parse(request1.responseText);
        } catch (e) {
            console.log("could not parse json " + e);
            if (e) {
                while (update_listener.msg_error.firstChild) {

                    update_listener
                        .msg_error
                        .removeChild(update_listener.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                update_listener
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_update_listener(responseObject);
        }
    };
    console.log(update_listener.id_user);
    const requestData1 = `id_user=${update_listener.id_user.value}`;
    request1.open('post', './request/deletelistener.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_update_listener(res) {
    if (res.ok) {
        while (update_listener.msg_error.firstChild) {

            update_listener
                .msg_error
                .removeChild(update_listener.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                update_listener
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            document.cookie = "listener_username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
            sessionStorage.removeItem('listener_username');
            location.href = "./index.php";
        }, 1500);

    } else {
        while (update_listener.msg_error.firstChild) {

            update_listener
                .msg_error
                .removeChild(update_listener.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                update_listener
                    .msg_error
                    .appendChild(li);
            });
    }

}