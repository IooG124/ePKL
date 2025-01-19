<?php
$user = [
    'nama' => 'Superadmin',
];
?>

<x-mainTemplate>
    <!-- Profile Section -->
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-4 mt-20">Profile Settings</h2>

    <div class="flex justify-center items-center space-x-8 mt-6">
        <!-- Profile Image -->
        <div class="flex flex-col items-center">
            <div class="w-32 h-32 rounded-full border-4 border-indigo-600 mb-4 overflow-hidden">
                <img id="profile-image" src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <label for="profile-picture" class="bg-indigo-600 text-white px-4 py-2 rounded-full cursor-pointer hover:bg-indigo-800 transition duration-300 ease-in-out">Change Profile Picture</label>
            <input type="file" id="profile-picture" class="hidden" accept="image/*" />
        </div>

        <!-- Profile Info -->
        <div class="w-full max-w-md p-6 rounded-lg">
            <form id="profile-form" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="username" class="block text-gray-600">Username</label>
                    <!-- PHP to inject the username from the $user array -->
                    <input type="text" id="username" name="username" class="w-full p-3 border rounded-lg mt-2 bg-gray-100 cursor-not-allowed" value="<?php echo htmlspecialchars($user['nama']); ?>" disabled>
                </div>
                <div class="mb-4">
                    <label for="new-password" class="block text-gray-600">New Password</label>
                    <input type="password" id="new-password" name="new-password" class="w-full p-3 border rounded-lg mt-2 bg-gray-100 transition-all focus:ring-2 focus:ring-indigo-500" placeholder="Enter New Password">
                </div>
                <div class="mb-4">
                    <label for="confirm-password" class="block text-gray-600">Confirm New Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="w-full p-3 border rounded-lg mt-2 bg-gray-100 transition-all focus:ring-2 focus:ring-indigo-500" placeholder="Confirm Password">
                </div>
                <div class="mb-6">
                    <button type="submit" name="update-profile" class="w-full bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-800 transition duration-300 ease-in-out focus:ring-4 focus:ring-indigo-300">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success/Error Message -->
    <div id="message" class="mt-4 text-center text-lg text-green-600 hidden font-semibold">
        Profile updated successfully!
    </div>
    <div id="error-message" class="mt-4 text-center text-lg text-red-600 hidden font-semibold">
        Error updating profile. Please try again.
    </div>

    <script>
        // Profile Image Preview
        document.getElementById("profile-picture").addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    document.getElementById("profile-image").src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-mainTemplate>
