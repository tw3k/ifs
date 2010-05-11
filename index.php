<?php

require_once getcwd() . '/content/meta';

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
      "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $title?></title>
        <link type="text/css" href="http://jqueryui-0.tw3k.com/css/custom-theme/jquery-ui-1.8.bird.css" rel="stylesheet" />
        <link rel="alternate" type="application/rss+xml" title="RSS" href="/rss" />
        <link rel="Shortcut Icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
        <meta name="DC.title" content="<?php echo $dc_title?>" />
        <meta name="DC.description" content="<?php echo $dc_description?>" />
        <meta name="DC.publisher" content="tw3k" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="Content-Language" content="en" />
        <meta name="Copyright" content="Copyright (c) 2010, Forest Dean Feighner ~tw3k" />
        <meta name="author" content="irs ~tw3k" />
        <meta name="description" content="<?php echo $description?>" />
        <meta name="keywords" content="<?php echo $keywords?>" />
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    </head>
    <body>
        <div id="Logo" onclick="location.href='http://tw3k.net'"></div>
        <ul class="ui-menu" style="float:right">
            <li class="ui-menu-item<?php echo $admin?>"><a href='/admin' title='Admin'>Admin</a></li>
            <li class="ui-menu-item<?php echo $index?>"><a href='/' title='Home'>Home</a></li>
            <li class="ui-menu-item"><a href='http://tw3k.net' title='tw3k dot net'>tw3k.net</a></li>
        </ul>
        <div class="content">
<?php

flush();

require_once 'Index.class.php';

foreach (new DirectoryIterator('content/') as $copy) {
    if($copy->isDot()) continue;
        $pages[] = $copy->getFilename();
}

$index = new Index($pages, $_GET);
$page = new Page($_GET);
$include = $page->contains($pages);

require_once getcwd() . '/content/' . $include['context'];

?>
        </div>
        <div style="text-align:right;color:#fff;">
            <a style="color:#ccc;margin-top: 75%" href="http://validator.w3.org/check/referer">Valid XHTML 1.0 Strict!</a>
        </div>
        <script type="text/javascript" src="http://jqueryui-0.tw3k.com/js/jquery-1.4.2.bird.min.js"></script>
    </body>
</html>
