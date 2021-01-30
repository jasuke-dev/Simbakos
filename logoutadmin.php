<?php
session_start();
session_destroy();
session_unset();
echo "<script>alert('Anda telah keluar dari halaman Administrator');document.location='admin.php'</script>";
?>