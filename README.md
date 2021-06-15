![pcmr_icon](https://user-images.githubusercontent.com/78177750/122028462-e9fb4a80-cd80-11eb-9b4d-611795153b13.png)

PCMR

PC Master Race (PCMR) is a website for the computer gamers and users to find the best parts for their PC. Users must create an account on the site and buy Graphics cards, and processors. Only registered users can log in. 

Authors

Cameron - Co-Founder/Developer

Hunter - Co-Founder/Developer

✔️ 1. Separates all database/business logic using the MVC pattern.

Business logic and database under model folder
All HTML files under views folder
Routes to all the html view files under the index.php
index.php calls the function in the Controller class to get data from model and return views.
Classes under classes folder
JavaScripts under scripts

✔️ 2. Routes all URLs and leverages a templating language using Fat-Free framework

All routes are in the index.php and leverages a templating language using Fat-Free Framework

✔️ 3. Has a clearly defined database layer using PDO and prepared statements. You should have at least two related tables.

All database layer is under model in data-layer.php. <!-- kidUser and creations are the related table (one to many relationship). -->

✔️ 4. Data can be viewed and added.

Database layer uses PDO and prepared statements to add, retrieve, and delete from the database.

✔️ 5. Has a history of commits from both team members to a Git repository. Commits are clearly commented.

Each teammate has multiple commits, clearly commented.

✔️ 6. Uses OOP, and defines multiple classes, including at least one inheritance relationship.

<!-- 3 classes. User, ProUser, and creation. User contains all fields such as name, grade, username, and password. ProUser extends User and contains all fields from user and subject. Creation contains fields such as name, description, type, and image to hold any creation made by user. -->

✔️ 7. Contains full Docblocks for all PHP files and follows PEAR standards.

All PHP files contains DocBlock and Follows Pear Standards.

✔️ 8. Has full validation on the client side through JavaScript and server side through PHP.

<!-- User and ProUser sign up, and Creation form has full validation on the client side through JavaScript (scripts/validate.js) and server side through PHP (model/validate.PHP). -->

✔️ 9. All code is clean, clear, and well-commented. DRY (Don't Repeat Yourself) is practiced.

All functions and files are commented. Any code that was repeated was turned into a function and called upon instead of repeating code.

✔️ 10. Your submission shows adequate effort for a final project in a full-stack web development course.

We learned a lot this quarter and made sure to implement as much as we could in the timeframe given. 
