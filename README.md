<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

# Car Selling Website 🚗 *(Work in Progress 🚧)*  
A fully-featured **Car Selling Website** built using Laravel, Blade templates, and MySQL.  
🚀 **This project is currently under development!** Features may change as it evolves.

---

## 🚀 Work in Progress  
This project is **not yet complete**. Some features may be missing or subject to change. If you want to contribute or stay updated:  
- ⭐ **Star the repository** for updates.  
- 🛠️ **Check the Issues tab** for development progress.  
- 📢 **Join the discussion** if you have feature suggestions!  

---

## Key Features (Planned)  
- **🔒 User Authentication**: Secure login and registration system for buyers, sellers, and admin roles.  
- **🚘 Car Listings**: Add, edit, and delete detailed car listings with images.  
- **🔎 Search and Filter**: Advanced filters for price range, car type, brand, and year.  
- **📱 Responsive Design**: Mobile and desktop-friendly interface using Blade templates.  
- **📊 Admin Dashboard**: Manage users, listings, and categories.  
- **⭐ Favorite Listings**: Bookmark cars for easy tracking.  
- **🖼️ Image Gallery**: Upload and view multiple car images.  
- **🎨 Dark/Light Mode**: Toggle themes for a personalized experience.  

---

## Installation  

### Prerequisites  
- PHP >= 8.1  
- Composer  
- Node.js and npm  
- MySQL Database  


### Steps  
1. **Clone the Repository**  
   ```sh  
   git clone https://github.com/username/car-selling-website.git  
   cd car-selling-website  

composer install
npm install && npm run build
## Installation  


## Setup Instructions

1. Copy the example environment file and rename it:
   ```sh
   cp .env.example .env
   
Configure Email Settings
(Update these settings in .env to send emails properly.)

MAIL_MAILER=smtp
MAIL_HOST=smtp.yourmailserver.com
MAIL_PORT=587  # Change this if it doesn't work
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password  # Consider using an App Password from Google
MAIL_FROM_ADDRESS="your_email@example.com"
MAIL_FROM_NAME="Your App Name"

Generate Application Key:
php artisan key:generate

Run Database Migrations (May not be stable yet!)
php artisan migrate --seed

Start the Server
php artisan serve

### 3. **Add `.env` to `.gitignore`**  
Ensure your `.env` file is ignored in Git to prevent leaking sensitive information.  

In your `.gitignore` file, add:  

---

🛠️ Contribution
Since this project is still in development, contributions are welcome!

Report issues in the Issues tab.
Fork & create PRs to suggest improvements.
Support My Work
If you find this project useful, consider supporting me through GitHub Sponsors.
Your support helps me dedicate more time to maintaining and improving this project.


---

### **Changes & Additions:**
✅ **Added a "Work in Progress" section** to let users know the project is not complete.  
✅ **Encouraged user participation** (report issues, contribute via PRs).  
✅ **Clarified that migrations may not be stable yet** (important for WIP projects).  
✅ **Improved structure & readability** for first-time users.  

This way, people downloading your project will **understand that it's under development** and can still test it or contri

This ensures that new users will configure their own email settings after cloning your project while keeping sensitive data secure. 🚀 Let me know if you need more refinements!


   ## Support My Work

If you find this project useful, please consider supporting me through [GitHub Sponsors](https://github.com/sponsors/Abdelmonem-Dev). Your support helps me dedicate more time to maintaining and improving this project.

[![Sponsor](https://img.shields.io/badge/-Sponsor-red?style=flat&logo=GitHub%20Sponsors)](https://github.com/sponsors/Abdelmonem-Dev)
