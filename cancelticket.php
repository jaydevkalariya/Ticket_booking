<?php
$conn = mysqli_connect("localhost", "root", "", "bus_project");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ticket_id = $_POST['cancell'];
    if ($ticket_id) {
        $sql = "DELETE FROM `ticket_info` WHERE `ticket_info`.`ticket_id` = '$ticket_id'; ";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>
            alert('Your Ticket was successfully CANCELD.');
            </script>";
        }
    }
}
session_start();
$nodata = false;
$p_id = $_SESSION['p_id'];
$sql = "SELECT * FROM `ticket_info` WHERE `p_id`= ' $p_id ' ";
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num == 0)
    $nodata = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="nav.css">

    <style>
        table {
            width: 94%;
            border: 2px solid black;
            margin: 40px 40px;
            padding: 20px;
        }

        th,
        td {
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

        button {
            font-size: large;
            margin-top: 10px;
            width: 150px;
            padding: 5px;
            border-radius: 20px;
            border-width: 1px;
            box-shadow: 0 2px #999;
            cursor: pointer;
        }

        button:hover {
            background-color: rgb(158, 188, 226);
        }

        button:active {
            box-shadow: 0 1px #999;
            transform: translateY(4px);
        }
    </style>
</head>

<body>
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
    <?php
    if (!$nodata) {
        echo '<h1 style="text-align: center; margin-top: 50px; color: black;">YOUR BOOKINGS</h1>';
        while ($data = mysqli_fetch_assoc($result)) {
            $ticket_id = $data['ticket_id'];
            $bus_id = $data['bus_id'];
            $total_seats = $data['seats'];
            $fare = $data['total_fare'];
            $date = $data['date'];
            $sql = "SELECT * FROM `bus_route` WHERE `bus_id`='$bus_id'";
            $result2 = mysqli_query($conn, $sql);
            if ($result2) {
                $data2 = mysqli_fetch_assoc($result2);
                $departure = $data2['departure'];
                $dtime = 'AM';
                if ($departure > '12:00') $dtime = 'PM';
                $arrival = $data2['arrival'];
                $atime = 'AM';
                if ($departure > '12:00') $atime = 'PM';
                $route_id = $data2['route_id'];
                $sql = "SELECT * FROM `route_info` WHERE `route_id`='$route_id'";
                $result2 = mysqli_query($conn, $sql);
                if ($result2) {
                    $data2 = mysqli_fetch_assoc($result2);
                    $source = $data2['source'];
                    $destination = $data2['destination'];
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
                        <form action="cancelticket.php" method="POST">
                        <th><button name="cancell" id="cancel" value=' . $ticket_id . ' onclick="return alert()">cancel now</button>
                        </th>
                    </tr>';
                    echo
                    '<tr>
                    <td>' . $source . '</td>
                    <td>' . $destination . '</td>
                    <td>' . $departure . " " . $dtime . '</td>
                    <td>' . $arrival . " " . $atime . '</td>
                    <td>' . $total_seats . '</td>
                    <td>' . $fare . '</td>
                    <td>' . $date . '</td>
                    </tr>
                </table>';
                }
            } else {
                echo "SORRY data was retrive<br>";
            }
        }
    } else
        echo 'NO DATA FOUND !!';
    ?>
    <script>
       function alert(){
           if(confirm('Really you want to cancel the ticket!')){
               return true;
           }
           return false;
       }
    </script>
</body>

</html>