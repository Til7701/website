This repository contains the source code for my website. It uses Pandoc to convert markdown files to HTML and PHP
for templating. In the future might also implement a simple API via /api.

## Development Environment

There is a docker compose file that will set up a development environment for you. To get started, just run:

```bash
GID=$GID UID=$UID docker compose up --build
```

This will start a web server on port 8080. You can access the website at `http://localhost:8080`.
It will also watch for changes to the markdown files and automatically rebuild the HTML files as well as changes to
the SCSS files and rebuild the CSS files.

## Swagger UI

To update the Swagger UI, download the latest version from https://github.com/swagger-api/swagger-ui

Then copy the contents of the `dist` folder into the `site/api/v1/swagger-ui` folder in this repository.
Then revert changes in `swagger-initializer.js` to keep the customizations.
