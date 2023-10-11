<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Users</title>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    <h1>List of Users</h1>
    
    <?php
$url = "https://reqres.in/api/users?page=2";
$response = file_get_contents($url);

if ($response === FALSE) {
    echo "Error listing users.\n";
} else {
    $users = json_decode($response, true)["data"];
    
    if (!empty($users)) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Avatar</th></tr>";
        
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>{$user['id']}</td>";
            echo "<td>{$user['email']}</td>";
            echo "<td>{$user['first_name']}</td>";
            echo "<td>{$user['last_name']}</td>";
            echo "<td><img src='{$user['avatar']}' alt='Avatar'></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "No users found.";
    }
}
?>

</body>
</html>
