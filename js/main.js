
//This file contains general validation and Regex
var emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
function checkEmailRegex() {
    let ele = document.getElementById('email').value();
    if(ele !==emailRegExp){
        customMessage('Email doesn\'t match','Email can\'t get used because it contains not all required values',false);
        alert('Email must contain @,lowercase, one or more dots and ASCII');
    }
}
//From Stackoverflow: https://stackoverflow.com/questions/19605150/regex-for-password-must-contain-at-least-eight-characters-at-least-one-number-a
var pwregex = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,10}";
function checkPWregex() {
    let pw  = document.getElementById('password').value();
    if(pw !== pwregex){
        customMessage('This Password is not valid','Password doesn\'t have all obligatory letters and values',false);
    }

}

//HD input checker
function checkInput() {
    let nameInput = document.querySelector('.userinput').value();
    let pwInput = document.querySelector('.passwordinput').value();
    let corrName = "M133";
    let corrPwd = "M133sec";
    if (nameInput === empty() && pwInput === empty()) {
        customMessage('A problem has occured','Username and Password are empty',false);
        document.querySelector('btn').setAttribute('disabled','true');

    }
    else if (nameInput === corrName && pwInput === corrPwd) {
        customMessage('Login successfull','You are logging in',true);
        let loginForm = {
            name: corrName,
            password: corrPwd
        };
        console.log(loginForm);
        document.querySelector('btn').setAttribute('disabled','false');

    }else if (nameInput !== corrName && pwInput !== corrPwd) {
        customMessage('A Problem has occured','Username and Password wrong',false);
        document.querySelector('btn').setAttribute('disabled','true');
    }

}

//Validate

function formlength(minlength,maxlength) {
    let myminLength =   document.querySelectorAll('input[my-min-length]');
    let mymaxLength =   document.querySelectorAll('input[my-max-length]');
    for(let i = 0; i<myminLength.length;i++){
        let checks = myminLength[i];
        for(let i = 0; i<checks.childNodes; i++)
            checks.addEventListener('keyup', function () {
                let minlength = parseInt(Element.getAttribute('my-min-length'), 10);
                let maxlength= parseInt(Element.getAttribute('my-max-length'),20);
                if (myminLength < minlength) {
                    customMessage('Too short', 'Your input is to short', false);

                } else if (length > maxlength) {
                    customMessage('Too Long', 'Your input is to long', false);
                }
            }
            )
    }

}
function required(bool,id) {
    if(bool === true && idvalue() === empty()){
        customMessage('Field empty','This Field is required',false);
        id.focus();
    }
}
//TO-DO Finish this function
function submit() {
   addEventListener(checkInput());
   setTimeout(document.location.replace('/html/register.'),500);

}




function empty(data)
{
    if(typeof(data) === 'number' || typeof(data) === 'boolean')
    {
        return false;
    }
    if(typeof(data) === 'undefined' || data === null)
    {
        return true;
    }
    if(typeof(data.length) !== 'undefined')
    {
        return data.length === 0;
    }
    let count = 0;
    for(let i in data)
    {
        if(data.hasOwnProperty(i))
        {
            count ++;
        }
    }
    return count === 0;
}

function customMessage(title, content, good){
    if(empty(title) || empty(content)){
        return false;
    }
    document.getElementById("alertContainer").style.visibility="visible";
    document.getElementById("alertBoxTitle").innerHTML=title;
    document.getElementById("alertBoxContent").innerHTML=content;
    if(good===false){
        document.getElementById("alertBoxTitle").style.backgroundColor="indianred";
    }else{
        document.getElementById("alertBoxTitle").style.backgroundColor="forestgreen";
    }
    document.getElementsByTagName("body")[0].style.overflow="hidden";
}
function closeMessage(){
    document.getElementById("alertContainer").style.visibility="hidden";
    document.getElementsByTagName("body")[0].style.overflow="";
}


function save() {
    let a = document.querySelectorAll('input').values();
    for(let i = 0; i<a.length; i++){
        let persObject = {
            Gender:a[i],
            Age: a[i],
            favDrink: a[i],
            Vehicle:a[i],
            favGame:a[i]
        }
        if (empty(persObject)){
            customMessage('OOPS!,something went wrong. ','Your input couldn\'t be saved',false);
        }else{
            console.log(persObject);
        }
    }


}
function samepassword() {
    let firstpw  = document.getElementById('password').value();
    let repeatpw = document.getElementById('repeatpw').value();
    if(repeatpw !== firstpw){
        customMessage('Password don\'t match','The repeated Password doesn\'t match, retype it again',false);
    }

}


