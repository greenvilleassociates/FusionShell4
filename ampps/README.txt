-------------------------------------------

--          Softaculous AMPPS            --

-------------------------------------------

--            www.ampps.com              --

-------------------------------------------


-------------------------------------------

--                Authors                --

-------------------------------------------

-- Pulkit Gupta (admin@softaculous.com)  --

-------------------------------------------

-------------------------------------------

-- 	     How to use AMPPS  		 --

-------------------------------------------
1. MySQL root password is "mysql".

2. To access localhost, visit url http://localhost

3. To access AMPPS Enduser Panel, visit url http://localhost/ampps

4. To access AMPPS Admin Panel, visit url, http://localhost/ampps-admin

5. To access phpMyAdmin, visit url http://localhost/phpmyadmin

6. To access SQLiteManager, visit url http://localhost/sqlite

7. You can "Restore Default Configuration" files of Apache, PHP & MySQL from their respective Tabs in AMPPS Control Center.
	(Note: Your previous configuration will be lost.)

8. You can change MySQL root password, visit url http://localhost/ampps/index.php?act=mysqlsettings

9. You can secure AMPPS Enduser/Admin Panel, visit url http://localhost/ampps/index.php?act=secure

10. Enable/Disable Python Environment (Right click on System Tray Icon of AMPPS Control Center -> Configuration -> AMPPS -> Python Environment)

11. RockMongo Default Username & Password both is "admin".

12. You can add FTP Users from enduser panel of AMPPS or you can directly use FileZilla Server Interface.

-------------------------------------------

-- 	     	IMPORTANT LOCATIONS 		 --

-------------------------------------------

1. Ampps\conf : Configuration files of Apache, PHP, MySQL, etc are stored here
2. Ampps\mysql\data : MySQL Database Folder
3. Ampps\private : Used by Softaculous Ampps for storing installation details. Even the Backups of Installation and Data Directory of the installations are stored here.
4. Ampps\www : Public HTML (Document Root)
5. Ampps\ampps\data : AMPPS Data. MySQL Root Password, Domain List and Alias List are stored here.

-------------------------------------------

-- 	     	    FAQ  		 --

-------------------------------------------

1. Apache won't start.

A. There can be severl reasons, 
Case 1: It could be due to a port conflict i.e some other application or web server must be using port 80.
Solution: Follow http://www.softaculous.com/board/index.php?tid=1575&title=Apache_won%27t_start

Case 2: Apache crashes/Side by side configuration error(Generally in Windows Server).
Solution: By downloading Microsoft VC++ Redistributable Package this could be solved.

Case 3: Incorrect httpd.conf.
Solution: We can always find why Apache din't work by running the following command in command prompt(Start -> Run -> cmd):

"path/to/Ampps/apache/bin/httpd.exe"

The above commands starts Apache if everything is correct, else it will throw an error.

2. How can I install/use scripts on a local network.
A. Visit url http://www.ampps.com/wiki/How_To_Use_Scripts_on_Local_Network

3. Accessing Admin/Enduser Panel gives a Blank Page.
A. There can be several reasons for this too.
Case 1: Your php.ini isn't loaded.
Solution: Restore Default Configuration from PHP Tab of AMPPS Control Center

Case 2: Cron was not able to run after installing AMPPS for the first time.
Solution: Type this command in command prompt
"path/to/Ampps/php/php.exe" -c "path/to/Ampps/apache/php.ini" "path/to/Ampps/ampps/softaculous/enduser/install.php"

If the file install.php is not present run the following command,
"path/to/Ampps/php/php.exe" -c "path/to/Ampps/apache/php.ini" "path/to/Ampps/ampps/softaculous/cron.php"

(Note: Please make sure your Internet Connection is working properly)

4. License not Found.
A. Same as Case 2 of Q.3.

----------------------------------------------------------
To learn more about AMPPS & Softaculous visit url http://www.ampps.com/wiki & http://www.softaculous.com/docs
You can take help from AMPPS Users and Team from Softaculous Forum http://www.softaculous.com/board
If you are facing any other problems related to ampps or softaculous, you can always open a ticket http://www.softaculous.com/support