# Puzzled

[GitHub](https://github.com/Til7701/PuzzleMoreDays)

An [Adwaita](https://gnome.pages.gitlab.gnome.org/libadwaita/) application to solve puzzles in various formats.
It can tell you, if you are on the right track or, whether it is impossible to solve the puzzle with your current
approach.

You can create your own puzzle layouts and load them into the application.
[How to create your own puzzles](/projects/puzzled/puzzle-collection-spec)

![Screenshot of the Application](/assets/images/puzzled/puzzled.png){data-external="1"}

This project is still in early development.
It is the first project I am developing using Adwaita, GTK and Rust.

I first saw Puzzle A Day in Canada while studying abroad.
I liked it so much, that I brought it back to Germany with me.
After solving it every day for a year, I wanted to know how many solutions there are.
So I wrote a solver in Java which can be found [here](https://github.com/Til7701/puzzle-a-day).
After finding all solutions for the default layout, I tried out various other layouts.
However, I had to recompile for each layout change, and I was not very user-friendly.
Thus, I decided to use this project to make myself familiar with Rust and GTK development and provide a more
user-friendly interface.
This is the (in-progress) result.
