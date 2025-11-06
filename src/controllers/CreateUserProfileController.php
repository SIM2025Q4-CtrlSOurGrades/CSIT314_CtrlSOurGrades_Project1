<?php
// controllers/CreateUserProfileController.php
require_once __DIR__ . '/../entities/UserProfile.php';

class CreateUserProfileController {
    private $userProfileEntity;

    public function __construct() {
        // Controller creates its own entity
        $this->userProfileEntity = new UserProfile();
    }

	public function CreateUserProfile($name, $description, $status) {
		
		$result = $this->userProfileEntity->createProfile($name, $description, $status);
		
		if (!$result) {
			$message = "Failed to create user profile.";
		} else {
			$message = "User profile created successfully."; 
		}
			
		
	}

}
?>