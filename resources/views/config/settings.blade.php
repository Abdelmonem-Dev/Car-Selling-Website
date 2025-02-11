<x-app-layout title="Settings">
    <main style="padding: 2rem; background-color: #f9fafb;">
        <div style="max-width: 800px; margin: 0 auto;">
            <h1 style="font-size: 2rem; font-weight: bold; color: #1a202c; margin-bottom: 1.5rem;">Update Profile</h1>

            <!-- Profile Header -->
            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2rem;">
                <img id="profile_image"
                src="{{ asset('storage/' . ($user->profile_photo_path ?? 'default.jpg')) }}"
                alt="Profile Picture"
                    style="width: 100px; height: 100px; border-radius: 50%; border: 4px solid #fff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                    onclick="document.getElementById('fileInput').click()"
                    onmouseover="this.style.width='110px'; this.style.height='110px'; this.style.cursor='pointer'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.2)';"
                    onmouseout="this.style.width='100px'; this.style.height='100px'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)';"/>
                <!-- Hidden file input -->
                <input type="file" id="fileInput" style="display: none;" onchange="updateProfileImage(event)" />
                <div>
                    <h1 style="font-size: 1.5rem; font-weight: bold; color: #1a202c;">{{($user->name ?? 'Unknown')}}</h1>
                    <a
                        href="{{ route('car') }}"
                        style="font-size: 1rem; color: #718096; text-decoration: none; transition: color 0.3s ease;"
                        onmouseover="this.style.color='#3182ce'"
                        onmouseout="this.style.color='#718096'"
                    >
                        {{ count($user->cars ?? []) }} cars
                    </a>
                </div>
            </div>

            <!-- Update Profile Button -->
            <div style="text-align: right; margin-bottom: 2rem;">
                <a
                    href="{{route('config.profile')}}"
                    style="background-color: #3182ce; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: bold; transition: background-color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#2c5282'"
                    onmouseout="this.style.backgroundColor='#3182ce'"
                >
                    Profile
                </a>
            </div>

            <!-- Profile Update Form -->
            <form action="{{route('config.update1')}}" method="POST" style="background-color: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
                @csrf
                @method('PUT')

                <!-- Name Field -->
                <div style="margin-bottom: 1.5rem;">
                    <label for="name" style="display: block; font-size: 1rem; font-weight: bold; color: #4a5568; margin-bottom: 0.5rem;">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{$user->name ?? 'Unknown'}}"
                        style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; color: #4a5568;"
                    />
                </div>

                <!-- Email Field -->
                <div style="margin-bottom: 1.5rem;">
                    <label for="email" style="display: block; font-size: 1rem; font-weight: bold; color: #4a5568; margin-bottom: 0.5rem;">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{$user->email ?? 'Unknown'}}"
                        style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; color: #4a5568;"
                        readonly
                    />
                </div>

                <!-- Phone Field -->
                <div style="margin-bottom: 1.5rem;">
                    <label for="phone" style="display: block; font-size: 1rem; font-weight: bold; color: #4a5568; margin-bottom: 0.5rem;">Phone</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{$user->phone ?? 'Unknown'}}"
                        style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; color: #4a5568;"
                    />
                </div>

                <!-- Save Button -->
                <div style="text-align: right;">
                    <button
                        type="submit"
                        style="background-color: #3182ce; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; border: none; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#2c5282'"
                        onmouseout="this.style.backgroundColor='#3182ce'"
                    >
                        Save Changes
                    </button>
                </div>
            </form>

            <!-- Password Update Form -->
            <form action="{{route('config.update2')}}" method="POST" style="background-color: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
                @csrf
                @method('PUT')

                <!-- Password Update Section -->
                <div style="margin-bottom: 2rem;">
                    <h2 style="font-size: 1.25rem; font-weight: bold; color: #1a202c; margin-bottom: 1rem;">Update Password</h2>

                    <input type="email" name="email" value="{{$user->email ?? 'Unknown'}}" hidden>

                    <!-- Current Password -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="current_password" style="display: block; font-size: 1rem; font-weight: bold; color: #4a5568; margin-bottom: 0.5rem;">Current Password</label>
                        <input
                            type="password"
                            id="current_password"
                            name="current_password"
                            style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; color: #4a5568;"
                            required
                        />
                    </div>

                    <!-- New Password -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="password" style="display: block; font-size: 1rem; font-weight: bold; color: #4a5568; margin-bottom: 0.5rem;">New Password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; color: #4a5568;"
                            required
                        />
                    </div>

                    <!-- Confirm New Password -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="password_confirmation" style="display: block; font-size: 1rem; font-weight: bold; color: #4a5568; margin-bottom: 0.5rem;">Confirm New Password</label>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; color: #4a5568;"
                            required
                        />
                    </div>
                </div>

                <!-- Save Button -->
                <div style="text-align: right;">
                    <button
                        type="submit"
                        style="background-color: #3182ce; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; border: none; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease;"
                        onmouseover="this.style.backgroundColor='#2c5282'"
                        onmouseout="this.style.backgroundColor='#3182ce'"
                    >
                        Save Changes
                    </button>
                </div>
            </form>
        <form action="{{route('config.deleteAccount')}}" method="post">
        @csrf

            <!-- Delete Account Section -->
            <div style="background-color: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h2 style="font-size: 1.25rem; font-weight: bold; color: #1a202c; margin-bottom: 1rem;">Delete Account</h2>
                <p style="color: #718096; margin-bottom: 1.5rem;">Once you delete your account, there is no going back. Please enter your password to confirm.</p>

                <!-- Password Confirmation Field -->
                <div style="margin-bottom: 1.5rem;">
                    <label for="password" style="display: block; font-size: 1rem; font-weight: bold; color: #4a5568; margin-bottom: 0.5rem;">Enter your password</label>
                    <input
                        type="password"
                        name="password"
                        style="width: 100%; padding: 0.5rem; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; color: #4a5568;"
                        placeholder="Enter your password"
                        required
                    />
                </div>

    <!-- Delete Button -->
    <div style="text-align: right;">
        <button
            style="background-color: #e53e3e; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; border: none; font-weight: bold; cursor: pointer; transition: background-color 0.3s ease;"
            onmouseover="this.style.backgroundColor='#c53030'"
            onmouseout="this.style.backgroundColor='#e53e3e'"
        >
            Delete Account
        </button>
    </div>
</form>

</div>


        </div>
    </main>

</x-app-layout>
<script>

function updateProfileImage(event) {
    const file = event.target.files[0]; // Get the selected file
    if (!file) return; // Exit if no file is selected

    const formData = new FormData();
    formData.append('profile_image', file); // 'profile_image' should match the key expected by your backend

    fetch("{{route('config.updateProfileImage')}}", { // Replace with your actual endpoint
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Profile image updated successfully:', data);
        // Update the profile image on the page
        document.getElementById('profile_image').src = URL.createObjectURL(file);
    })
    .catch(error => {
        console.error('Error updating profile image:', error);
        alert('Failed to update profile image. Please try again.');
    });
}
</script>
