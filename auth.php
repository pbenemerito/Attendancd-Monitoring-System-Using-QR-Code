<?php 
    if (empty($_SESSION["accountId"])) {
?>
        <script>
            location.replace("../login.php")
        </script>
<?php
    }
?>