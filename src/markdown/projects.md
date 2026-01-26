This page is an overview of my projects.
<!--Some projects have their own dedicated pages with more information.-->

## This Website

[GitHub](https://github.com/Til7701/website) <!--| [More Info](/projects/website)-->

This website is obviously one of my projects.
It is based on a website I developed with some others for a university course called "Internet Technologies".
It uses PHP to render the pages and [SCSS](https://sass-lang.com/) for styling.
The content is mostly written in Markdown and converted to HTML using [Pandoc](https://pandoc.org/).

## request-sink

[GitHub](https://github.com/Til7701/request-sink)

A small cli application for logging requests to see what they look like.

## battery-status

[GitHub](https://github.com/Til7701/battery-status)

Adds a tray icon to show the current battery percentage for Windows devices.

It uses JNI and FFM to call Windows libraries to get the battery status.
It also allows setting the power plan by right-clicking the tray icon.

This is the first of my projects that other people have found and used.
It is also the first project that received stars on GitHub.
Unfortunately, I have not really worked on it in a while, since I am not using Windows that much anymore.

## Puzzle More Days

[GitHub](https://github.com/Til7701/PuzzleMoreDays) | [More Info](/projects/puzzled)

An [Adwaita](https://gnome.pages.gitlab.gnome.org/libadwaita/) application to solve daily puzzles in various formats.
In the future it may tell you, if you are on the
right track or, whether it is impossible to solve the puzzle with your current approach.

---

## Schlunzis

[GitHub](https://github.com/schlunzis)

Schlunzis is a GitHub organization I co-founded with [JayPi4c](https://blog.jaypi4c.de/).
We are working on and off on various projects together.
You can interpret the name as the German word or as an acronym for "**S**harp-minded **C**oders **H**andcrafting
**L**imitless **U**tilities **N**amed **Z**e **I**mpressive **S**chwifty"

### PPA

[GitHub](https://github.com/schlunzis/ppa)

A personal package archive (PPA) for Ubuntu-based Linux distributions.
It allows users to easily install and update software packages that we are developing.
The PPA is hosted with the same hosting provider (Alfahosting) as this website.
Instructions to add the PPA can be found in the GitHub repository linked above.
It also contains a list of packages available in the PPA.

### Vigilia

[GitHub](https://github.com/schlunzis/vigilia)

This project is in early development, but is a hot contender for our next big time-sink.
It will allow you to search your files and indexed websites using embedding search.

### Ze Impressive Schwifty

[GitHub](https://github.com/schlunzis/Ze-Impressive-Schwifty)

A Java library containing various utility functions and classes.
We are using it in various projects to avoid code duplication.
It is not currently released to Maven Central, but can be used via JitPack.
We are planning to release it to Maven Central in the future.

#### zis-stomp

[GitHub](https://github.com/schlunzis/zis-stomp)

A [STOMP](https://stomp.github.io/) client written in Java and built on Jakarta WebSockets.

This is part of the Ze Impressive Schwifty project, but has its own repository.

---

## uol-esis

In a group project at the University spanning one year, we developed two applications.

### Th1nk

[GitHub](https://github.com/uol-esis/Th1nk)

This tool can read Excel and CSV files in various formats and convert them into a database conformant format.
The user can use converters to transform the tables into the desired format.
The backend can also generate a chain of converters based on the input to do most of the work automatically.
I was mostly involved in the API design and backend development using Java and Spring Boot.

### CivicSage

[GitHub](https://github.com/uol-esis/CivicSage)

CivicSage allows users to search uploaded files and indexed websites using embedding search.
Users can also chat with a chat model with the search results as context.
I was mostly involved in the API design and backend development using Java and Spring Boot.
We also used the new [Spring AI](https://spring.io/projects/spring-ai) module to integrate with OpenAI's API for
generating embeddings.
