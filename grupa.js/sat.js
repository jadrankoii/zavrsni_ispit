

/*FUNKCIJA ZA TRENUTNO VRIJEME U ZAGLAVLJU*/

function Vrijeme(){
    time = new Date()
    sat=time.getHours()
    minuti=time.getMinutes()
    sekunde=time.getSeconds()
    temp = "" + ((sat>12)?sat-12:sat)
    temp += ((minuti<10)?":0":":")+minuti
    temp += ((sekunde<10)?":0":":")+sekunde
    temp += ((sat>=12)?" P.M.":" A.M.")
    document.vrijemeForma.cifre.value=temp
    setTimeout("Vrijeme()",1000)
    //posle svakih 1000milisekundi, odnosno 1 sekunde
    //ponovo se ucitava funkcija Vrijeme()
    }