[Source Code (GitHub)](https://github.com/Til7701/Puzzled) | [Collection Spec](/projects/puzzled/collection-spec)

An [Adwaita](https://gnome.pages.gitlab.gnome.org/libadwaita/) application for Linux to solve polyform puzzles in
various formats.
It can tell you, if you are on the right track or, whether it is impossible to solve the puzzle with your current
approach.

![The puzzle selection](/assets/images/puzzled/screenshot-start-dark.png){data-external="1"}
![While solving a puzzle](/assets/images/puzzled/screenshot-year-dark.png){data-external="1"}

This is the first project I am developing using Adwaita, GTK and Rust.

I first saw Puzzle A Day in Canada while studying abroad and liked it so much, that I brought it back to Germany with
me.
After solving it every day for a year, I wanted to know how many solutions there are.
So I wrote a solver in Java which can be found [here](https://github.com/Til7701/puzzle-a-day).
After finding all solutions for the default layout, I tried out various other layouts.
However, I had to recompile for each layout change, and it was not very user-friendly.
Thus, I decided to use this project to make myself familiar with Rust and GTK development and provide a more
user-friendly interface.

You can solve any Polyomino puzzle with Puzzled, as long as you can provide the layout in the correct format.
You can create your own puzzle layouts and load them into the application.
In order for Puzzled to import the layouts, you have to create a JSON file following the specification defined
[here](/projects/puzzled/collection-spec).
If you have any problems with creating your own collection, feel free to open an issue on GitHub.

## Installation

Puzzled is available on [Flathub](https://flathub.org/en/apps/de.til7701.Puzzled). You can install it by running:

```bash
flatpak install flathub de.til7701.Puzzled
```

## Releases

[Install from Flathub](https://flathub.org/en/apps/de.til7701.Puzzled) | [GitHub Releases](https://github.com/Til7701/Puzzled/releases)

### 1.1.0 (2026-03-27)

[Download from GitHub](https://github.com/Til7701/Puzzled/releases/tag/v1.1.0)

- Added the ability to generate random puzzles.
- Added more puzzles to the pentominoes collection.
- Added popover to explain community collections.

### 1.0.1 (2026-03-14)

[Download from GitHub](https://github.com/Til7701/Puzzled/releases/tag/v1.0.1)

- Update icon and description for Flathub.
- Set log level to info.

### 1.0.0 (2026-03-10)

[Download from GitHub](https://github.com/Til7701/Puzzled/releases/tag/v1.0.0)

- Add more puzzles to the Hexomino and Tromino collections.
- You now get stars for solving puzzles using fewer hints.
- Improve solver feedback, if no solution is available.
- Allow marking puzzles as unsolvable.
- Fixed name for menu entry for about dialog.

### 0.4.0 (2026-02-22)

[Download from GitHub](https://github.com/Til7701/Puzzled/releases/tag/v0.4.0)

- Update collection selection list.
- Grid lines can now be shown on the board.
- Added a How to Play dialog.
- Fix flickering lines on tiles when moving them.
- When deleting a community collection, another collection is now selected.
- For each collection the average difficulty is now shown.
- The amount of cells to fill on the board is now shown for each puzzle.

### 0.3.1 (2026-02-18)

[Download from GitHub](https://github.com/Til7701/Puzzled/releases/tag/v0.3.1)

- Disallow moving tile out of the puzzle area.
- Fix last tile hint showing up when opening another puzzle.
- Fix unused tile detection.
- Update layout when window size changes in any way.

### 0.3.0 (2026-02-16)

[Download from GitHub](https://github.com/Til7701/Puzzled/releases/tag/v0.3.1)

- Instead of getting solvability-feedback every time you move a tile, you now have to request a
  hint. This hint either shows a transparent tile where one should be placed or tells you that the
  puzzle cannot be solved with the current approach.
- Solved puzzles are now marked as such.
- You can now jump directly to the next puzzle in the collection after finding a solution.
- Collections can now declare, that the puzzles should be solved in a linear order.
- Previews of tiles and boards can now be disabled by collections for locked puzzles.
- Community puzzles are now selected after loading.
- Fixed the solver giving false negatives sometimes.
- Performance of the solver has been improved.

### 0.2.0 (2026-01-27)

[Download from GitHub](https://github.com/Til7701/Puzzled/releases/tag/v0.2.0)

From this release onward, Puzzle More Days has been renamed to Puzzled.
This release also includes a basic restructure of the application.

- Puzzles are now organised in collections.
- Collections can be loaded at runtime.
- Collections can be created by the community.

### 0.1.0 (2026-01-14)

[Download from GitHub](https://github.com/Til7701/Puzzled/releases/tag/v0.1.0)

First Release of Puzzle More Days, including the default layout and
a layout with a two-digit year. Potential errors are highlighted
and a solver predicts the solvability of the current approach.

