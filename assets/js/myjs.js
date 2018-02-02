
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

    // timer :

    // Set the date we're counting down to

    Date.prototype.addHours= function(h){
        this.setHours(this.getHours()+h);
        return this;
    }



    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date().addHours(5);
    initializeClock('clockdiv', deadline);