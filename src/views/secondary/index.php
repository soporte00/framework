<?= self::html() ?>

<?= self::body() ?>

<div class="padd1">

    <div class="centered flex-column padd40">
        <h2> <?= $controllerName ?> </h2>
        <img src="<?= asset('img/icons/tool.svg') ?>" width="50px">
    </div>
</div>
<script src="<?= asset('js/secondary/main.js') ?>\" type="module"></script>
<?= self::end() ?>