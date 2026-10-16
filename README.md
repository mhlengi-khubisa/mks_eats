# Mks Eats

A Laravel-powered local food and products marketplace.

## Requirements

- PHP 8.3 or newer
- Composer
- SQLite (or another database supported by Laravel)

## Local setup

1. Install PHP dependencies:

   ```powershell
   composer install
   ```

2. Create your local environment file and application key:

   ```powershell
   Copy-Item .env.example .env
   php artisan key:generate
   ```

3. Create the SQLite database file and load the schema and sample catalogue:

   ```powershell
   New-Item database/database.sqlite -ItemType File
   php artisan migrate --seed
   ```

4. Start the local server:

   ```powershell
   php artisan serve
   ```

Visit `http://127.0.0.1:8000`.

## Deploy to Render

GitHub stores the source code; GitHub Pages cannot run a Laravel/PHP application. This repository includes a Render Blueprint, Docker image, PostgreSQL database, and `/up` health check.

[Deploy Mks Eats to Render](https://render.com/deploy?repo=https://github.com/mhlengi-khubisa/mks_eats)

1. Click the deployment link above and sign in to Render, or create a new Blueprint from the repository in the Render dashboard.
2. Review the resources and plan in `render.yaml`, then apply the Blueprint. Render builds the Docker image, creates PostgreSQL, generates `APP_KEY`, and runs database migrations when the web service starts.
3. Render sets `APP_URL` from the created web service URL. If you use a custom domain, update `APP_URL` in the service environment.
4. Add `PAYFAST_MERCHANT_ID`, `PAYFAST_MERCHANT_KEY`, and `PAYFAST_PASSPHRASE` as secret environment variables in Render when payment processing is configured. Keep `PAYFAST_SANDBOX=true` until sandbox payments are verified.

The Blueprint uses Render's free web and database plans for a low-cost demo. The web service can sleep when idle, and the free PostgreSQL database expires after 30 days. Upgrade to non-expiring paid plans before relying on the deployment or storing real orders. Seeded demo accounts and products are intentionally not created in production. Product photos currently use hosted Unsplash images; configure persistent object storage before adding uploaded product images or generated invoices.

Never upload `.env`, production credentials, local databases, or logs.
