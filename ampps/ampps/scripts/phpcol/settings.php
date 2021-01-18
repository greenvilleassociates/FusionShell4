<?php
/*
 * Application name: PhpCollab
 * Path by root: ../includes/settings.php
 *
 * File auto-generated @ 2020-09-26 11:21am
 *
 * For more information about this file, visit:
 * https://github.com/phpcollab/phpcollab/wiki/Settings
 *
 */

# installation type
# Options: (default) online | offline
$installationType = "online";

# select database application
# Options: mysql | postgresql | sqlserver
$databaseType = "mysql";

# database parameters
define("MYSERVER", "[[softdbhost]]");
define("MYLOGIN", "[[softdbuser]]");
define("MYPASSWORD", "[[softdbpass]]");
define("MYDATABASE", "[[softdb]]");

# notification method
# Option: (default) mail | smtp
$notificationMethod = "mail";

# smtp parameters
if ($notificationMethod === "smtp") {
    define("SMTPSERVER", "");
    define("SMTPLOGIN", "");
    define("SMTPPASSWORD", "");
    define("SMTPPORT", "");
}

# create folder method
# Options: (default) PHP | FTP
$mkdirMethod = "PHP";

# ftp parameters
# note: only needed if the mkdirMethod is set to FTP
if ($mkdirMethod === "FTP") {
    # PhpCollab root according to ftp account
    # note: No slash at the end
    $ftpRoot = "";

    define("FTPSERVER", "");
    define("FTPLOGIN", "");
    define("FTPPASSWORD", "");
}

# Invoicing module
$enableInvoicing = false;

# theme choice
define("THEME", "default");

# newsdesk limiter
$newsdesklimit = true;

# if 1 the admin logs in his homepage
$adminathome = false;

# timezone GMT management
$gmtTimezone = false;

# language choice
# (default) en
$langDefault = "[[language]]";

# Mantis bug tracking parameters
$enableMantis = false;

if ($enableMantis === true) {
    # Mantis installation directory
    # note: add a slash at the end
    $pathMantis = "";
}

# https related parameters
$pathToOpenssl = "/usr/bin/openssl";

# login method, set to "CRYPT"
# Options: (default) crypt | plain | md5
$loginMethod = "md5";

# enable LDAP
$useLDAP = false;
if ($useLDAP) {
    $configLDAP["ldapserver"] = "";
    $configLDAP["searchroot"] = "";
}

# htaccess parameters
$htaccessAuth = false;
if ($htaccessAuth) {
    # note: no slash at the end
    $fullPath = "";
}

# file management parameters
$fileManagement = true;

# Size in bytes for uploads
$maxFileSize = 5000000;

# Root Path
# note: no slash at the end
$root = "[[softurl]]";

# security issue to disallow php files upload
$allowPhp = false;

# project site creation
$sitePublish = true;

# enable update checker
# (default) true
$updateChecker = false;

# e-mail notifications
# (default) true
$notifications = true;

# show peer review area
$peerReview = true;

# show items for home
$showHomeBookmarks = true;
$showHomeProjects = true;
$showHomeTasks = true;
$showHomeSubtasks = true;
$showHomeDiscussions = true;
$showHomeReports = true;
$showHomeNotes = true;
$showHomeNewsdesk = true;

# security issue to disallow auto-login from external link
$forcedLogin = false;

# table prefix
$tablePrefix = "[[dbprefix]]";

# database tables
$tableCollab["assignments"] = "[[dbprefix]]assignments";
$tableCollab["calendar"] = "[[dbprefix]]calendar";
$tableCollab["files"] = "[[dbprefix]]files";
$tableCollab["logs"] = "[[dbprefix]]logs";
$tableCollab["members"] = "[[dbprefix]]members";
$tableCollab["notes"] = "[[dbprefix]]notes";
$tableCollab["notifications"] = "[[dbprefix]]notifications";
$tableCollab["organizations"] = "[[dbprefix]]organizations";
$tableCollab["posts"] = "[[dbprefix]]posts";
$tableCollab["projects"] = "[[dbprefix]]projects";
$tableCollab["reports"] = "[[dbprefix]]reports";
$tableCollab["sorting"] = "[[dbprefix]]sorting";
$tableCollab["tasks"] = "[[dbprefix]]tasks";
$tableCollab["teams"] = "[[dbprefix]]teams";
$tableCollab["topics"] = "[[dbprefix]]topics";
$tableCollab["phases"] = "[[dbprefix]]phases";
$tableCollab["support_requests"] = "[[dbprefix]]support_requests";
$tableCollab["support_posts"] = "[[dbprefix]]support_posts";
$tableCollab["subtasks"] = "[[dbprefix]]subtasks";
$tableCollab["updates"] = "[[dbprefix]]updates";
$tableCollab["bookmarks"] = "[[dbprefix]]bookmarks";
$tableCollab["bookmarks_categories"] = "[[dbprefix]]bookmarks_categories";
$tableCollab["invoices"] = "[[dbprefix]]invoices";
$tableCollab["invoices_items"] = "[[dbprefix]]invoices_items";
$tableCollab["services"] = "[[dbprefix]]services";
$tableCollab["newsdeskcomments"] = "[[dbprefix]]newsdeskcomments";
$tableCollab["newsdeskposts"] = "[[dbprefix]]newsdeskposts";

# PhpCollab version
$version = "2.8.2";

# demo mode parameters
$demoMode = false;
$urlContact = "http://www.sourceforge.net/projects/phpcollab";

# Gantt graphs
$activeJpgraph = true;

# filter to see only logged user clients (in team / owner)
$clientsFilter = true;

# filter to see only logged user projects (in team / owner)
$projectsFilter = true;

# Enable help center support requests
$enableHelpSupport = true;

# Return email address given for clients to respond too.
$supportEmail = "";

# Support Type
# Options: (default) team | admin
# If team is selected, a notification will be sent to everyone in the team when a new request is added
$supportType = "team";

# enable the redirection to the last visited page, EXPERIMENTAL DO NOT USE IT
$lastvisitedpage = false;

# auto-publish tasks added from client site?
$autoPublishTasks = false;

# html header parameters
$setTitle = "phpCollab";
$siteTitle = "phpCollab";
$setDescription = "Groupware module. Manage web projects with team collaboration, users management, tasks and projects tracking, files approval tracking, project sites clients access, customer relationship management (Php / Mysql, PostgreSQL or Sql Server).";
$setKeywords = "PhpCollab, phpcollab.com, Sourceforge, management, web, projects, tasks, organizations, reports, Php, MySql, Sql Server, mssql, Microsoft Sql Server, PostgreSQL, module, application, module, file management, project site, team collaboration, free, crm, CRM, cutomer relationship management, workflow, workgroup";

$emailAlerts = false;

/**
 * Debugging Settings.
 * DO NOT Change these on a Production server unless you know what you are doing.
 * Refer to: https://phpcollab.com/debugging for more information
 */

# enable development bar in footer
$footerDev = false;

$logLevel = 400;
