var listener =  {
    // register 
    username : document.getElementById('listener_username'),
    email : document.getElementById('listener_email'),
    password : document.getElementById('listener_password'),
    btn : document.getElementById('listener_submit'),
    msg_error : document.getElementById('msg_error_register_listener'),
}

$(listener.btn).click('click', (event) => {
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
                while (listener.msg_error.firstChild) {

                    listener
                        .msg_error
                        .removeChild(listener.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                listener
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_listener(responseObject);
        }
    };
listener
    const requestData1 = `username=${listener.username.value}&email=${listener.email.value}&password=${listener.password.value}`;
    request1.open('post', './request/registerlistener.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
});

// handle request
function handle_listener(res) {
    if (res.ok) {
        while (listener.msg_error.firstChild) {

            listener
                .msg_error
                .removeChild(listener.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                listener
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            location.href = "./loginlistener.php?page_state=Listen&login=true";
        }, 1000);

    } else {
        while (listener.msg_error.firstChild) {

            listener
                .msg_error
                .removeChild(listener.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                listener
                    .msg_error
                    .appendChild(li);
            });
    }

}