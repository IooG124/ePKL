<?php
$user = [
    'nama' => 'Superadmin',
];
?>

<x-mainTemplate>
    <!-- Profile Section -->
    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8 mt-10">Profile Settings</h2>

    <div class="flex justify-center items-center space-x-12 mt-6">
        <!-- Profile Image -->
        <div class="flex flex-col items-center">
            <div class="w-36 h-36 rounded-full border-4 border-indigo-600 mb-6 overflow-hidden shadow-lg">
                <img id="profile-image" src="https://via.placeholder.com/150" alt="Profile Picture" class="w-full h-full object-cover">
            </div>
            <div class="flex space-x-3">
                <label for="profile-picture" class="bg-indigo-600 text-white px-5 py-2 rounded-full cursor-pointer hover:bg-indigo-800 transition duration-300 ease-in-out">Change Picture</label>
                <button id="reset-picture" class="bg-gray-500 text-white px-5 py-2 rounded-full hover:bg-gray-700 transition duration-300 ease-in-out">Reset</button>
            </div>
            <input type="file" id="profile-picture" class="hidden" accept="image/*" />
        </div>

        <!-- Profile Info -->
        <div class="w-full max-w-md p-4 rounded-lg">
            <form id="profile-form" method="POST" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="username" class="block text-gray-600 text-sm font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="w-full p-3 border rounded-lg mt-2 bg-gray-100 cursor-not-allowed" value="<?php echo htmlspecialchars($user['nama']); ?>" disabled>
                </div>
                <div class="mb-6">
                    <label for="new-password" class="block text-gray-600 text-sm font-semibold">New Password</label>
                    <input type="password" id="new-password" name="new-password" class="w-full p-3 border rounded-lg mt-2 bg-gray-100 transition-all focus:ring-2 focus:ring-indigo-500" placeholder="Enter New Password">
                    <div id="password-strength" class="mt-1 text-sm font-semibold"></div>
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
    <div id="message" class="mt-6 text-center text-lg text-green-600 hidden font-semibold transition-all opacity-0" aria-live="polite">
        Profile updated successfully!
    </div>
    <div id="error-message" class="mt-6 text-center text-lg text-red-600 hidden font-semibold transition-all opacity-0" aria-live="polite">
        Error updating profile. Please try again.
    </div>

    <script>
        // Profile Image Preview and Reset
        const profilePictureInput = document.getElementById("profile-picture");
        const profileImage = document.getElementById("profile-image");
        const resetPictureButton = document.getElementById("reset-picture");
        let originalPicture = profileImage.src;

        profilePictureInput.addEventListener("change", (e) => {
            const file = e.target.files[0];
            if (file) {
                if (!file.type.startsWith("image/")) {
                    alert("Please select a valid image file.");
                    return;
                }
                if (file.size > 2 * 1024 * 1024) {
                    alert("Image size should not exceed 2MB.");
                    return;
                }
                const reader = new FileReader();
                reader.onload = (event) => {
                    profileImage.src = event.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        resetPictureButton.addEventListener("click", () => {
            profileImage.src = originalPicture;
            profilePictureInput.value = "";
        });

        // Password Strength Indicator
        const passwordInput = document.getElementById("new-password");
        const passwordStrength = document.getElementById("password-strength");

        passwordInput.addEventListener("input", () => {
            const value = passwordInput.value;
            let strength = "Weak";
            let color = "red";

            if (value.length >= 8) {
                if (/[A-Z]/.test(value) && /[0-9]/.test(value) && /[!@#$%^&*]/.test(value)) {
                    strength = "Strong";
                    color = "green";
                } else {
                    strength = "Moderate";
                    color = "orange";
                }
            }

            passwordStrength.textContent = `Password Strength: ${strength}`;
            passwordStrength.style.color = color;
        });

        // Success/Error Message Animation
        const showMessage = (type) => {
            const message = document.getElementById(type);
            message.classList.remove("hidden");
            message.classList.add("opacity-100");

            setTimeout(() => {
                message.classList.add("opacity-0");
                setTimeout(() => message.classList.add("hidden"), 500);
            }, 3000);
        };

        document.getElementById("profile-form").addEventListener("submit", (e) => {
            e.preventDefault(); // Prevent actual form submission for demo

            const success = true; // Replace this with actual validation logic
            if (success) {
                showMessage("message");
            } else {
                showMessage("error-message");
            }
        });
    </script>
</x-mainTemplate>
