function orderform(){
    var full_name=document.getElementById("full-name");
    var contact1=document.getElementById("contact");
    var phoneno=/^\d{10}$/;
    var email=document.getElementById("email");
    var address=document.getElementById("address");

    if(full_name.value==""){
        alert("Please enter your Name");
        full_name.focus();
        return false;
    }
    else if(email.value==""){
        alert("Please Enter E-mail");
        email.focus();
        return false;
    }
    else if(address.value==""){
        alert("Please Enter Address");
        address.focus();
        return false;
    }
    else if(contact1.value!=""){
        if(contact1.value.match(phoneno)){
            return true;
        }
        else{
            alert("Enter valid phone-number");
            contact1.select();
            return false;
        }
    }
}