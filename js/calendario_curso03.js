let monthNames = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre','Octubre', 'Noviembre', 'Deciembre'];

let currentDate = new Date();
let currentDay = currentDate.getDate();
let monthNumber = currentDate.getMonth();
let currentYear = currentDate.getFullYear();

let dates = document.getElementById('dates');
let month = document.getElementById('month');
let year = document.getElementById('year');

let diaSeleccionado = document.getElementById('diaSeleccionado');

let prevMonthDOM = document.getElementById('prev-month');
let nextMonthDOM = document.getElementById('next-month');

month.textContent = monthNames[monthNumber];
year.textContent = currentYear.toString();

prevMonthDOM.addEventListener('click', ()=>lastMonth());
nextMonthDOM.addEventListener('click', ()=>nextMonth());


const writeMonth = (month) => {

    for(let i = startDay(); i>0;i--){
        dates.innerHTML += ` <div class="calendar__date calendar__item calendar__last-days">
            ${getTotalDays(monthNumber-1)-(i-1)}
        </div>`;
    }

    for(let i=1; i<=getTotalDays(month); i++){
        if(i===9 && month===10 || i===10 && month===10 || i===11 && month===10) {
            dates.innerHTML += ` <div class="calendar__date calendar__item calendar__today diacurso " data-bs-dismiss="modal"  id="diacurso${i}">${i}</div>`;
        }else{
            dates.innerHTML += ` <div class="calendar__date calendar__item " >${i}</div>`;
        }
    }

    /*for(let i=1; i<=getTotalDays(month); i++){
        if(i===currentDay) {
            dates.innerHTML += ` <div class="calendar__date calendar__item calendar__today">${i}</div>`;
        }else{
            dates.innerHTML += ` <div class="calendar__date calendar__item">${i}</div>`;
        }
    }*/
    var diacurso9 = document.getElementById("diacurso9");
    var diacurso10 = document.getElementById("diacurso10");
    var diacurso11 = document.getElementById("diacurso11");
    var diadecurso = document.getElementById("diadecurso");
    diacurso9.onclick = function(e) {
        diaSeleccionado.innerHTML = 'Ha seleccionado el 9 de noviembre de 2021';
        diadecurso.innerHTML = '<input type="hidden" name="diacurso" value="9 de Noviembre de 2021">';
      }
    diacurso10.onclick = function(e) {
        diaSeleccionado.innerHTML = 'Ha seleccionado el 10 de noviembre de 2021';
        diadecurso.innerHTML = '<input type="hidden" name="diacurso" value="10 de Noviembre de 2021">';
      }
    diacurso11.onclick = function(e) {
        diaSeleccionado.innerHTML = 'Ha seleccionado el 11 de noviembre de 2021';
        diadecurso.innerHTML = '<input type="hidden" name="diacurso" value="11 de Noviembre de 2021">';
      }

}

const getTotalDays = month => {
    if(month === -1) month = 11;

    if (month == 0 || month == 2 || month == 4 || month == 6 || month == 7 || month == 9 || month == 11) {
        return  31;

    } else if (month == 3 || month == 5 || month == 8 || month == 10) {
        return 30;

    } else {

        return isLeap() ? 29:28;
    }
}

const isLeap = () => {
    return ((currentYear % 100 !==0) && (currentYear % 4 === 0) || (currentYear % 400 === 0));
}

const startDay = () => {
    let start = new Date(currentYear, monthNumber, 1);
    return ((start.getDay()-1) === -1) ? 6 : start.getDay()-1;
}

const lastMonth = () => {
    if(monthNumber !== 0){
        monthNumber--;
    }else{
        monthNumber = 11;
        currentYear--;
    }

    setNewDate();
}

const nextMonth = () => {
    if(monthNumber !== 11){
        monthNumber++;
    }else{
        monthNumber = 0;
        currentYear++;
    }

    setNewDate();
}

const setNewDate = () => {
    currentDate.setFullYear(currentYear,monthNumber,currentDay);
    month.textContent = monthNames[monthNumber];
    year.textContent = currentYear.toString();
    dates.textContent = '';
    writeMonth(monthNumber);
}




writeMonth(monthNumber);


