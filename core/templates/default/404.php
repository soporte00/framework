<?php
http_response_code(404);
self::layout('main.php')
?>

<?= html() ?>

<?= body() ?>

<div class="centered flex-column">
    <h4>ERROR 404. No se encontró la página.</h4>
    <a href="<?= route() ?>" title="Volver a la página principal">Pág. principal</a>
</div>

<?= close() ?>