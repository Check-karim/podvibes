var logout = {
    btn : document.getElementById('btn-logout'),
}

$(logout.btn).click('click', (event)=>{
    event.preventDefault();

    document.cookie = "creator_username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
    sessionStorage.removeItem('creator_username');
    location.href = "../";
})