[Source Code (GitHub)](https://github.com/Til7701/website)

This website is not the best thing I have ever built, but it does it's job.
Notably, it does not use any major frameworks, but is built using simple PHP, HTML and CSS.
The usage of JavaScript is also very limited, as I wanted to keep the website as simple as possible.
In fact, currently there is only one JavaScript file, which is used to copy text from code blocks.

The website a bit frankensteined together, which I will describe in more detail in the following sections.
I am aware that there are better ways to build a website, but I am not a web developer and did not want to delve into
the world of PHP dependencies and frameworks.
Furthermore, I have an aversion against using JavaScript for the backend or anything that can be done with CSS or PHP,
so any frameworks that rely heavily on JavaScript were not an option for me.

Any folders I am mentioning in the following sections are relative to the root of the repository linked above.
The root directory, which is actually deployed is the `site` directory. Some other parts like the content or CSS
files are processed and the result is copied there during the build process. To see what actually has to be run to build
the website, I recomment taking a look at the GitHub Action that deploys the website, which can be found in the
`.github/workflows/deploy.yml` file.

## Content (Markdown)

The content of most of the pages like this one is written in Markdown and stored in the `src/markdown` directory.
The Markdown files are converted to HTML using [Pandoc](https://pandoc.org/) and put into the
`site/php/templates/from-markdown` directory. This conversion can be triggered by running the `scripts/convert.sh`
script from the root of the project.

## CSS (SCSS)

To make development easier, I have SCSS files for the different parts of the website in the `src/scss` directory.
They are compiled to CSS using the `scripts/build-css.sh` script and put into the `site/css` directory.

## API

This website also has a small API to allow me to have a location where I can implement whatever I come up with.
The API is documented using OpenAPI and can be browsed [here](/api-docs).
You can also get an [openapi.yaml](/api/v1/openapi.yaml) or [openapi.json](/api/v1/openapi.json) file to use in your own
projects.

## Font

I am using the [Adwaita-Fonts](https://gitlab.gnome.org/GNOME/adwaita-fonts) for this website.
They are served by the same server as the website itself, so they are not loaded from a third-party CDN.
