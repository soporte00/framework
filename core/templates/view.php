<?= self::layout('main.php') ?>

<?= html() ?>

<?= body() ?>

<div class="centered flex-column padd20">


    <h1><?= $controllerName ?></h1>

    <div class="text-center top20 xl">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit quasi modi et nemo quam sed ea facere omnis explicabo nesciunt?.
    </div>

</div>


<script src=" <?= asset('/js/%module%/main.js') ?>" type="module"></script>
<?= close() ?>