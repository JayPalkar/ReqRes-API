<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create User</title>

        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h1>Create User</h1>
        <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required="required"><br><br>
            <label for="job">Job:</label>
            <input type="text" id="job" name="job" required="required"><br><br>
            <button type="submit" value="Submit">
                Submit</button>
        </form>

        <script>
            function openPopup(data) {
                const popup = window.open('', 'Created User Info', 'width=500,height=300');
                popup
                    .document
                    .write('<pre>' + JSON.stringify(data, null, 2) + '</pre>');
            }
        </script>

        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $url = "https://reqres.in/api/users";
            $data = array(
                "name" => $_POST['name'],
                "job" => $_POST['job']
            );

            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data),
                ),
            );

            $context  = stream_context_create($options);
            $response = file_get_contents($url, false, $context);

            if ($response === FALSE) {
                echo "Error creating user.\n";
            } else {
                $formatted_response = json_encode(json_decode($response), JSON_PRETTY_PRINT);
                echo "<script>openPopup($formatted_response);</script>";
            }
        } 
        ?>
    </body>
</html>