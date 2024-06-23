<?php
http_response_code(403);
self::layout('main.php')
?>

<?= html() ?>

<?= body() ?>

<div class="centered">
    <h4>Permiso denegado.</h4>
    <a href="<?= route() ?>" title="Volver a la página principal">Pág. principal</a>
</div>

<?= close() ?>