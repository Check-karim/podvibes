var creator_login =  {
    // login
    username : document.getElementById('creator_login_username'),
    password : document.getElementById('creator_login_password'),
    btn : document.getElementById('creator_login_submit'),
    msg_error : document.getElementById('msg_error_login_creator'),
}

$(creator_login.btn).click('click', (event) => {
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
                while (creator_login.msg_error.firstChild) {

                    creator_login
                        .msg_error
                        .removeChild(creator_login.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                creator_login
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_login_creator(responseObject);
        }
    };

    const requestData1 = `username=${creator_login.username.value}&password=${creator_login.password.value}`;
    request1.open('post', './request/logincreator.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
});

// handle request
function handle_login_creator(res) {
    if (res.ok) {
        while (creator_login.msg_error.firstChild) {

            creator_login
                .msg_error
                .removeChild(creator_login.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                creator_login
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            location.href = "./creator/index.php?page_state=add-episode";
        }, 1500);

    } else {
        while (creator_login.msg_error.firstChild) {

            creator_login
                .msg_error
                .removeChild(creator_login.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                creator_login
                    .msg_error
                    .appendChild(li);
            });
    }

}