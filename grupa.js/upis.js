//  KALENDAR FUNKCIJE JAVASCRIPTA


const daysTag = document.querySelector(".days"),
currentDate = document.querySelector(".current-date"),
prevNextIcon = document.querySelectorAll(".icons span");

// DOHVAĆANJE NOVOG DATUMA ,GODINE MJESECA
let date = new Date(),
currYear = date.getFullYear(),
currMonth = date.getMonth();

// UPIS IMENA MJESECI U KALENDAR
const months = ["SIJEČANJ", "VELJAČA", "OŽUJAK", "TRAVANJ", "SVIBANJ", "LIPANJ", "SRPANJ",
              "KOLOVOZ", "RUJAN", "LISTOPAD", "STUDENI", "PROSINAC"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(), // PRVI DAN U MJESECU
    lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(), // ZADNJI DAN U MJESECU
    lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(), // DOHVATI ZADNJI DAN U MJESECU
    lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate(); // DOHVATI ZADNJI DAN U PROSLOM MJESECU
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) { // STVORI POPIS POD PROŠLOG MJESECA
        liTag += `<li class="inactive">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) { // STVORI POPIS SVIH DANA PROŠLOG MJESECA
        // DODAVANJE CLASSE AKO SE TRENUTNI DAN,MJESEC I GODINA POKLAPAJU
        let isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                     && currYear === new Date().getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) { //  STVARANJE SLJEDEĆEG MJESECA PRVI DAN
        liTag += `<li class="inactive">${i - lastDayofMonth + 1}</li>`
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`; 
    daysTag.innerHTML = liTag;
}
renderCalendar();

prevNextIcon.forEach(icon => { // IKONE MJESECA <>
    icon.addEventListener("click", () => { // DODAVANJE KLIKA NA IKONE
       
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) { 
           
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear(); //UČITAVANJE PROŠLE GODINE SA NOVOM
            currMonth = date.getMonth(); //  UČITAVANJE PROŠLOG MJESECA SA NOVIM
        } else {
            date = new Date(); 
        }
        renderCalendar(); // FUNKCIJA POZIVANJA RENDER KALENDARA
    });
});