function searchptr(search){
    //var searchvar=getElementById('search');
    var searchpattern=/^[a-zA-Z0-9]+$/;
   
    if(search.value.match(searchpattern)){
        return true;
    }
    else{
        alert("Try without any special characters");
        //search.select();
        return false;   
    }
}