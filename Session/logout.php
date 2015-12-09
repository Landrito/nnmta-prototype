<?php
session_destroy();  // Destroy all values associated with the session.
session_regenerate_id(true); // Regenerate session id for security and remove prior from the server.
?>

<meta http-equiv="refresh" content="0;url=http://localhost:63342/nnmta-prototype/Login.php">
