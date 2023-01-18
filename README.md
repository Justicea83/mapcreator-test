## Home to run this application locally.

- Create a new file `.env`
- Copy the contents of `.env.example` to `.env`
- Create a new API Client from https://api.mapcreator.io/auth/clients
- The callback URL of the client should be the `http[s]://domain/callback`
- Open `.env`
- Replace `MAPCREATOR_CLIENT_ID` with the client_id
- Replace `MAPCREATOR_CLIENT_SECRET` with the client_secret
- Run `npm install`
- Run `composer install`
- Run `npm run dev` or `npm run build`
- Ensure docker desktop is running
- Run `./vendor/bin/sail artisan migrate`
- Run `./vendor/bin/sail artisan db:seed`
- Run `./vendor/bin/sail up`


### Login Credentials
Email: `test@example.com`
Password: `password`
