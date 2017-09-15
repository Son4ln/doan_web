<?php
    class ContactInfoController
    {	
    	function showContactInfo()
    	{
    		include '../view/contact/contactInfo.php';
    	}

    	function updateContactInfo()
    	{
    		$path = $GLOBALS['UPLOADIMG'];
    		$address = $_POST['address'];
        $time = time();

    		if(empty($_FILES['logo']['name'])){
    		  $logoName = $_POST['current-img'];
    		} else {
    		  $logoName = $time.'-'.$_FILES['logo']['name'];
    		}

      		$branch = $_POST['branch'];
      		$phone = $_POST['phone'];
      		$email = $_POST['email'];
      		$intro = $_POST['intro'];
      		$update = new ContactInfo();

      		try {
      		  $update -> updateContactInfo($address, $branch, $phone, $email, $intro, $logoName);
      		} catch(PDOException $e) {
        	  $mess = "Sửa thất bại";
      		  $action = 'contactInfo';
      		  $lv = 'danger';
      		  BasicLibs::setAlert($mess, $lv);
      		  BasicLibs::redirect($action);
        	  die();
      	  	}

    	  	if(!empty($_FILES['logo']['name'])) {
    	  	  $currentImg = $_POST['current-img'];
  		      BasicLibs::deleteFile($currentImg,$path);
            $fileLogo = $_FILES['logo'];
            BasicLibs::uploadFile($time, $fileLogo, $path);
    	  	}

    	  	$mess = "Sửa thành công";
      		$action = 'contactInfo';
      		$lv = 'success';
      		BasicLibs::setAlert($mess, $lv);
      		BasicLibs::redirect($action);
    	}
    }  
?>