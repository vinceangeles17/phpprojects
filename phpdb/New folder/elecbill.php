<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electric Company</title>
    <style>
        div {
            background-color: lightgrey;
            width: 300px;
            border: 15px solid black;
            padding: 20px;
            margin: 20px;
        }
        input, select, textarea {
            width: 100%;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body> 
    <h1>ANGELES Electric Company</h1>
    <div>
        <form method="POST" action="">
            <label for="name">Fullname (LN, FN):</label>
            <input type="text" id="name" name="name">

            <label for="Address">Address:</label>
            <input type="text" id="Address" name="Address" >

            <label for="kwatt">No. of Kilowatts:</label>
            <input type="number" id="kwatt" name="kwatt">

            <label for="subscription">Type of subscription:</label>
            <select name="subscription" id="subscription">
                <option value="Select Subscription">-Select subscription-</option>
                <option value="7.25">Residential</option>
                <option value="8.50">Commercial</option>
                <option value="9.75">Industrial</option>
            </select>
            <label for="Organization">Organization(s):</label> <br>
            <label for="org1"> Disconnection</label>
            <input type="checkbox" id="org1" name="org[]" value="Disconnection - 250"> <br>
            <label for="org2"> Reconnection</label>
            <input type="checkbox" id="org2" name="org[]" value="Reconnection - 250"> <br>
            <label for="org3"> Late payment</label><br>
            <input type="checkbox" id="org3" name="org[]" value="Late payment - 200"> <br>
            <label for="org4"> Additional Submeter</label><br>
            <input type="checkbox" id="org4" name="org[]" value="Additional Submeter - 800"> <br>
            <label for="org5"> Submeter Transfer</label><br>
            <input type="checkbox" id="org5" name="org[]" value="Submeter Transfer - 500"> <br>
            <label for="Comment">Comment:</label>
            <textarea id="Comment" name="Comment" rows="4" cols="39"> </textarea>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div>
        <h1>Billing Statement</h1>
        <table>
            <tr>
                <th>FULL NAME:</th>
                <td><?php echo ($_POST["name"]) ? ($_POST["name"]) : ''; ?></td>
            </tr>
            <tr>
                <th>ADDRESS:</th>
                <td><?php echo ($_POST["Address"]) ? ($_POST["Address"]) : ''; ?></td>
            </tr>
            <tr>
                <th>KILOWATTS:</th>
                <td><?php echo ($_POST["kwatt"]) ? ($_POST["kwatt"]) : ''; ?></td>
            </tr>
            <tr>
                <th>SUBSCRIPTION TYPE:</th>
                <td>
                    <?php 
                    if ($_POST["subscription"]) {
                        $subscriptionType = '';
                        switch ($_POST["subscription"]) {
                            case 'Select Subscription':
                                $subscriptionType = 'Select Subscription';
                                break;
                            case '7.25':
                                $subscriptionType = 'Residential';
                                break;
                            case '8.50':
                                $subscriptionType = 'Commercial';
                                break;
                            case '9.75':
                                $subscriptionType = 'Industrial';
                                break;
                        }
                        echo ($subscriptionType);
                    } 
                    ?>
                </td>
            </tr>
            <tr>
                <th>RATE PER kW:</th>
                <td>
                    <?php 
                    echo ($_POST["subscription"]) ? ($_POST["subscription"]) : ''; 
                    ?>
                </td>
            </tr>
            <tr>
                <th>Other Charges</th>
                <td>
                    <?php 
                    if (isset($_POST["org"]) && !empty($_POST["org"])) {
                        echo (implode(", ", $_POST["org"]));
                    } else {
                        echo "None selected.";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>TOTAL OTHER CHARGES</th>
                <td>
                    <?php 
                    $totalOtherCharges = 0;
                    if (isset($_POST["org"]) && !empty($_POST["org"])) {
                        foreach ($_POST["org"] as $charge) {
                            $chargeAmount = explode(" - ", $charge)[1]; 
                            $totalOtherCharges += intval($chargeAmount);
                        }
                    }
                    echo $totalOtherCharges;
                    ?>
                </td>
            </tr>
            <tr>
                <th>TOTAL CHARGES:</th>
                <td>
                    <?php 
                    if (($_POST["kwatt"]) && ($_POST["subscription"]) && $_POST["subscription"] !== 'Select Subscription') {
                        $rate = floatval($_POST["subscription"]);
                        $kilowatts = intval($_POST["kwatt"]);
                        $totalAmount = $rate * $kilowatts + $totalOtherCharges; 
                        echo ($totalAmount);
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>COMMENT:</th>
                <td><?php echo $_POST["Comment"] ? ($_POST["Comment"]) : ''; ?></td>
            </tr>
        </table>
    </div>
</body>
</html>