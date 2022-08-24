<?php

/**
 * DATABASE
 */



//if (strpos($_SERVER['HTTP_HOST'], "localhost")) {
    define("CONF_DB_HOST", "localhost");
    define("CONF_DB_USER", "root");
    define("CONF_DB_PASS", "");
    define("CONF_DB_NAME", "mundof74_mundofitonline");
//} else {
//    define("CONF_DB_HOST", "162.241.2.215");
//    define("CONF_DB_USER", "mundof74_admin");
//    define("CONF_DB_PASS", "SeHMHdo8R9*;");
//    define("CONF_DB_NAME", "mundof74_mundofitonline");
//}



/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://www.app.personaledubehring.com.br");
define("CONF_URL_TEST", "https://www.localhost/appPEB");

define("CONF_URL_BASE_EXTERNA", "https://www.personaledubehring.com.br");
define("CONF_URL_TEST_EXTERNA", "https://www.localhost/pt");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Personal Edu Behring");
define("CONF_SITE_TITLE", "Personal Edu Behring");
define(
    "CONF_SITE_DESC",
    "Acompanhe o seus treinos pelo nosso APP."
);
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "personaledubehring.com.br");
define("CONF_SITE_ADDR_STREET", "SC 406 - Rod. Dr潞 Ant么nio Luiz Moura Gonzaga");
define("CONF_SITE_ADDR_NUMBER", "3339");
define("CONF_SITE_ADDR_COMPLEMENT", "Bloco A, Sala 208");
define("CONF_SITE_ADDR_CITY", "Florian贸polis");
define("CONF_SITE_ADDR_STATE", "SC");
define("CONF_SITE_ADDR_ZIPCODE", "88048-301");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@creator");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@creator");
define("CONF_SOCIAL_FACEBOOK_APP", "5555555555");
define("CONF_SOCIAL_FACEBOOK_PAGE", "pagename");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "author");
define("CONF_SOCIAL_GOOGLE_PAGE", "5555555555");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "5555555555");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "insta");
define("CONF_SOCIAL_YOUTUBE_PAGE", "youtube");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 8);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_WEB", "web");
define("CONF_VIEW_APP", "app");
define("CONF_VIEW_ADMIN", "cafeadm");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "personaledubehring.com.br");
define("CONF_MAIL_PORT", "465");
define("CONF_MAIL_USER", "contato@personaledubehring.com.br");
define("CONF_MAIL_PASS", "d#BctO#4ffZa");
define("CONF_MAIL_SENDER", ["name" => "Personal EduBehring", "address" => "contato@personaledubehring.com.br"]);
define("CONF_MAIL_SUPPORT", "contato@personaledubehring.com.br");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "ssl");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");

/**
 * PAGAR.ME
 */
define("CONF_PAGARME_MODE", "test");
define("CONF_PAGARME_LIVE", "ak_live_*****");
define("CONF_PAGARME_TEST", "ak_test_*****");
define("CONF_PAGARME_BACK", CONF_URL_BASE . "/pay/callback");
