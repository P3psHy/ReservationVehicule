var check1=0;
var check2=0;
var check3=0;

function verifDateDebut(){
    const dateDebut = document.getElementById("dateDebut").value;
    const date = new Date();
    console.log('test+');
    if(dateDebut <date){
        console.log('Date incorrect');
        alert('date incorrect');
    }
}