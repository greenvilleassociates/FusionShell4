; <?php exit; ?>
[server]
http_path = "[[softurl]]"
absolute_path = "[[softpath]]"
presetting = ""
timezone = "America/New_York"

[clients]
path = "data"
inifile = "client.ini.php"
datadir = "[[softdatadir]]"
default = "[[client_id]]"
list = "0"

[setup]
pass = "[[setup_pass]]"

[tools]
convert = "[[convert]]"
zip = "[[zip]]"
unzip = "[[unzip]]"
java = ""
ffmpeg = ""
ghostscript = "[[ghostscript]]"
latex = ""
vscantype = "none"
scancommand = ""
cleancommand = ""
enable_system_styles_management = ""
lessc = ""
phantomjs = ""

[log]
path = "[[softdatadir]]"
file = "ilias.log"
enabled = "1"
level = "WARNING"
error_path = "[[softdatadir]]/log"

[debian]
data_dir = "/var/opt/ilias"
log = "/var/log/ilias/ilias.log"
convert = "/usr/bin/convert"
zip = "/usr/bin/zip"
unzip = "/usr/bin/unzip"
java = ""
ffmpeg = "/usr/bin/ffmpeg"

[redhat]
data_dir = ""
log = ""
convert = ""
zip = ""
unzip = ""
java = ""

[suse]
data_dir = ""
log = ""
convert = ""
zip = ""
unzip = ""
java = ""

[https]
auto_https_detect_enabled = "0"
auto_https_detect_header_name = ""
auto_https_detect_header_value = ""
