
//date

var date = new Date();
var day = date.getDate();
var month = ["Janeiro", "Fevereiro", "Março", "Abril", "Maior", "Junho", "Julho", "Agosto", "Setembro",
    "Outubro", "Novembro", "Dezembro"];
var year = date.getFullYear();

var str_date = `${day} de ${month[date.getMonth()]} de ${year}`;

document.getElementById("date").innerHTML = str_date;

