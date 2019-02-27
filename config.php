<?php

class Config {
    // you may also set EBE_ADMIN_PWD environment variable.
    // ebe will first look for it, if not set will use this config property
    public static $adminPassword = '111';
    public static $siteTitle = 'My Blog';
    // db settings
    public static $dbEngine = 'mysql';
    public static $dbHost = 'localhost';
    public static $dbName = 'ebe';
    public static $dbUser = 'root';
    public static $dbPassw = '';
    //
    public static $theme = 'default';
    // number of symbols of post body in preview
    public static $maxTextInPreview = 1000;
}
