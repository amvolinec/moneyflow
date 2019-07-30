## About MoneyFlow Test

Clone this repository: 

git clone https://github.com/amvolinec/moneyflow.git to_your_path

After that:
 
1. Copy .env.example to .env
2. Add Google API key APP_API_KEY=
3. Create your DB.
4. Configure database in the .env file.
5. cd to_your_path
6. composer install
7. npm install (yarn install)
8. php artisan migrate
9. php artisan db:seed (optional: to create one teamleader with email teamleader@gmail.com and one agent with email agent@gmail.com | pass: secret)
10. php artisan key:generate

 