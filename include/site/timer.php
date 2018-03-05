<script>
var countDownTime = new Date().getTime();
countDownTime+=(1000*60*40)+2;
var x = setInterval(function() {
  var now = new Date().getTime();
  var distance = countDownTime - now;
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("timer").innerHTML = minutes + ":" + seconds;
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("timer").innerHTML = "EXPIRED";
    $('.rm7228').css('z-index','100');
  }
}, 1000);
</script>