<?php

// Выход из системы
// Sign Out
session_start();
unset ($_SESSION['id']);
header ('Location: ./');
exit;

?>