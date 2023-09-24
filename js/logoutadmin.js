var logout = {
    btn : document.getElementById('btn-logout-admin'),
}

$(logout.btn).click('click', (event)=>{
    event.preventDefault();

    document.cookie = "admin_username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
    sessionStorage.removeItem('admin_username');
    location.href = "./";
})