<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hospital</title>
        <?php echo $html->css('hospital.generic'); ?>
    </head>
    <body>
        <h1>Hospital</h1>
        <ul id="menu">
            <li><?php echo $html->link('Patienten', array('controller' => 'patients', 'action' => 'index')); ?></li>
            <li><?php echo $html->link('Ärzte', array('controller' => 'doctors', 'action' => 'index')); ?></li>
            <li><?php echo $html->link('Krankheiten', array('controller' => 'diseases', 'action' => 'index')); ?></li>
            <li><?php echo $html->link('Stationen', array('controller' => 'stations', 'action' => 'index')); ?></li>
        </ul>
        <?php if (!empty($_SESSION['Flash']['message'])): ?>
            <?php if (!empty($_SESSION['Flash']['class'])): ?>
                <div class="message <?php echo $_SESSION['Flash']['class']; ?>">
            <?php else: ?>
                <div class="message">
            <?php endif; ?>
            
            <?php echo $_SESSION['Flash']['message']; ?>

            </div>
        <?php endif; ?>
        <div id="content">
            <?php echo $content_for_layout; ?>
        </div>
    </body>
</html>
