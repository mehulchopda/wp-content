function checkIndexFormular () {
    if(document.form.departureDate.value == ''){
        alert('Bitte Anreisedatum eingegeben!');
        document.form.departureDate.focus();
        return false;
    }
    if(document.form.returnDate.value == ''){
        alert('Bitte Abreisedatum eingegeben!');
        document.form.returnDate.focus();
        return false;
    }
    if(document.form.persons.value == ''){
        alert("Bitte Anzahl Personen eingegeben");
        document.form.persons.focus();
        return false;
    }
    if (document.form.journeyType.value == 'FLIGHT') {
        if(document.form.region.value == ''){
            alert('Bitte Ziel eingegeben!');
            document.form.region.focus();
            return false;
        }
    }
}

function checkBookingRequestFormular(){
    
}