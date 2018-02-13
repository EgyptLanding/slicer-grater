
var counter = 2 ;
setInterval(showHide,2000);
setInterval(showHideCounter,1000);

function showHide() {
    counter++;
    if (document.getElementById) {
        $("#mainPhoto").fadeTo(1, 1, function () {
            if(counter % 2 == 1){
                $("#mainPhoto").attr("src", 'assets/img/product1flippedtrans51.png');
            }else{
                $("#mainPhoto").attr("src", 'assets/img/product1flippedtrans15.png');
            }
        }).fadeTo(1, 1);
    }
}
function showHideCounter() {

    if (document.getElementById) {
        $("#counters").fadeTo(500, 0, function () {

        }).fadeTo(500, 1);
    }
}


// text animation :


var string = "";
var str = string.split("");
var el = document.getElementById('str');

(function animate() {
    str.length > 0 ? el.innerHTML += str.shift() : clearTimeout(running);
    var running = setTimeout(animate, 50);

})();

// timer :


