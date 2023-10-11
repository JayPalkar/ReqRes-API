<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch User by ID</title>

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Fetch User by ID</h1>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
        <label for="userId">User ID:</label>
        <input type="number" id="userId" name="userId" required><br><br>
        <button type="submit" value="Fetch User">Fetch User</button>
    </form>

    <script>
        function openPopup(data){
            const popup = window.open('', 'Fetched User Info', 'width=500,height=300')
            popup.document.write('<pre>'+ JSON.stringify(data, null, 2) +'</pre>')
        }
    </script>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    
    $url = "https://reqres.in/api/users/{$userId}";
    
    $response = file_get_contents($url);
    
    if ($response === FALSE) {
        echo "Error fetching user.\n";
    } else {
        $decoded_response = json_decode($response, true);
        
        if (isset($decoded_response['support'])) {
            unset($decoded_response['support']);
        }
        
        $formatted_response = json_encode($decoded_response, JSON_PRETTY_PRINT);
        echo "<script>openPopup($formatted_response);</script>";
    }
}
?>
</body>
</html>
