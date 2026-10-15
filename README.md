# Zain Tech Automation Solutions — PHP Website

Complete multi-page PHP website. Plain PHP + custom CSS, no frameworks. MySQL optional (contact form works with file fallback too).

## Structure
- `index.php` — Home
- `about.php` — About
- `services.php` — Services
- `contact.php` — Contact form (saves to MySQL if configured, else `messages/messages.txt`)
- `admin-messages.php` — View received messages (add password before public use!)
- `404.php` — Custom not-found page
- `database.sql` — Messages table schema
- `includes/` — config.php, db.php (PDO), header.php, footer.php
- `css/style.css` — all styling
- `.htaccess` — custom 404 handling

## Deploy on Ubuntu + Apache (AWS EC2)
```bash
sudo apt update
sudo apt install -y apache2 php libapache2-mod-php php-mysql mysql-server unzip
sudo rm -rf /var/www/html/*
sudo cp -r * /var/www/html/
sudo chown -R www-data:www-data /var/www/html
sudo systemctl enable apache2
```
Open `http://<server-ip>` in the browser.

## Database setup (MySQL)
```bash
# 1. Create database + user (set your own strong password)
sudo mysql -e "CREATE DATABASE zaindb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
sudo mysql -e "CREATE USER 'zainuser'@'localhost' IDENTIFIED BY 'YOUR_STRONG_PASSWORD';"
sudo mysql -e "GRANT ALL PRIVILEGES ON zaindb.* TO 'zainuser'@'localhost'; FLUSH PRIVILEGES;"

# 2. Create the table
mysql -u zainuser -p zaindb < /var/www/html/database.sql

# 3. Put the same password in includes/config.php (DB_PASS)
sudo nano /var/www/html/includes/config.php
```
Test: send a message from `/contact.php`, then view it at `/admin-messages.php`.

## Contact form notes
- With MySQL configured: messages go to the `messages` table.
- Without MySQL: messages are appended to `messages/messages.txt` (automatic fallback).
- To also email notifications, configure PHP mail/SMTP and add a `mail()` call in contact.php.
