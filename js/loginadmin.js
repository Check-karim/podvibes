var admin = {
    btn : document.getElementById('admin_login_submit'),
    username : document.getElementById('admin_login_username'),
    password : document.getElementById('admin_login_password'),
    msg_error : document.getElementById('msg_error_login_admin'),
}

$(admin.btn).click('click', (event) =>{
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
                while (admin.msg_error.firstChild) {

                    admin
                        .msg_error
                        .removeChild(admin.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                admin
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_login_admin(responseObject);
        }
    };

    const requestData1 = `username=${admin.username.value}&password=${admin.password.value}`;
    request1.open('post', './request/loginadmin.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
});

// handle request
function handle_login_admin(res) {
    if (res.ok) {
        while (admin.msg_error.firstChild) {

            admin
                .msg_error
                .removeChild(admin.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                admin
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            location.href = "./admin.php?page_state=dashboard";
        }, 1500);

    } else {
        while (admin.msg_error.firstChild) {

            admin
                .msg_error
                .removeChild(admin.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                admin
                    .msg_error
                    .appendChild(li);
            });
    }

}