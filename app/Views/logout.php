<?php
    session()->destroy();
    echo "Déconnecté ! Redirection en cours ...";

?>

<script>
      function greet() {
        window.location.replace("Accueil");
        alert('vous avez bien été déconnectés ');
}
setTimeout(greet, 2000);
    </script>
    