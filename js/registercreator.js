var creator =  {
    // register 
    username : document.getElementById('creator_username'),
    email : document.getElementById('creator_email'),
    membership : document.getElementById('ep_membership'),
    password : document.getElementById('creator_password'),
    btn : document.getElementById('creator_submit'),
    msg_error : document.getElementById('msg_error_register_creator'),

}

$(creator.btn).click('click', (event) => {
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
                while (creator.msg_error.firstChild) {

                    creator
                        .msg_error
                        .removeChild(creator.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                creator
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle(responseObject);
        }
    };

    const requestData1 = `username=${creator.username.value}&email=${creator.email.value}&password=${creator.password.value}&membership=${creator.membership.value}`;
    request1.open('post', './request/registerCreator.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
});

// handle request
function handle(res) {
    if (res.ok) {
        while (creator.msg_error.firstChild) {

            creator
                .msg_error
                .removeChild(creator.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                creator
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            location.href = "./logincreator.php?page_state=Upload&login=true";
        }, 1000);

    } else {
        while (creator.msg_error.firstChild) {

            creator
                .msg_error
                .removeChild(creator.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                creator
                    .msg_error
                    .appendChild(li);
            });
    }

}