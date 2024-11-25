<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants</title>
    <link rel="stylesheet" href="applications.css">
</head>
<body>
<h1 class="page-title">Pending Applications</h1>
    <div class="database-container">
        <?php
        $servername = "localhost";
        $username = "root"; 
        $password = "";     
        $dbname = "applications"; 
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT name, age, bio, email, image_name FROM applicants";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                echo "<h2>List of Applicants:</h2>";
                echo "<table>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Bio</th>
                            <th>Email</th>
                            <th>Image</th>
                        </tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . htmlspecialchars($row["name"]) . "</td>
                            <td>" . htmlspecialchars($row["age"]) . "</td>
                            <td>" . htmlspecialchars($row["bio"]) . "</td>
                            <td>" . htmlspecialchars($row["email"]) . "</td>
                            <td><img src='" . htmlspecialchars($row["image_name"]) . "' alt='Profile Image'></td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No pending applications.</p>";
            }
        } else {
            echo "Error in SQL query: " . $conn->error;
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
