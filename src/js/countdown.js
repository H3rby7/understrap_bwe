(function () {
// Set the date we're counting down to
    var countDownDate = new Date("Dec 1, 2017 00:00:00").getTime();

// Update the count down every 1 second
    var x = setInterval(update, 1000);

    update();

    function update() {

        // Get todays date and time
        var now = new Date().getTime();

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("call-to-action-text").innerHTML = "Jetzt Tickets sichern";
            document.getElementById("countdown").innerHTML = "<!-- Countdown done. -->";
            clearInterval(x);
            return;
        }

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("cd_days").innerHTML = days;
        document.getElementById("cd_hours").innerHTML = hours;
        document.getElementById("cd_minutes").innerHTML = minutes;
        document.getElementById("cd_seconds").innerHTML = seconds;

    }

})();
