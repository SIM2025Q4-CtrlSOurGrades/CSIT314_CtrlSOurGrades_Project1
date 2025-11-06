<?php
//controllers/SuspendUserProfileController.php

	require_once __DIR__ . '/../entities/UserProfile.php';

	class SuspendUserProfileController {
		private $entity;
		
		public function __construct() {
			$this->entity = new UserProfile();
		}
		
		public function suspendUserProfile($pID) {
			$result = $this->entity->suspendProfile($pID);
			return $result; 
		} 
	}

