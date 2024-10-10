<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sample</title>
    <style>
        h1{
            text-align: center;
        }
        table {
            width: auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px 10px;
            border: 2px solid #E2F1E7;
            text-align: left;
        }
        th {
            background-color: #387478;
        }
    </style>
</head>
<body>
<!--No. 3 FETCH_ALL(). USE PRINT_R(). WITH "<pre>" TAG IN BETWEEN-->
<?php
    $stmt = $pdo->prepare("SELECT * FROM Customers");
    if ($stmt->execute()){
        echo "<pre>";
        print_r($stmt->fetchAll());
        echo "<pre>";
    }
    ?>
<!--No. 4 FETCH() IS USED. USE PRINT_R(). WITH “<pre>” TAG IN BETWEEN-->
 <?php
    $stmt = $pdo->prepare("SELECT * FROM Customers WHERE customer_id = 32");

    if ($stmt->execute()){
        echo "<pre>";
        print_r($stmt->fetch());
        echo "<pre>";
    }
    ?>
<!--No. 5 INSERTION OF RECORD-->
<?php 
$query = "INSERT INTO customers(customer_id, first_name, last_name, address, city, state, phone_number, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);

    $executeQuery=$stmt->execute(
        [100, "Nilou", "Lagmay", "Lovely Street", "Sumeru", "Teyvat", "09951312315", "NilouEnjoyer@gmail.com"]
    );

    if ($executeQuery) {
        echo "Query Successful";
    }
    else {
        echo "Query Failed";
    }
    ?>
<!--No. 6 DELETION OF RECORD-->
<?php
    $query = "DELETE FROM customers WHERE customer_id = 3";

    $stmt = $pdo->prepare($query);

    $executeQuery = $stmt->execute();

    if ($executeQuery){
        echo "Deletion of data is Successful";
    }
    else {
        echo "Deletion of data Failed";
    }
    ?>
<!--No. 7 UPDATING OF RECORD -->
<?php
        $query = "UPDATE customers SET first_name = ?, last_name = ? WHERE customer_id = 22";

        $stmt = $pdo->prepare($query);

        $executeQuery = $stmt->execute(
            ["Citlali", "Lagmay"]
        );

        if ($executeQuery) {
            echo "Record updated";
        }
        else {
            echo "Record failed to update";
        }
    ?>
<!--No.8 SQL QUERY’S RESULT SET IS RENDERED ON AN HTML TABLE -->
<h1>Customer List for 2024</h1>
<table>
    <thead>
        <tr>
            <th>Customer ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Phone Number</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT customer_id, first_name, last_name, address, city, state, phone_number, email FROM customers";
        $stmt = $pdo->query($sql);
        $customers = $stmt->fetchAll();

        foreach ($customers as $customer): ?>
            <tr>
                <td><?php echo htmlspecialchars($customer['customer_id']); ?></td>
                <td><?php echo htmlspecialchars($customer['first_name']); ?></td>
                <td><?php echo htmlspecialchars($customer['last_name']); ?></td>
                <td><?php echo htmlspecialchars($customer['address']); ?></td>
                <td><?php echo htmlspecialchars($customer['city']); ?></td>
                <td><?php echo htmlspecialchars($customer['state']); ?></td>
                <td><?php echo htmlspecialchars($customer['phone_number']); ?></td>
                <td><?php echo htmlspecialchars($customer['email']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>