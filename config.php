<?php

class Config {
	public static $siteTitle = 'My Blog';

    // you may also set EBE_ADMIN_PWD environment variable.
    // ebe will first look for it, if not set will use this config property
    public static $adminPassword = '111';

    // db settings
    public static $dbEngine = 'sqlite';	// or 'mysql'
    // only for mysql:
    public static $dbHost = 'localhost';
    public static $dbName = 'ebe';
    public static $dbUser = 'root';
    public static $dbPassw = '';

    public static $theme = 'monokai';	// or 'default'
    
    // number of symbols of post body in preview
    public static $maxTextInPreview = 1000;
}
