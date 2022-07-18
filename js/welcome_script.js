var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
document.onreadystatechange = function () {
    const params = new URLSearchParams(window.location.search)
    let reg = params.get('updated')//updated é il queryparam
    if (reg == 'true') {
        myModal.show();
        reg = 'false';
        params.set("updated", reg);
        (function () {
            setTimeout(function () {
                window.location.search = params.toString();
            }, 3000);
        })()
    }
};