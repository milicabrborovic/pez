



<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['brojracuna']) && (strlen($_POST['brojracuna'])) && isset($_POST['datum']) && (strlen($_POST['datum'])))   {
        
        $brojracuna = $_POST['brojracuna'];
        $datum = $_POST['datum'];



        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "test";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Nemoguce povezati se sa bazom');
        }
        else {
            $Select = "SELECT brojracuna FROM racuni WHERE brojracuna = ? LIMIT 1";
            $Insert = "INSERT INTO racuni(brojracuna, datum) values(?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("i", $brojracuna);
            $stmt->execute();
            $stmt->bind_result($resulBrojracuna);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("is",$brojracuna, $datum);
                if ($stmt->execute()) {
                    $msg = "Racun uspjenso unesen!";

                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                $msg = "Racun vec postoji u bazi!";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        $msg = "Sva polja su obavezna!";
        die();
    }
}
else {
    echo "Submit button is not set";
}

header('Location: index.php');
?>
