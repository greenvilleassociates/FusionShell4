;
; <?php die(); ?>
; This file is part of LEPTON Core, released under the GNU GPL
; Please see LICENSE and COPYING files in your package for details, specially for terms and warranties.
;
; NOTICE:LEPTON CMS Package has several different licenses.
; Please see the individual license in the header of each single file or info.php of modules and templates.
;
; @author          LEPTON Project
; @copyright       2010-2020 LEPTON Project
; @link            https://www.LEPTON-cms.org
; @license         http://www.gnu.org/licenses/gpl.html
; @license_terms   please see LICENSE and COPYING files in your package
;
;

; DataBase-setup for LEPTON-CMS
[database]
type = 'mysql'
host = '[[softdbhost]]'
port = '3306'
user = '[[softdbuser]]'
pass = '[[softdbpass]]'
name = '[[softdb]]'
prefix = '[[dbprefix]]'

key = '[[db_key]]'
cipher = 'AES-256-CBC'
iv = '[[iv]]'
options = 0

; Set length for username, password and other constants
[system_const]
AUTH_MIN_LOGIN_LENGTH = 3
AUTH_MAX_LOGIN_LENGTH = 128
AUTH_MIN_PASS_LENGTH = 6
AUTH_MAX_PASS_LENGTH = 128
SUBVERSION = ''
MAX_REGISTRATION_TIME = 3600
MAX_WYSIWYG_HISTORY = 6

; Set allowed additional chars for email and usernames (extends LEPTON_handle methods) 
[custom_vars]
additional_email_chars = ''
additional_usernames_chars = 'äöüÄÖÜ' 

