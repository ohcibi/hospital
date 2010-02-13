<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hospital</title>
        <style type="text/css">@import url(/css/hospital.generic.css);</style>
    </head>
    <body>
        <h1>Hospital</h1>
        <ul id="menu">
            <li><a href="patients">Patienten</a></li>
            <li><a href="doctors">Ärzte</a></li>
            <li><a href="diseases">Krankheiten</a></li>
            <li><a href="stations">Stationen</a></li>
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
