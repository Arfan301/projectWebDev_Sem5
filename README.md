# projectWebDev_Sem5

lokasi folder: xampp/htdocs

git clone https://github.com/Arfan301/projectWebDev_Sem5.git

Lakukan ini ketika pertama kali menclone repository:
- composer install
- npm install
- php artisan key:generate
- php artisan migrate (dilakukan pertama kali bila tidak ada database di phpmyadmin)
- php artisan migrate:fresh --seed (menghapus semua tabel dan menginsert tabel baru)

Untuk meng-akses website :
- nyalakan xampp
- php artisan serve
- npm run dev
