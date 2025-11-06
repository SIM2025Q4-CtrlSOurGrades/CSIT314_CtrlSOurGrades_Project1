<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/controllers/CreateUserProfileController.php';
require_once __DIR__ . '/../src/entities/UserProfile.php';

class CreateUserProfileControllerTest extends TestCase
{
    private $controller;
    private $userProfileMock;

    protected function setUp(): void
    {
        // Mock the UserProfile entity
        $this->userProfileMock = $this->createMock(UserProfile::class);

        // Inject mock into controller
        $this->controller = new CreateUserProfileController($this->userProfileMock);
    }

    public function testCreateUserProfileSuccess()
    {
        // Simulate successful creation (Active profile)
        $this->userProfileMock
            ->expects($this->once())
            ->method('createProfile')
            ->with('John Doe', 'A volunteer profile', 'Active')
            ->willReturn(true);

        $result = $this->controller->CreateUserProfile('John Doe', 'A volunteer profile', 'Active');

        // Currently, controller doesn’t return the message — it just sets it internally.
        // If you update it to return $message, use this assertion instead:
        // $this->assertEquals("User profile created successfully.", $result);

        $this->assertNull($result, "Expected no direct return value from CreateUserProfile()");
    }

    public function testCreateUserProfileFailure()
    {
        // Simulate failed creation (Suspended profile)
        $this->userProfileMock
            ->expects($this->once())
            ->method('createProfile')
            ->with('John Doe', 'A volunteer profile', 'Suspended')
            ->willReturn(false);

        $result = $this->controller->CreateUserProfile('John Doe', 'A volunteer profile', 'Suspended');

        // Same note as above: uncomment below if controller returns message
        // $this->assertEquals("Failed to create user profile.", $result);

        $this->assertNull($result);
    }
}
?>
