var update = {
    btn : document.getElementById('update_info_btn'),
    btn_del : document.getElementById('del_info_btn'),
    username : document.getElementById('update_username'),
    email : document.getElementById('update_email'),
    password : document.getElementById('update_password'),
    msg_error : document.getElementById('msg_error_update_creator'),
    id_user : document.getElementById('update_id'),
}

$(update.btn).click('click', (event) =>{
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
                while (update.msg_error.firstChild) {

                    update
                        .msg_error
                        .removeChild(update.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                update
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_update(responseObject);
        }
    };
    console.log(update.id_user);
    const requestData1 = `id_user=${update.id_user.value}&email=${update.email.value}&username=${update.username.value}&password=${update.password.value}`;
    request1.open('post', './request/updatecreator.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

$(update.btn_del).click('click', (event)=>{
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
                while (update.msg_error.firstChild) {

                    update
                        .msg_error
                        .removeChild(update.msg_error.firstChild);
                }
                const li = document.createElement('li');

                li
                    .classList
                    .add("alert-danger");
                li.textContent = "Error ".e;
                update
                    .msg_error
                    .appendChild(li);

            }
        }

        if (responseObject) {
            handle_update(responseObject);
        }
    };
    console.log(update.id_user);
    const requestData1 = `id_user=${update.id_user.value}`;
    request1.open('post', './request/deletecreator.php');
    request1.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

    request1.send(requestData1);
})

// handle request
function handle_update(res) {
    if (res.ok) {
        while (update.msg_error.firstChild) {

            update
                .msg_error
                .removeChild(update.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-success");
                li.textContent = message;
                update
                    .msg_error
                    .appendChild(li);
            });
        // location.reload();
        setTimeout(function () {
            document.cookie = "creator_username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
            sessionStorage.removeItem('creator_username');
            location.href = "../index.php";
        }, 1500);

    } else {
        while (update.msg_error.firstChild) {

            update
                .msg_error
                .removeChild(update.msg_error.firstChild);
        }
        res
            .messages
            .forEach((message) => {
                const li = document.createElement('li');
                li
                    .classList
                    .add("alert-danger");
                li.textContent = message;
                update
                    .msg_error
                    .appendChild(li);
            });
    }

}