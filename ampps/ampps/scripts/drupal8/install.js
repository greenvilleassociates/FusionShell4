//////////////////////////////////////////////////////////////
// install.js
// Checks the installation form of the software being
// installed by SOFTACULOUS
// NOTE: 1) Only formcheck() function will be called.
//       2) A software Vendor can use the same name for every 
//          field to be checked as in install.xml . It can be
//          called using $('fieldname').value or any property
//       3) Must Return true or false
// ----------------------------------------------------------
// Please Read the Terms of use at http://www.softaculous.com
// ----------------------------------------------------------
// (c)Softaculous Inc.
//////////////////////////////////////////////////////////////

function formcheck(){
	
	//Check the Admin Email
	if(window.check_punycode){
		if(!check_punycode($('admin_email').value)){
			alert('{{err_ademail}}');
			return false;
		}
		return true;
	}
	
	return true;
};


// Update the in dir
function update_drupal8_indir(){
	
	if(drupal8_retries >= 5){
		return;
	}
	
	if(typeof jQuery('#softdirectory').val() == "undefined"){
		drupal8_retries++;
		setTimeout('update_drupal8_indir();', 500);
		return;
	}
	
	var softdirectory = jQuery('#softdirectory').val();
	
	if(softdirectory == 'drupal8'){
		jQuery('#softdirectory').val('drupal');
	}
}

var drupal8_retries = 0;
update_drupal8_indir();