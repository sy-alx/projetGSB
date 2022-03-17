<?php
    session()->destroy();
    echo "Déconnecté ! Redirection en cours ...";

?>

<script>
      function greet() {
        window.location.replace("http://localhost");
        alert('coucou');
}
setTimeout(greet, 2000);
    </script>
    