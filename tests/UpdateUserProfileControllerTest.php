<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/controllers/UpdateUserProfileController.php';
require_once __DIR__ . '/../src/entities/UserProfile.php';

class UpdateUserProfileControllerTest extends TestCase
{
    private $controller;
    private $userProfileMock;

    protected function setUp(): void
    {
        // Mock the UserProfile entity
        $this->userProfileMock = $this->createMock(UserProfile::class);

        // Inject mock into controller
        $this->controller = new UpdateUserProfileController($this->userProfileMock);
    }

    public function testGetProfileByID()
    {
        // Example: Get profile ID = 3 (User Admin)
        $expectedProfile = [
            'pID' => 3,
            'name' => 'User Admin',
            'description' => 'Administrator profile',
            'status' => 'Active'
        ];

        $this->userProfileMock
            ->expects($this->once())
            ->method('getProfileByID')
            ->with(3)
            ->willReturn($expectedProfile);

        $result = $this->controller->GetProfileByID(3);
        $this->assertEquals($expectedProfile, $result);
    }

    public function testUpdateProfileSuccess()
    {
        // Example: Update profile ID = 4 (Event Coordinator)
        $this->userProfileMock
            ->expects($this->once())
            ->method('updateProfile')
            ->with(4, 'Event Coordinator', 'Manages events', 'Active')
            ->willReturn(true);

        $result = $this->controller->UpdateProfile(4, 'Event Coordinator', 'Manages events', 'Active');
        $this->assertTrue($result);
    }

    public function testUpdateProfileFailure()
    {
        // Example: Failed update for profile ID = 99 (non-existent)
        $this->userProfileMock
            ->expects($this->once())
            ->method('updateProfile')
            ->with(99, 'Ghost Profile', 'Non-existent', 'Suspended')
            ->willReturn(false);

        $result = $this->controller->UpdateProfile(99, 'Ghost Profile', 'Non-existent', 'Suspended');
        $this->assertFalse($result);
    }
}
?>
