<?php
// Establecer una cookie segura y HTTPOnly, al poner true true estamos implemetando la seguridad de nuestra pagina
setcookie("cookie_segura", "valor_seguro", time() + 3600, "/", "", true, true);

echo "Cookie segura establecida correctamente.";
?>;
