<html>
<head>
  <link rel="stylesheet" href="nav.css">
    <style>
      * {
        margin: 0px;
        padding: 0px;
      }
      body {
        background-image: url("bus.jpeg");
        background-size: cover;
      }

		.div3 {
		  padding-left: 85px;
		  font-weight: bolder;
		  background-color: rgb(158, 188, 226);
		}
      input {
        padding-top: 5px;
        padding-right: 100px;
        padding-bottom: 5px;
      }
      .div1 {
        background-color: white;
        position: absolute;
        right: 50px;
        margin: 150px 0px;
        padding: 20px;
        padding-bottom: 0px;
        border-radius: 10px;
        box-shadow: 0px 0px 15px grey;
      }
      label {
        font-weight: bolder;
      }

      input,
      select {
        margin: 10px 0px;
      }
      select {
        padding-top: 5px;
        padding-right: 130px;
        padding-bottom: 5px;
      }
    </style>
  </head>

  <body background=bus.jpeg>
	<nav class="nav" id="navbar">
		<div id="logo">
			<img src="/jatinphp/bus/logo.png" alt="">
		</div>
		<ul>

			<li><a href="booking.php" class="functions"> Booking </a></li>
			<li><a href="cancelticket.php" class="functions"> Cancellation </a></li>
			<li><a href="showbookings.php" class="functions"> My Bookings</a></li>
		</ul>
	</nav>
    <div class="div1">
      <form action="/jatinphp/bus/search_bus.php" name="frm" method="POST" onsubmit="return loc(this)">
        <label for="source">Enter Source:</label><br />
        <select id="source" name="source">
          <option value="Bhuj">Bhuj</option>
          <option value="Ahemadabad">Ahemadabad</option>
          <option value="Vadodara">Vadodara</option>
          <option value="Anand">Anand</option></select
        ><br />
        <label for="destination">Enter Destination:</label><br />
        <select id="destination" name="destination">
          <option value="Bhuj">Bhuj</option>
          <option value="Ahemadabad">Ahemadabad</option>
          <option value="Vadodara">Vadodara</option>
          <option value="Anand">Anand</option></select
        ><br />
        <label for="date">Date:</label><br />
        <input type="date" id="date" name="date" required /><br />
        <input class="div3" type="submit" value="Search" />
      </form>
    </div>
    <script>
      function loc(form) {
        s=document.getElementById("source").value;
        d=document.getElementById("destination").value;
        if(s==d)
        {
        	alert("Source and Destination can't be same");
        	return false;
        }
        let today = new Date();
        da = today.getDate();
        m = today.getMonth() + 1;
        y = today.getFullYear();
        let maxdate = new Date(y, m - 1, da + 15);
        with (form) {
          var rdate = date.value;
        }
        today = Date.parse(today);
        maxdate = Date.parse(maxdate);
        rdate = Date.parse(rdate);
        if (rdate < today || rdate > maxdate) {
          alert("Ticket is not available");
          return false;
        }
        return true;
      }
    </script>
  </body>
</html>
