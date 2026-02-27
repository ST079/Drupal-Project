<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <?php print $scripts; ?>
</head>

<body class="<?php print $classes; ?>" <?php print $attributes; ?>>
    <header>
        <div class="container">
            <h1>
                <a href="<?php print $front_page; ?>">
                    <?php print $site_name; ?>
                </a>
            </h1>
            <?php if ($main_menu): ?>
                <nav>
                    <?php print theme('links__system_main_menu', array(
                        'links' => $main_menu,
                        'attributes' => array(
                            'id' => 'main-menu',
                        ),
                    )); ?>
                </nav>
            <?php endif; ?>
        </div>
    </header>

    <div class="container <?= $page['sidebar'] ? 'content-wrapper' : '' ?> ">
        <?php if ($page['sidebar']): ?>
            <aside class="sidebar">
                <?php print render($page['sidebar']); ?>
            </aside>
        <?php endif; ?>

        <main class="main-content">
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
                <h1 class="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>

            <?php if ($tabs): ?>
                <div class="tabs"><?php print render($tabs); ?></div>
            <?php endif; ?>

            <?php if ($action_links): ?>
                <ul class="action-links"><?php print render($action_links); ?></ul>
            <?php endif; ?>

            <?php print render($page['content']); ?>
        </main>
    </div>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> My Portfolio</p>
            <?php if ($secondary_menu): ?>
                <nav>
                    <?php print theme('links__system_secondary_menu', array(
                        'links' => $secondary_menu,
                    )); ?>
                </nav>
            <?php endif; ?>
            <?php print render($page['footer']); ?>
        </div>
    </footer>

</body>

</html>