<?php 
	include 'include/_header.html';
	include 'layouts/navbar.html';
?>

<div class="container">

<div class="panel panel-deafult player" id="player">
	<div class="row title-area">
		<div class="col-md-3">
			<h4 class="text-center" id="clockbox"></h4>
		</div>
		<div class="col-md-6">
			<h3 class="text-center">Aurora Airport</h3>
		</div>
		<div class="col-md-3">
			<h4 class="text-center" id="date"></h4>
		</div>
	</div>
<div class="panel-body">
<div class="row">
	<div class="col-md-6 ">
		<h3 class="text-center"> Arrivals </h3>
		<hr />
		<table class="table">
    <?php 
      $type = 2;
      include 'src/get_arrivals.php';
    ?>
    </table>
	</div> 
	<div class="col-md-6">
		<h3 class="text-center"> Departures </h3>
		<hr />
      <table class="table">
		<?php 
      include 'src/get_departures.php';
    ?>
    </table>
	</div>
</div>
</div>

</div>
<button onclick="goFullscreen('player'); return false" class="btn btn-default">Fullscreen</button>
</div>
<script type="text/javascript">

function GetClock(){
d = new Date();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('clockbox').innerHTML="Local Time: "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>

<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetDate(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();

document.getElementById('date').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetDate;
</script>




<script type="text/javascript">
  function goFullscreen(id) {
    // Get the element that we want to take into fullscreen mode
    var element = document.getElementById(id);
    
    // These function will not exist in the browsers that don't support fullscreen mode yet, 
    // so we'll have to check to see if they're available before calling them.
    
    if (element.mozRequestFullScreen) {
      // This is how to go into fullscren mode in Firefox
      // Note the "moz" prefix, which is short for Mozilla.
      element.mozRequestFullScreen();
    } else if (element.webkitRequestFullScreen) {
      // This is how to go into fullscreen mode in Chrome and Safari
      // Both of those browsers are based on the Webkit project, hence the same prefix.
      element.webkitRequestFullScreen();
   }
   // Hooray, now we're in fullscreen mode!
  }
</script>

<?php include 'include/_footer.html' ?>