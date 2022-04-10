<?php
    $conn=mysqli_connect("localhost","root","","bus_project");
    $nodata=true;
    $none=true;
    $bus_id;
    $total_seats;
    $fare;
    $date;
    $ticket_id;
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $none=false;
        $ticket_id=$_POST['ticket'];
        $sql="SELECT * FROM `ticket_info` WHERE `ticket_id`='$ticket_id'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if($num==0) $nodata=true;
        else
        {
            $none=false;
            $nodata=false;
            session_start();
            $_SESSION['ticket']=$ticket_id;
            $data=mysqli_fetch_assoc($result);
            $bus_id=$data['bus_id'];
            $total_seats=$data['seats'];
            $fare=$data['total_fare'];
            $date=$data['date'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #cform{
            width: 500px;
            margin:100px auto;
        }
        input {
            margin: 10px;
            padding: 2px;
            border-radius: 5px;
            border: 2px solid black;
        }
        #go,#yes,#no{
            margin-left: 30px;
            border-radius: 5px;
            font-weight: bolder;
            width: 50px;
            text-align: center;
            padding: 5px 0px;
            cursor: pointer;
        }
        #go{
            margin-left: 150px;
        }
        label,span{
            font-weight: bolder;
        }
        #go:hover,#yes:hover,#no:hover {
            background-color: rgb(158, 188, 226);
        }
        #select{
            margin:100px 500px;
        }
        table{
            width: 94%;
            border: 2px solid black;
            margin: 40px 40px;
            padding: 20px;
        }
        th,td {
            margin: 20px 250px;
            padding-left: 65px;
        }

        th {
            font-size: large;
            font-weight: bold;
            color: rgb(155, 77, 77);
        }

        td {
            color: black;
            font-weight: lighter;
            text-align: center;
            vertical-align: middle;
        }
        #nodata{
            margin-left:50px;
        }
    </style>
</head>
<body>
    <div id="cform">
    <form action="cancelticket.php" method="POST">
        <label for="ticket">Enter Ticket Number:</label>
        <input type="number" name="ticket" id="ticket"><br>
        <input type="submit" value="Go" id="go">
    </form>
    </div>
    <?php
        if(!$none){
        if(!$nodata){
            echo '<h1 style="text-align: center; margin-top: 50px; color: rgb(62, 121, 197);;">Results</h1>';
            $sql="SELECT * FROM `bus_route` WHERE `bus_id`='$bus_id'";
            $result=mysqli_query($conn,$sql);
            $data=mysqli_fetch_assoc($result);
            $departure = $data['departure'];
            $dtime = 'AM';
            if ($departure > '12:00') $dtime = 'PM';
            $arrival = $data['arrival'];
            $atime = 'AM';
            if ($departure > '12:00') $atime = 'PM';
            $route_id=$data['route_id'];
            $sql="SELECT * FROM `route_info` WHERE `route_id`='$route_id'";
            $result=mysqli_query($conn,$sql);
            $data=mysqli_fetch_assoc($result);
            $source=$data['source'];
            $destination=$data['destination'];
            $source = ucfirst($source);
            $destination = ucfirst($destination);
                echo
                    '<table>
                    <tr>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Departure</th>
                        <th>Arrival</th>
                        <th>Total Seats</th>
                        <th>Fare</th> 
                        <th>Date</th>
                    </tr>'; 
                    echo 
                    '<tr>
                    <td>' . $source . '</td>
                    <td>' . $destination . '</td>
                    <td>' . $departure . " " . $dtime . '</td>
                    <td>' . $arrival . " " . $atime . '</td>
                    <td>' . $total_seats . '</td>
                    <td>' . $fare . '</td>
                    <td>' .$date. '</td>
                    </tr>
                </table>
                <div id="select">
                    <span>Are You Sure To Cancel The Ticket?</span>
                    <form action="cancelticket2.php" method="POST"><input type="submit" id="yes" value="Yes">
                    <button id="no">No</button></form>
                </div>';
            }
            else
                echo '<span id="nodata">NO DATA FOUND !!</span>';
        }
    ?>
</body>
</html>