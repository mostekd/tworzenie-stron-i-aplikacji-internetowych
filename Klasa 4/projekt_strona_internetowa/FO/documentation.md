
# Climbing Gym Website Documentation

## Overview

This project is a web application for a climbing gym. It allows users to view, add, and delete climbing routes. The application includes features such as filtering routes by difficulty level and displaying route details.

## File Structure

```
/opt/lampp/htdocs/github/tworzenie-stron-i-aplikacji-internetowych/
├── Klasa 4/
│   └── projekt_strona_internetowa/
│       ├── DB/
│       │   ├── db_climbing.php
│       │   ├── db_connection.php
│       ├── FO/
│       │   ├── add_routes.php
│       │   ├── delete_route.php
│       │   ├── index.html
│       │   ├── routes.php
│       │   ├── save_route.php
│       │   ├── script.js
│       │   ├── style.css
│       ├── database.sql
```

## Database

The database is named `climbing_gym` and contains the following tables:

### `difficulties`

| Column        | Type         | Description                |
|---------------|--------------|----------------------------|
| difficulty_id | INT          | Primary key, auto-increment |
| level         | VARCHAR(50)  | Difficulty level            |

### `routes`

| Column        | Type         | Description                |
|---------------|--------------|----------------------------|
| id            | INT          | Primary key, auto-increment |
| name          | VARCHAR(255) | Route name                  |
| difficulty_id | INT          | Foreign key to `difficulties` |
| description   | TEXT         | Route description           |

### Sample Data

The `difficulties` table is pre-populated with various difficulty levels.

## PHP Files

### `db_connection.php`

This file contains the `db_connection` class, which handles the database connection.

### `db_climbing.php`

This file contains the `db_climbing` class, which extends `db_connection` and provides methods for interacting with the database.

- `selectRoutes()`: Retrieves all routes with their difficulty levels.
- `selectRoutesByDifficulty($difficulty_id)`: Retrieves routes filtered by difficulty level.
- `selectDifficulties()`: Retrieves all difficulty levels.
- `insertRoute($name, $difficulty_id, $description)`: Inserts a new route into the database.
- `deleteRoute($route_id)`: Deletes a route from the database.

### `add_routes.php`

This file contains the form for adding a new climbing route. It includes fields for the route name, difficulty level, and description.

### `delete_route.php`

This file handles the deletion of a climbing route. It receives the route ID via POST and deletes the corresponding route from the database.

### `index.html`

This file is the homepage of the climbing gym website. It provides information about the gym, its facilities, membership plans, and contact details.

### `routes.php`

This file displays the available climbing routes. It includes a form for filtering routes by difficulty level and displays the routes with their details.

### `save_route.php`

This file handles the submission of the add route form. It receives the route details via POST and inserts the new route into the database.

## JavaScript

### `script.js`

This file contains JavaScript code for adding animations to the elements on the page.

## CSS

### `style.css`

This file contains the styles for the website, including the layout, colors, and animations.

## SQL

### `database.sql`

This file contains the SQL commands to create the `climbing_gym` database and its tables, as well as to insert sample data into the `difficulties` table.

## How to Run

1. Set up a local web server (e.g., XAMPP) and place the project files in the appropriate directory.
2. Import the `database.sql` file into your MySQL database to create the necessary tables and insert sample data.
3. Open the website in your browser by navigating to the appropriate URL (e.g., `http://localhost/github/tworzenie-stron-i-aplikacji-internetowych/Klasa 4/projekt_strona_internetowa/FO/index.html`).

## Contact

For any questions or issues, please contact the project maintainer at info@climbinggym.com.
