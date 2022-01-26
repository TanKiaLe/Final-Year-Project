 <?php if (count($errors) > 0 ): ?>
    <div class="error1">
        <?php foreach ($errors as $error1): ?>
            <p><?php echo $error1; ?></p>
        <?php endforeach ?>
    </div>
<?php endif ?>
