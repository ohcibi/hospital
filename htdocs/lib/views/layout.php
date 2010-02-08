<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hospital</title>
    </head>
    <body>
        <h1>Hospital</h1>
        <?php if (!empty($_SESSION['Flash']['message'])): ?>
            <?php if (!empty($_SESSION['Flash']['class'])): ?>
                <div class="<?php echo $_SESSION['Flash']['class']; ?>">
            <?php else: ?>
                <div>
            <?php endif; ?>
            
            <?php echo $_SESSION['Flash']['message']; ?>

            </div>
        <?php endif; ?>
        <?php echo $content_for_layout; ?>
    </body>
</html>
