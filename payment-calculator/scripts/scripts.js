console.log("Hello World");
var intrate = 0;
var period = 6;
var price = 0;
var monthly = 0;
// function calculate() {
$(document).ready(function() {
    
    $('input[type=radio][name="intrate"]').change(function() {
        intrate = parseInt($(this).val());
        // console.log(intrate);
    });

    $('input[type=radio][name="period"]').change(function() {
        period = parseInt($(this).val());
        // console.log(period);
    });
  })

function calculate() {
    price = document.getElementById("price").innerHTML;
    monthly = ((price - (price*0.1))*(intrate/100))+(price - (price*0.1))/period;
    payment.innerHTML = monthly.toFixed(2);
}


