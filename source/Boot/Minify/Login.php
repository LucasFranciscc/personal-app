<?php
if (strpos(url(), "localhost")) {
  /**
   * CSS
   */
  $minCSS = new MatthiasMullie\Minify\CSS();
  $minCSS->add(__DIR__ . "/../../../shared/styles/styles.css");
  $minCSS->add(__DIR__ . "/../../../shared/styles/boot.css");
  $minCSS->add(__DIR__ . "/../../../shared/app/css/style.css");

  //theme CSS
  $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_WEB . "/assets/css");
  foreach ($cssDir as $css) {
    $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_WEB . "/assets/css/{$css}";
    if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
      $minCSS->add($cssFile);
    }
  }

  //Minify CSS
  $minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_WEB . "/assets/login/style.css");

  /**
   * JS
   */
  $minJS = new MatthiasMullie\Minify\JS();
  $minJS->add(__DIR__ . "/../../../shared/scripts/jquery.min.js");
  $minJS->add(__DIR__ . "/../../../shared/scripts/jquery.form.js");
  $minJS->add(__DIR__ . "/../../../shared/scripts/jquery-ui.js");
  $minJS->add(__DIR__ . "/../../../shared/scripts/tracker.js");
  $minJS->add(__DIR__ . "/../../../shared/app/js/custom.min.js");
  $minJS->add(__DIR__ . "/../../../shared/app/js/deznav-init.js");
  $minJS->add(__DIR__ . "/../../../shared/app/js/styleSwitcher.js");

  //theme CSS
  $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_WEB . "/assets/js");
  foreach ($jsDir as $js) {
    $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_WEB . "/assets/js/{$js}";
    if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
      $minJS->add($jsFile);
    }
  }

  //Minify JS
  $minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_WEB . "/assets/login/scripts.js");
}