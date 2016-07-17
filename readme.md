# Invoice

**This app is a playground for me to refresh and expand my Laravel skills. I'm also trying out the BEM CSS approach. Constructive criticism is welcome.**

This is a web app that generates invocies. 

## Setup
1. Create a DB and then create a .env with your DB connection settings.
2. Migrate and seed the DB:

```
php artisan migrate
php artisan db:seed
```

3. Update settings to not be Chandler Bing in the settings tab!

## Pro tip
To generate a PDF of the invoice, you can use the "Print" with "PDF" as the printer in Chrome.

## Development

### Style Updates
```
gulp watch
```

### Javascript Updates
```
webpack --watch
```


