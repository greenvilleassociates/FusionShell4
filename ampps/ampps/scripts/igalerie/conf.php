<?php

// Clé (ne jamais modifier).
define('CONF_KEY', '[[CONF_KEY]]');

// Base de données.
define('CONF_DB_USER', '[[softdbuser]]');
define('CONF_DB_PASS', '[[softdbpass]]');
define('CONF_DB_TYPE', 'mysql');
define('CONF_DB_HOST', '[[softdbhost]]');
define('CONF_DB_PORT', '3306');
define('CONF_DB_NAME', '[[softdb]]');
define('CONF_DB_PREF', '[[dbprefix]]');
define('CONF_DB_DATE', 'php');

// SQLite (sauvegarde de la base de données).
define('CONF_SQLITE_BACKUP', 1);
define('CONF_SQLITE_BACKUP_MAX', 10);

// Paramètres de la galerie.
define('CONF_CHARSET', 'UTF-8');
define('CONF_INTEGRATED', 0);
define('CONF_URL_REWRITE', 0);

// Développement et débogage.
define('CONF_DEBUG_MODE', 0); # 0 en production
define('CONF_DEBUG_SQL', 0); # 1 en développement ; 0 en production
define('CONF_DEV_MODE', 0); # 1 en développement ; 0 en production
define('CONF_EXEC_TIME', 0); # 1 en développement ; 0 en production

// Répertoires.
define('CONF_ADMIN_DIR', 'admin');
define('CONF_ALBUMS_PATH', '[[softpath]]/albums');
define('CONF_GALLERY_PATH', '[[relativeurl]]');

// Cookie.
define('CONF_COOKIE_PREFS_NAME', 'igal3_prefs');
define('CONF_COOKIE_PREFS_EXPIRE', 315360000);
define('CONF_COOKIE_SESSION_NAME', 'igal3_session');
define('CONF_COOKIE_SESSION_EXPIRE', 2592000); # 30 jours

// GD.
define('CONF_GD_TRANSPARENCY', 1);

// Gestion des erreurs.
define('CONF_ERRORS_DISPLAY', 0); # 1 en développement ; 0 en production
define('CONF_ERRORS_DISPLAY_TRACE', 1);
define('CONF_ERRORS_DISPLAY_NOW', 0);
define('CONF_ERRORS_TRACE_ARGS', 1);
define('CONF_ERRORS_LOG', 1); # 1 en développement et en production
define('CONF_ERRORS_LOG_MAX', 100);

// Sécurité.
define('CONF_ACCESS_KEY', '[[CONF_ACCESS_KEY]]');
define('CONF_ANTICSRF_TOKEN_EXPIRE', 86400);
define('CONF_BRUTE_FORCE_MAX_ATTEMPT', 20);
define('CONF_FILE_KEY', 1); # utiliser CONF_ACCESS_KEY pour protéger l'accès aux fichiers ?
define('CONF_SESSION_EXPIRE', 172800); # ne doit pas être supérieur à CONF_COOKIE_SESSION_EXPIRE

// Vignettes.
define('CONF_THUMBS_GRID_SIZES', [80,100,120,150,180,200,220,250,280,300,350,400]);
define('CONF_THUMBS_QUALITY', 90);
define('CONF_THUMBS_SECURE', 0); # protéger les vignettes des accès direct (avec .htaccess Deny from all sur cache/thumbs) ?
define('CONF_THUMBS_SIZE_CAT', '150');
define('CONF_THUMBS_SIZE_ITEM', '151');

?>