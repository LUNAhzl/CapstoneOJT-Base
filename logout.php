<?php
    session_start();
    session_destroy();
?>

<script>
    alert("Thank you for using OJT-RM!\nYou have been Logout!");
    window.location.href="index.php";
</script>