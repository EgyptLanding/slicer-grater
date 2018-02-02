
    var counter = 2 ;
    setInterval(showHide,2000);

    function showHide() {
        counter++;
        if (document.getElementById) {
            $("#mainPhoto").fadeTo(500, 0.9, function () {
                if(counter % 2 == 1){
                    $("#mainPhoto").attr("src", 'assets/img/product1flippedtrans51.png');
                }else{
                    $("#mainPhoto").attr("src", 'assets/img/product1flippedtrans15.png');
                }
            }).fadeTo(500, 1);
        }
    }

    // video click start play :
    function toggleVideo() {
        var vid = document.getElementById("myVideo");
        if(vid.paused){
            vid.play();
        }else{
            vid.pause();
        }
    }
