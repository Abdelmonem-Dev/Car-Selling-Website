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

## ✨ Key Features (Planned)  
- **🔒 User Authentication**: Secure login and registration system for buyers, sellers, and admin roles.  
- **🚘 Car Listings**: Add, edit, and delete detailed car listings with images.  
- **🔎 Search and Filter**: Advanced filters for price range, car type, brand, and year.  
- **📱 Responsive Design**: Mobile and desktop-friendly interface using Blade templates.  
- **📊 Admin Dashboard**: Manage users, listings, and categories.  
- **⭐ Favorite Listings**: Bookmark cars for easy tracking.  
- **🖼️ Image Gallery**: Upload and view multiple car images.  
- **🎨 Dark/Light Mode**: Toggle themes for a personalized experience.  

---

## 🛠️ Installation  

### **Prerequisites**  
- PHP >= 8.1  
- Composer  
- Node.js and npm  
- MySQL Database  

### **Setup Instructions**  

 ```sh  
1️⃣ Clone the Repository
   git clone https://github.com/username/car-selling-website.git  
   cd car-selling-website

2️⃣ Install Dependencies
composer install
npm install && npm run build

3️⃣ Copy Environment File
cp .env.example .env

4️⃣ Configure Email Settings (Update .env to enable email functionality)
MAIL_MAILER=smtp
MAIL_HOST=smtp.yourmailserver.com
MAIL_PORT=587  # Change this if needed
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password  # Consider using an App Password from Google
MAIL_FROM_ADDRESS="your_email@example.com"
MAIL_FROM_NAME="Your App Name"

5️⃣ Generate Application Key
php artisan key:generate

6️⃣ Run Database Migrations (Not fully stable yet!)
php artisan migrate --seed

7️⃣ Start the Server
php artisan serve

8️⃣ (Optional) Add .env to .gitignore
Add this line in .gitignore to prevent exposing sensitive environment variables:
.env
 ```
🛠️ Contribution
Since this project is still in development, contributions are welcome!

Report issues in the Issues tab.
Fork & create PRs to suggest improvements.
❤️ Support My Work
If you find this project useful, please consider supporting me through GitHub Sponsors.
Your support helps me dedicate more time to maintaining and improving this project.

   ## Support My Work

If you find this project useful, please consider supporting me through [GitHub Sponsors](https://github.com/sponsors/Abdelmonem-Dev). Your support helps me dedicate more time to maintaining and improving this project.

[![Sponsor](https://img.shields.io/badge/-Sponsor-red?style=flat&logo=GitHub%20Sponsors)](https://github.com/sponsors/Abdelmonem-Dev)
