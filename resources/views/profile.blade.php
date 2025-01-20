<?php
$user = [
    'nama' => 'Superadmin',
];
?>

<x-mainTemplate>
    <!-- Profile Section -->
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8 mt-20">Profile Settings</h2>

    <div class="flex justify-center items-center space-x-12 mt-6">
        <!-- Profile Image -->
        <div class="flex flex-col items-center">
            <div class="w-36 h-36 rounded-full border-4 border-indigo-600 mb-6 overflow-hidden shadow-lg">
                <img id="profile-image" src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <label for="profile-picture" class="bg-indigo-600 text-white px-5 py-3 rounded-full cursor-pointer hover:bg-indigo-800 transition duration-300 ease-in-out">Change Profile Picture</label>
            <input type="file" id="profile-picture" class="hidden" accept="image/*" />
        </div>

        <!-- Profile Info -->
        <div class="w-full max-w-md p-4 rounded-lg">
            <form id="profile-form" method="POST" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="username" class="block text-gray-600 text-sm font-semibold">Username</label>
                    <!-- PHP to inject the username from the $user array -->
                    <input type="text" id="username" name="username" class="w-full p-3 border rounded-lg mt-2 bg-gray-100 cursor-not-allowed" value="<?php echo htmlspecialchars($user['nama']); ?>" disabled>
                </div>
                <div class="mb-6">
                    <label for="new-password" class="block text-gray-600 text-sm font-semibold">New Password</label>
                    <input type="password" id="new-password" name="new-password" class="w-full p-3 border rounded-lg mt-2 bg-gray-100 transition-all focus:ring-2 focus:ring-indigo-500" placeholder="Enter New Password">
                </div>
                <div class="mb-6">
                    <label for="confirm-password" class="block text-gray-600 text-sm font-semibold">Confirm New Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" class="w-full p-3 border rounded-lg mt-2 bg-gray-100 transition-all focus:ring-2 focus:ring-indigo-500" placeholder="Confirm Password">
                </div>
                <div class="mb-8">
                    <button type="submit" name="update-profile" class="w-full bg-indigo-600 text-white p-3 rounded-lg hover:bg-indigo-800 transition duration-300 ease-in-out focus:ring-4 focus:ring-indigo-300">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success/Error Message -->
    <div id="message" class="mt-6 text-center text-lg text-green-600 hidden font-semibold transition-all opacity-0">
        Profile updated successfully!
    </div>
    <div id="error-message" class="mt-6 text-center text-lg text-red-600 hidden font-semibold transition-all opacity-0">
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

        // Success/Error Message Fade-in Animation
        const showMessage = (type) => {
            const message = document.getElementById(type);
            message.classList.remove("hidden");
            message.classList.add("opacity-100");
        }

        // Example of how to show success or error message after submitting the form
        // You can replace this with actual form submission logic
        document.getElementById("profile-form").addEventListener("submit", (e) => {
            e.preventDefault(); // For demo purposes, stop form from submitting
            const success = true; // You can replace this with your actual form submission result
            if (success) {
                showMessage("message"); // Show success message
            } else {
                showMessage("error-message"); // Show error message
            }
        });
    </script>
</x-mainTemplate>
