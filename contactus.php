<html>
  <head>
    <link rel="stylesheet" href="nav.css" />
    <style>
      * {
        margin: 0px;
        padding: 0px;
      }

      body {
        background-color: white;
      }

      div {
        color: black;
      }
      a {
        text-decoration: none;
        color: black;
      }
      .flex {
        display: flex;
        justify-content: center;
        justify-content: space-evenly;
      }

      #touch {
        margin: 50px;
      }

      .div1,
      .div2,
      .div3 {
        margin-top: 40px;
        box-shadow: 0px -10px 1px black;
        background-color: white;
        display: inline-block;
        width: 25%;
        font-size: large;
        border: 2px solid black;
        border-radius: 25px;
      }
	  img{
		height: 6vw;
	  }
    </style>
  </head>

  <body>
    <nav class="nav" id="navbar">
      <div id="logo">
			<img src="/jatinphp/bus/logo.png" alt="">
      </div>
      <ul>
        <li><a href="homepage.php" class="ch">Home</a></li>
        <li>
          <a href="querypage.php" class="ch"
            ><acronym title="Frequently Asked Question">FAQ</acronym></a
          >
        </li>
        <li><a href="loginpage.php" class="ch">Login</a></li>
        <li><a href="aboutus.php" class="ch">About Us</a></li>
        <li><a href="contactus.php" class="ch">Contact Us</a></li>
      </ul>
    </nav>
    <h1 align="center" id="touch">GET IN TOUCH</h1>
    <div class="flex">
      <div class="div1" align="center">
        <img src="address.png"/>
        <pre>
<b>ADDRESS</b>

Vadodara
Near Central Bus Depot
Aurobindo Ghosh Rd

Bhuj 
127 Aashirvad cottage
Sanskar Nagar

Anand
Near Bus stand
Ganesh Colony

Ahemadabad
Big bazar
Bopal Ring Road


</pre
        >
      </div>
      <div class="div2" align="center">
        <img src="phone.png"/>
        <pre>
<b>PHONE</b> 

Vadodara Central
1800 233 666 666


Bhuj Central
02834 223 004


Anand New Bus Stand
02692 253 293


Ahemadabad Central
079 2546 3409

</pre
        >
      </div>
      <div class="div3" align="center">
        <img src="email.png"/>
        <pre>
<b>EMAIL</b> 

<a href=busatvadodara@gmail.com>busatvadodara@gmail.com</a>



<a href=busatanand@gmail.com>busatanand@gmail.com</a>



<a href=busatamd@gmail.com>busatamd@gmail.com</a>



<a href=busatbhuj@gmail.com>busatbhuj@gmail.com</a>
</pre>
      </div>
    </div>
  </body>
</html>
