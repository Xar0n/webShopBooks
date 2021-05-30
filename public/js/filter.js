function toggle_visibility(id) {
    var e = document.getElementById(id);
    e.style.display = (e.style.display == 'block') ? 'none' : 'block';
}

$("#inputNumber").mask("8(999) 999-9999");
