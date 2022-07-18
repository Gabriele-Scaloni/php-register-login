document.addEventListener("DOMContentLoaded", function (event) {
  //do work
});
var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
document.onreadystatechange = function () {
  const params = new URLSearchParams(window.location.search)
  let reg = params.get('registration')//registration é il queryparam
  if (reg == 'true') {
    myModal.show();
    reg = 'false';
    params.set("registration", reg);
    (function () {
      setTimeout(function () {
        window.location.search = params.toString();
      }, 3000);
    })()
  }
};


