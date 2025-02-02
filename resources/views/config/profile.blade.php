
<x-app-layout>
    <main style="padding: 2rem; background-color: #f9fafb;">
        <div style="max-width: 800px; margin: 0 auto;">
            <h1 style="font-size: 2rem; font-weight: bold; color: #1a202c; margin-bottom: 1.5rem;">Profile</h1>

            <!-- Profile Header -->
            <div style="display: flex; align-items: center; gap: 1.5rem; margin-bottom: 2rem;">
                <img
                    src="{{asset( 'storage/' . $user->profile_photo_path)  }}"
                    alt="Profile Picture"
                    style="width: 100px; height: 100px; border-radius: 50%; border: 4px solid #fff; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"
                />
                <div>
                    <h1 style="font-size: 1.5rem; font-weight: bold; color: #1a202c;">{{$user->name}}</h1>
                    <a
                    href="{{ route('car') }}"
                    style="font-size: 1rem; color: #718096; text-decoration: none; transition: color 0.3s ease;"
                    onmouseover="this.style.color='#3182ce'"
                    onmouseout="this.style.color='#718096'"
                >
                    {{ count($user->cars) }} cars
                </a>
            </div>
        </div>

            <!-- Update Button -->
            <div style="text-align: right; margin-bottom: 2rem;">
                <a
                    href="{{route('config.settings')}}"
                    style="background-color: #3182ce; color: #fff; padding: 0.5rem 1rem; border-radius: 6px; text-decoration: none; font-weight: bold; transition: background-color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#2c5282'"
                    onmouseout="this.style.backgroundColor='#3182ce'"
                >
                    Update Profile
                </a>
            </div>

            <!-- About Me Section -->
            <div style="background-color: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
                <h2 style="font-size: 1.25rem; font-weight: bold; color: #1a202c; margin-bottom: 1rem;">About Me</h2>
                <p style="color: #4a5568;">Hi, I'm {{$user->name}}. Welcome to my profile!</p>
            </div>

            <!-- Contact Information -->
            <div style="background-color: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-bottom: 2rem;">
                <h2 style="font-size: 1.25rem; font-weight: bold; color: #1a202c; margin-bottom: 1rem;">Contact Information</h2>
                <div style="display: grid; gap: 1rem;">
                    <div>
                        <h3 style="font-size: 1rem; font-weight: bold; color: #4a5568;">Email:</h3>
                        <p style="color: #718096;">{{$user->email}}</p>
                    </div>
                    <div>
                        <h3 style="font-size: 1rem; font-weight: bold; color: #4a5568;">Phone:</h3>
                        <p style="color: #718096;">{{$user->phone}}</p>
                    </div>
                    <div>
                        <h3 style="font-size: 1rem; font-weight: bold; color: #4a5568;">Joined:</h3>
                        <p style="color: #718096;">{{$user->created_at->format('M d, Y')}}</p>
                    </div>
                </div>
            </div>

            <!-- Social Links -->
            <div style="background-color: #fff; border-radius: 8px; padding: 1.5rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <h2 style="font-size: 1.25rem; font-weight: bold; color: #1a202c; margin-bottom: 1rem;">Social Links</h2>
                <ul style="display: flex; gap: 1rem; list-style: none; padding: 0;">
                    <li>
                        <a href="#" style="color: #3182ce; text-decoration: none; font-weight: bold;">LinkedIn</a>
                    </li>
                    <li>
                        <a href="#" style="color: #2d3748; text-decoration: none; font-weight: bold;">GitHub</a>
                    </li>
                    <li>
                        <a href="#" style="color: #63b3ed; text-decoration: none; font-weight: bold;">Twitter</a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
</x-app-layout>
