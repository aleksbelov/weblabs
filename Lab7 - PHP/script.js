var tab;
var tabContent;

window.onload=function(){
    document.getElementById('tabs').onclick= onTabClick;
    tabContent = document.getElementsByClassName('tabContent');
    tab = document.getElementsByClassName('tab');
    for (i=1; i<tab.length; i++){
        tabContent[i].classList.add('hide');
    }
}

function onTabClick(event) {
    var target = event.target;
    if (target.className === 'tab') {
        for (var i=0;  i<tab.length; i++) {
            if (target === tab[i]) {
                showTabContent(i);
                break;
            }
        }
    }
}

function showTabContent(n){
    for (i=0; i<tab.length; i++){
        if (i !== n) {
            tab[i].classList.remove('active');
            tabContent[i].classList.remove('show');
            tabContent[i].classList.add('hide');
        }
    }
    tabContent[n].classList.remove('hide');
    tabContent[n].classList.add('show');
    tab[n].classList.add('active');
}

function sameAddressCheckbox(checkbox) {
    if (checkbox.checked === true) {
        var address = document.getElementsByClassName('address');
        var fact_address = document.getElementsByClassName('fact_address');
        for (i=0; i<address.length; i++){
            fact_address[i].value = address[i].value;
            fact_address[i].checked = address[i].checked;
        }
        var c_cell = document.getElementById('countrynamecell');
        var fact_c_cell = document.getElementById('fact_countrynamecell');
        fact_c_cell.style.display = c_cell.style.display;

        if ('required' in c_cell.querySelector('input').attributes) {
            fact_c_cell.querySelector('input').setAttribute('required', '');
        } else {
            fact_c_cell.querySelector('input').removeAttribute('required');
        }

        if ('requred' in c_cell.querySelector('label').classList) {
            fact_c_cell.querySelector('label').classList.add('required');
        } else {
            fact_c_cell.querySelector('label').classList.remove('required');
        }
    }
}

function countryCheck(radio, cellid) {
    var cell = document.getElementById(cellid);
    if (radio.value === 'RF') {
        cell.style.display = 'none';
        cell.querySelector('input').removeAttribute('required');
        cell.querySelector('label').classList.remove('required');
    } else {
        cell.style.display = '';
        cell.querySelector('input').setAttribute('required', '');
        cell.querySelector('label').classList.add('required');
    }
}

function clearAll() {
    var inputs = document.querySelectorAll("input[type=text], textarea");
    for (i = 0; i < inputs.length; ++i) {
        inputs[i].value = '';
    }
}

function checkAll() {
    var ok = true;
    var inputs = document.querySelectorAll("input[type=text][required], textarea");
    for (i = 0; i < inputs.length; ++i) {
        if (inputs[i].value === '') {
            ok = false;
            inputs[i].classList.add('incorrect');
        }
        else {
            inputs[i].classList.remove('incorrect');
        }
    }

    if (ok === false) {
        document.getElementById('errormessage').classList.remove('hide');
        document.getElementById('okmessage').classList.add('hide');
    }
    else {
        document.getElementById('errormessage').classList.add('hide');
        document.getElementById('okmessage').classList.remove('hide');
        sendForm();
    }
}

function sendForm(){
    var formData = new FormData(document.forms.main);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "store.php");
    xhr.send(formData);
}