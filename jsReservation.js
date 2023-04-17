var check1=false;
var check2=false;
var check3=false;

function verifDateDebut(){
    const dateDebut = new Date(document.getElementById("dateDebut").value);

    var q = new Date();
    var date = new Date(q.getFullYear(),q.getMonth(),q.getDate());

    if(dateDebut < date){
        alert('Date incorrect ! Veuillez saisir la date du jour ou une date ultérieur.');

        check1=false;
        verifButton();
    }else{
        check1=true;
        verifButton();
    }
}


function verifDateFin(){

    const dateDebut = new Date(document.getElementById("dateDebut").value);
    const dateFin = new Date(document.getElementById("dateFin").value);


    var Difference_In_Time = dateFin.getTime() - dateDebut.getTime();
    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24);

    if(Difference_In_Days<0 || Difference_In_Days>7){
        alert('Date incorrect ! La date de fin ne doit ni être antérieur ni excéder 7 jour après la date de réservation.');

        check2=false;
        verifButton();
    }else{
        check2=true;
        verifButton();

    }

}

function verifVehicule(){

    const listeVehicule = document.getElementById("listeVehicule").value;


    if(listeVehicule == "default"){
        alert('Veuillez sélectiooner un véhicule');

        check3=false;
        verifButton();
    }else{
        check3=true;
        verifButton();

    }
}

function verifButton(){
    if(check1 && check2 && check3){
        document.getElementById('submitReservation').disabled = false;
    }else{
        document.getElementById('submitReservation').disabled = true;

    }
}