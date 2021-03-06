# ZEST - THE PRODUCTIVITY APP

This will be the repository for Zest - The Productivity App. Files included would be for the web application that was created through a series of sprints.

Product Owner: Faeldonea, C. F.

## Shared Folder for Artifacts

In this link, we include the Product Backlog, as well as the Sprint Timeline, Sprint Backlog and Scrum Board for the current sprint.

-   Link: https://drive.google.com/drive/folders/1KXPgIdsNL2uYe_NnURWEC8ZnkyAFmHCM?usp=sharing

## Sprints

### 1. First sprint (ended October 22, 2020)

-   The first sprint included the mockup designs for our project.
-   It also included the relational model of the database.

### 2. Second sprint (ended November 12, 2020)

-   Project now includes the basic Php files.
-   Initial design and UI are working.
-   Fixed bugs and issues.

### 3. Third sprint (ended November 26, 2020)

-   Project now has a good working UI.
-   There is uniformity on different pages.
-   Tasks are interactive.
-   Subjects are interactive.
-   Notes are interactive.
-   Reminders shown on home page.
-   Fixed bugs and issues.

### 4. Fourth sprint (ended December 10, 2020)

-   Project now has an interactive and pleasantly working UI.
-   There is now a profile page with working profile themes and avatars.
-   There is also a Help Page, with many access points.
-   Home page looks different, with new design and features.
-   Fixed bugs and issues.

### 5. Fifth Sprint (ended December 22, 2020)

-   Home page looks different, with new design and features.
-   Created new things in different features.
-   Help Page is now fully interactive with pictures and links.
-   Fixed all bugs and issues.

### 6. Sixth Sprint (ended June 22, 2020)

-   Two (2) New Themes Added
-   Forgot Password (Security) Implementation
-   "Delete Account" Feature
-   Online Database
-   Remote Installer
-   Changed code for consistency
-   Improve Overall UI (esp. Profile and HelpDesk)
-   Fixed bugs and issues

## Consultations

-   June 24, 2021 (Sprint 6 Review)
-   December 23, 2020 (Prototype Presentation)
-   November 26, 2020 (Overall UI Consultation #1)
-   November 4, 2020 (Wireframe Consultation)

## Members/Developers:

### 1. FRONTEND (User Interface)

-   Carpio, J. (Notebook)
-   Faeldonea, C. (Home and other Pages)
-   Jinon, J. (Notebook)
-   Visto, R. (Subjects)
-   Castañeda, J. (Profile, Themes)

### 2. BACKEND (Database)

-   Castañeda, J. (Reminders, Profile, Help/Support)
-   Garcia, M. (Subjects)
-   Jomoc, G. (Notebook)
-   Luciano, K. (Notebook)
-   Molina, J. (Tasks, Reminders, Notebook (text editor))
-   Rabe, J. (Subjects)
-   Zamudio, K. (Login and Registration Pages)

### 3. Quality Assurance

-   Castañeda, J. (UI and UX)
-   Faeldonea, C. (Bug Hunter)
-   Molina, J. (UI and UX)
-   Rabe, J. (Bug Hunter)

## Quick Start Guide

### A. Prerequisites

1. To clone the repository on your machine (on Windows, using WSL)
    1. Make sure XAMPP is running Apache
    2. Navigate to `xampp\htdocs`
    3. On the navigation bar, type `wsl`
    4. Run the following command:

```
git clone https://github.com/jvc1019/CMSC128.git
```

2. Open `phpMyAdmin`: http://localhost/phpmyadmin/server_databases.php
    1. Create a new database named `database` with `utf8mb4_general_ci` as encoding
    2. Import `database.sql` from `db/database.sql`. **It will generate dummy entries which should not be deleted.**

### B. Quality-of-Life (QoL) Guide

1. All major components (tasks, notebook, subjects) should be wrapped in a `div` with the class `container`. That way, it will be easier to apply color schemes and stylesheets.

```html
<div class="container">
    <!-- stuff goes here -->
</div>
```

#### For the UI people

-   Stylesheets will affect the basic colors of the the elements inside the `container` class. For example, under a theme called **"Blue Marine"** located in `src/css`:

    ```css
    html {
        scroll-behavior: smooth;
    }

    body {
        background-image: url("../resources/somethingBlue.jpg"); /* theme image also applies to the tasks, subjects, and notes" */
        background-size: cover;
        background-repeat: no-repeat;
    }

    .navbar {
        background-color: blue;
    }

    .container .list-group-item {
        /* affects Bootstrap lists */
        background-color: lightblue; /* something lighter than the bg color of the navbar*/
    }

    .container .card-item {
        /* affects Bootstrap cards */
        background-color: lightblue; /* something lighter than the bg color of the navbar*/
    }
    ```

-   While a CSS called **"Green Sapphire"** may look like this:

    ```css
    html {
        scroll-behavior: smooth;
    }

    body {
        background-image: url("../resources/somethingGreen.jpg"); /* theme image also applies to the tasks, subjects, and notes" */
        background-size: cover;
        background-repeat: no-repeat;
    }

    .navbar {
        background-color: green;
    }

    .container .list-group-item {
        /* affects Bootstrap lists */
        background-color: lightgreen; /* something lighter than the bg color of the navbar */
    }

    .container .card-item {
        /* affects Bootstrap cards */
        background-color: lightgreen; /* something lighter than the bg color of the navbar*/
    }
    ```

-   As much as possible, **follow the Bootstrap 4 convention and its built-in classes for layouting elements** to avoid huge amounts of CSS and JS files for every page, and to make the UI **more consistent**.
    -   If you need a **box**, you probably need a **Bootstrap Card**.
    -   If you need to center your text, you probably need to use the class `text-center`.
    -   More on: https://getbootstrap.com/docs/4.0/components/

2. Most components (navbar, tasks, notebook, subjects) should include the `header.php` file at the top. The `header.php` file contains the `<head>`, with the necessary CSS and JS files for cleaner and consistent code.

```php
<?php include("header.php"); ?>
```

-   If you want to access user details, you can include `user_details.php`.

```php
<?php include("user_details.php"); ?>
```

-   After including `header.php`, **only the `<body>`, or additionally, the `<footer>` needs to be defined**. Notice how the `<div>` with the `container` class is nested inside the body as described in #1. Check out `tasks.php` to see how it works.

    ```html
    <body>
        <div class="container">
            <!-- stuff goes here -->
        </div>
    </body>
    ```

3. For subcomponents that need database access, you can include `conn.php`. Check out `tasks_add.php` to see how it works.

```php
require_once("conn.php");
```

4. To implement notifications, you may use `notification.php`. Check out `notification.php` to see how to use it, and around line 142 on `tasks.php` to see a sample implementation. **UPDATE: Notifications will now appear at the bottom right of the screen for consistency.**

```php
<?php include("notification.php") ?>
```

```javascript
spawnNotification();
```

5. There are some useful functions provided by **jQuery** to shorten your Javascript code, such as
    1. Selectors by class and id
        1. `$("#id_of_element")` -> selects an element by ID, shorter than the `document.getElementById("id_of_element")` command.
        2. `$(".class_of_element")` -> selects element(s) by class
    2. `$("#id_of_element").click(function)` -> Calls a function when the element is clicked.
    3. `$("#id_of_element").val()` -> a setter and a getter, when a string argument is inside `val()`, the element's value tag is set to the string. If there is no argument, then the value of the element is retrieved.
    4. `$("#id_of_element").text()` a setter and getter, when an argument is specified, it replaces the text inside the element. Useful for buttons that change text when clicked, for instance
    ```javascript
    $("#my_Button").click(function (e) {
        $(this).text("My text is changed");
    });
    ```

### C. Using GitHub (on Windows, using WSL)

1.  It is recommended to use Visual Studio Code as your text editor as it offers an easy way of resolving merge conflicts. If there's a merge conflict, open the affected file in Visual Studio Code and options such as **"accept current change"** and **"accept incoming change"** will be shown.

2.  Navigate inside the repository location (`xampp\htdocs\CMSC128`). On the navigation bar, type `wsl`

    1. To get the latest version of the repository (needs an internet connection): `git pull`
    2. **Switch to a separate branch if you're planning to alter another team member's code**, then ask that team member's permission or create a `pull request` before merging/pushing your changes. **Do not commit your changes to `main` immediately unless you're only altering your own code**.
    3. To add files for staging: `git add file_path`
    4. To commit the changes: `git commit -m message` Note: You can commit even when offline. **Do not commit after every little change.**
    5. Committing your changes only affects your working tree. To push the changes to the remote repository (needs an internet connection): `git push`. But remember to `git pull` or `git fetch` (safer than `git pull`) before `git push` to lessen the chances of "merge conflicts" 🙈. **Must read: [Difference of `git fetch` and `git pull`](https://www.git-tower.com/learn/git/faq/difference-between-git-fetch-git-pull/)**

3.  If you want to report bugs or suggest improvements, you can file an issue here: https://github.com/jvc1019/Zest/issues.
