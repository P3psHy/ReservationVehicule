function verifUsername(){
    const username = document.getElementById("username");

    if(!(/^[a-z]+\.[a-z]+$/.test(username.value))){
        var error = document.createElement("p")
        error.textContent="Nom d'utilisateir incorrect, veuillez utiliser ce format: prenom.nom";
        error.setAttribute('id', 'erreurUsername');
        error.style.cssText="color: red";

        username.parentNode.appendChild(error, username);
        console.log('error');
    }else{
        console.log('ok');
        document.getElementById("erreurUsername").remove();

    }


}