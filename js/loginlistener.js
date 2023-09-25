var listener_login =  {
    // login
    username : document.getElementById('listener_login_username'),
    password : document.getElementById('listener_login_password'),
    btn : document.getElementById('listener_login_submit'),
    msg_error : document.getElementById('msg_error_login_listener'),
}

$(listener_login.btn).click('click', (event) => {
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
                while (listener_login.msg_error.firstChild) {

                    listener_login
                        .msg_error
                        .removeChild(listener_login.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                listener_login
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_login_listener(responseObject);
        }
    };

    const requestData1 = `username=${listener_login.username.value}&password=${listener_login.password.value}`;
    request1.open('post', './request/loginlistener.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
});

// handle request
function handle_login_listener(res) {
    if (res.ok) {
        while (listener_login.msg_error.firstChild) {

            listener_login
                .msg_error
                .removeChild(listener_login.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                listener_login
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            location.href = "./listen.php?page_state=Listen";
        }, 1500);

    } else {
        while (listener_login.msg_error.firstChild) {

            listener_login
                .msg_error
                .removeChild(listener_login.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                listener_login
                    .msg_error
                    .appendChild(li);
            });
    }

}