# Webdatabase_Programming
Gachon OSEP 2023 Web Database Programming Assignment 

<img width="959" alt="image" src="https://github.com/javerinetan/Quiz-Website-using-database/assets/90853880/e2e6e694-2d26-418a-9e54-9236de353ff2">



# Description: 
- Develop an online quiz platform for user registration, quiz creation, and participation.
- Leverage modern web development frameworks for scalability and responsiveness.

# Members:
- Amber: Account Management + Quiz Section + Database Designer
- Javerine: Quiz Section + Most JavaScript + Navbar + Account Page + Database
- Jeren: Home + Activity Section + Majority of the CSS
- Nicholas: Dashboard section
- Overall: Everyone helped each other wherever we could help

# What was in the project?
- We scraped the homepage of an existing quiz website (quizizz.com) into our Index.php
- The rest of the pages were coded from scratch.

# Why did we choose this project?
- Showcase CRUD Functions and use of PHP and database

# What we developed [Overview]
- Account management (CRUD)
- Quiz creation (CRUD)
- Quiz Attempt

# Platforms Used 
- XAMPP
- MySQL

# Tools and Technologies Used 
-	HTML/CSS for front-end design.
-	JavaScript for client-side interactivity.
-	PHP for server-side scripting.
-	MySQL or another database for data storage.

# Database Code Creation 
- Table Name: Account 
```bash
CREATE TABLE account (
    id int PRIMARY KEY AUTO_INCREMENT,
    name text NOT NULL,
    birthdate date NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    joined_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    admin BOOLEAN NOT NULL DEFAULT 0,
    image_url varchar(255) NOT NULL DEFAULT 'https://www.kedglobal.com/data/ked/image/2023/11/20/ked202311200029.600x.0.jpg'; 
);
```

- Table Name: Quiz
 ``` bash
CREATE TABLE quiz (
    quiz_id INT PRIMARY KEY AUTO_INCREMENT,
    creator_id INT NOT NULL,
    quiz_name TEXT NOT NULL,
    questions INT NOT NULL,
    created_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (creator_id) REFERENCES account(id)
);
```

- Table Name: Quiz Attempt Log
``` bash
CREATE table quiz_attempt_log(
    attempt_id INT PRIMARY KEY AUTO_INCREMENT,
    attempt_by INT NOT NULL,
    quiz_id INT NOT NULL, 
    wrong INT NOT NULL, 
    correct INT NOT NULL, 
    score FLOAT NOT NULL,  
    attempted_on TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    FOREIGN KEY (attempt_by) REFERENCES account(id),
    FOREIGN KEY (quiz_id) REFERENCES quiz(quiz_id)
)
```

# Credits 
Please remember to credit us when using this file. All copyrights @QuizIT team 
