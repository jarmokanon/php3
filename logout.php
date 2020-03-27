<?php
session_start();
// alle sessies verwijderen
if(session_destroy())
{
// terug naar de startpagina
header("Location: index.php");
}
?>