## Home to run this application locally.

- Create a new file `.env`
- Copy the contents of `.env.example` to `.env`
- Create a new API Client from https://api.mapcreator.io/auth/clients
- Open `.env`
- Replace `MAPCREATOR_CLIENT_ID` with the client_id
- Replace `MAPCREATOR_CLIENT_SECRET` with the client_secret
- Run `npm install`
- Run `composer install`
- Ensure docker desktop is running
- Run `./vendor/bin/sail artisan migrate`
- Run `./vendor/bin/sail artisan db:seed`
- Run `./vendor/bin/sail up`
