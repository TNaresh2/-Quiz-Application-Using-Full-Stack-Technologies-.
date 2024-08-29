DROP DATABASE IF EXISTS quiz;

-- Create the database again
CREATE DATABASE quiz;
CREATE TABLE Admins (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);-- Create the SIGNUP table
-- Drop the database if it exists


-- Switch to the quiz database
USE quiz;

-- Create the SIGNUP table
CREATE TABLE SIGNUP (
    id INT PRIMARY KEY AUTO_INCREMENT,
    
    username VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    confirmpassword VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);



-- Create the registration table
CREATE TABLE IF NOT EXISTS registration (
  id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE ,
    password VARCHAR(10) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    dob DATE,
    contact_number1 VARCHAR(15) NOT NULL,
    contact_number2 VARCHAR(15),
    college VARCHAR(255) NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(255) NOT NULL,
    pincode VARCHAR(6) NOT NULL,
    image_path VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Categories (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS Questions (
    question_id INT PRIMARY KEY AUTO_INCREMENT,
    category_id INT NOT NULL,
    question_text VARCHAR(255) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);

CREATE TABLE IF NOT EXISTS Options (
    option_id INT PRIMARY KEY AUTO_INCREMENT,
    question_id INT NOT NULL,
    option_text VARCHAR(255) NOT NULL,
    is_correct BOOLEAN NOT NULL,
    FOREIGN KEY (question_id) REFERENCES Questions(question_id)
);

CREATE TABLE IF NOT EXISTS Scores (
    score_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    category_id INT NOT NULL,
    score INT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (email) REFERENCES registration(email),
    FOREIGN KEY (category_id) REFERENCES Categories(category_id)
);
-- Insert questions and options for HTML
INSERT INTO Questions (category_id, question_text) VALUES
(15, 'What does HTML stand for?'),
(15, 'Who is making the Web standards?'),
(15, 'Choose the correct HTML element for the largest heading:'),
(15, 'What is the correct HTML element for inserting a line break?'),
(15, 'What is the correct HTML for adding a background color?'),
(15, 'Choose the correct HTML element to define important text'),
(15, 'Choose the correct HTML element to define emphasized text'),
(15, 'What is the correct HTML for creating a hyperlink?'),
(15, 'Which character is used to indicate an end tag?'),
(15, 'How can you open a link in a new tab/browser window?'),
(15, 'Which of these elements are all <table> elements?'),
(15, 'How can you make a numbered list?'),
(15, 'How can you make a bulleted list?'),
(15, 'What is the correct HTML for making a checkbox?'),
(15, 'What is the correct HTML for making a text input field?'),
(15, 'What is the correct HTML for inserting an image?'),
(15, 'What is the correct HTML element for playing video files?'),
(15, 'What does the <a> element represent?'),
(15, 'What is the correct HTML for creating a text area?'),
(15, 'What is the correct HTML for making a drop-down list?');

INSERT INTO Options (question_id, option_text, is_correct) VALUES
(1, 'Hyper Text Markup Language', TRUE),
(1, 'Home Tool Markup Language', FALSE),
(1, 'Hyperlinks and Text Markup Language', FALSE),
(1, 'Hyperlinking Text Markup Language', FALSE),

(2, 'Mozilla', FALSE),
(2, 'Microsoft', FALSE),
(2, 'The World Wide Web Consortium', TRUE),
(2, 'Google', FALSE),

(3, '<h1>', TRUE),
(3, '<heading>', FALSE),
(3, '<h6>', FALSE),
(3, '<head>', FALSE),

(4, '<br>', TRUE),
(4, '<lb>', FALSE),
(4, '<break>', FALSE),
(4, '<newline>', FALSE),

(5, '<body style="background-color:yellow;">', TRUE),
(5, '<background>yellow</background>', FALSE),
(5, '<body bg="yellow">', FALSE),
(5, '<background-color>yellow</background-color>', FALSE),

(6, '<strong>', TRUE),
(6, '<important>', FALSE),
(6, '<b>', FALSE),
(6, '<i>', FALSE),

(7, '<em>', TRUE),
(7, '<italic>', FALSE),
(7, '<i>', FALSE),
(7, '<strong>', FALSE),

(8, '<a href="http://www.w3schools.com">W3Schools</a>', TRUE),
(8, '<a name="http://www.w3schools.com">W3Schools.com</a>', FALSE),
(8, '<a url="http://www.w3schools.com">W3Schools.com</a>', FALSE),
(8, '<a>http://www.w3schools.com</a>', FALSE),

(9, '/', TRUE),
(9, '*', FALSE),
(9, '<', FALSE),
(9, '^', FALSE),

(10, '<a href="url" target="_blank">', TRUE),
(10, '<a href="url" new>', FALSE),
(10, '<a href="url" target="new">', FALSE),
(10, '<a href="url" target="new_tab">', FALSE),

(11, '<table><tr><td>', TRUE),
(11, '<table><head><tfoot>', FALSE),
(11, '<thead><body><tr>', FALSE),
(11, '<table><tr><tt>', FALSE),

(12, '<ol>', TRUE),
(12, '<ul>', FALSE),
(12, '<list>', FALSE),
(12, '<dl>', FALSE),

(13, '<ul>', TRUE),
(13, '<dl>', FALSE),
(13, '<ol>', FALSE),
(13, '<list>', FALSE),

(14, '<input type="checkbox">', TRUE),
(14, '<input type="check">', FALSE),
(14, '<checkbox>', FALSE),
(14, '<check>', FALSE),

(15, '<input type="text">', TRUE),
(15, '<textinput type="text">', FALSE),
(15, '<text type="input">', FALSE),
(15, '<input type="textfield">', FALSE),

(16, '<img src="image.jpg" alt="MyImage">', TRUE),
(16, '<img href="image.jpg" alt="MyImage">', FALSE),
(16, '<img link="image.jpg" alt="MyImage">', FALSE),
(16, '<img alt="image.jpg" src="MyImage">', FALSE),

(17, '<video>', TRUE),
(17, '<movie>', FALSE),
(17, '<play>', FALSE),
(17, '<audio>', FALSE),

(18, 'Anchor', TRUE),
(18, 'Article', FALSE),
(18, 'Aside', FALSE),
(18, 'Audio', FALSE),

(19, '<textarea>', TRUE),
(19, '<input type="textarea">', FALSE),
(19, '<input textarea>', FALSE),
(19, '<textinput type="textarea">', FALSE),

(20, '<select>', TRUE),
(20, '<list>', FALSE),
(20, '<dropdown>', FALSE),
(20, '<input type="dropdown">', FALSE);

-- Insert questions and options for Python
INSERT INTO Questions (category_id, question_text) VALUES
(16, 'What is the output of print(2 ** 3)?'),
(16, 'What is the maximum possible length of an identifier in Python?'),
(16, 'Which of the following is not a core data type in Python?'),
(16, 'What is the output of print(9//2)?'),
(16, 'What is the output of print(2 * 3 + 4)?'),
(16, 'Which keyword is used for function in Python?'),
(16, 'What is the output of print(bool(0))?'),
(16, 'What is the correct file extension for Python files?'),
(16, 'What is the output of print(3 == 4)?'),
(16, 'Which of the following function converts a string to a float in Python?'),
(16, 'What is the output of print(10 % 3)?'),
(16, 'Which of the following is used to define a block of code in Python?'),
(16, 'What is the output of print(len("Python"))?'),
(16, 'Which of the following is the correct syntax to create a class in Python?'),
(16, 'Which of the following is the correct way to declare a variable in Python?'),
(16, 'What is the correct way to import a module in Python?'),
(16, 'Which of the following is a mutable data type in Python?'),
(16, 'What is the output of print(5 * "Hello")?'),
(16, 'Which of the following is the correct way to create a function in Python?'),
(16, 'Which of the following is the correct way to create a list in Python?');

INSERT INTO Options (question_id, option_text, is_correct) VALUES
(21, '8', TRUE),
(21, '9', FALSE),
(21, '6', FALSE),
(21, '4', FALSE),

(22, '16', FALSE),
(22, '32', FALSE),
(22, '79', FALSE),
(22, 'None of the above', TRUE),

(23, 'Lists', FALSE),
(23, 'Class', FALSE),
(23, 'Tuples', FALSE),
(23, 'Dictionary', TRUE),

(24, '4', TRUE),
(24, '4.5', FALSE),
(24, '5', FALSE),
(24, 'None of the above', FALSE),

(25, '14', FALSE),
(25, '10', TRUE),
(25, '8', FALSE),
(25, '12', FALSE),

(26, 'define', FALSE),
(26, 'fun', FALSE),
(26, 'function', FALSE),
(26, 'def', TRUE),

(27, 'True', FALSE),
(27, 'False', TRUE),
(27, '0', FALSE),
(27, '1', FALSE),

(28, '.python', FALSE),
(28, '.pyth', FALSE),
(28, '.py', TRUE),
(28, '.pt', FALSE),

(29, 'True', FALSE),
(29, 'False', TRUE),
(29, '0', FALSE),
(29, '1', FALSE),

(30, 'int(x)', FALSE),
(30, 'str(x)', FALSE),
(30, 'float(x)', TRUE),
(30, 'chr(x)', FALSE),

(31, '1', TRUE),
(31, '2', FALSE),
(31, '3', FALSE),
(31, '4', FALSE),

(32, 'Braces', FALSE),
(32, 'Indentation', TRUE),
(32, 'Quotation', FALSE),
(32, 'Brackets', FALSE),

(33, '5', FALSE),
(33, '6', TRUE),
(33, '7', FALSE),
(33, '8', FALSE),

(34, 'class Python', FALSE),
(34, 'class Python():', TRUE),
(34, 'Python class', FALSE),
(34, 'class:Python', FALSE),

(35, 'x = 5', TRUE),
(35, 'int x = 5', FALSE),
(35, 'int: x = 5', FALSE),
(35, 'x = int(5)', FALSE),

(36, 'import module_name', TRUE),
(36, 'import(module_name)', FALSE),
(36, 'module import', FALSE),
(36, 'import: module_name', FALSE),

(37, 'List', TRUE),
(37, 'Tuple', FALSE),
(37, 'String', FALSE),
(37, 'Set', FALSE),

(38, 'HelloHelloHelloHelloHello', TRUE),
(38, '5Hello', FALSE),
(38, 'Error', FALSE),
(38, 'Hello*5', FALSE),

(39, 'function myFunction()', FALSE),
(39, 'def myFunction():', TRUE),
(39, 'def myFunction:', FALSE),
(39, 'myFunction def()', FALSE),

(40, 'list = []', TRUE),
(40, 'list = ()', FALSE),
(40, 'list = {}', FALSE),
(40, 'list = <>', FALSE);

-- Insert questions and options for MySQL
INSERT INTO Questions (category_id, question_text) VALUES
(17, 'Which SQL statement is used to extract data from a database?'),
(17, 'Which SQL statement is used to update data in a database?'),
(17, 'Which SQL statement is used to delete data from a database?'),
(17, 'Which SQL statement is used to insert new data in a database?'),
(17, 'Which SQL statement is used to create a database?'),
(17, 'Which SQL statement is used to create a table in a database?'),
(17, 'Which SQL statement is used to modify a table in a database?'),
(17, 'Which SQL statement is used to delete a table in a database?'),
(17, 'Which SQL statement is used to add a column to a table?'),
(17, 'Which SQL statement is used to drop a column from a table?'),
(17, 'Which SQL keyword is used to sort the result-set?'),
(17, 'Which SQL keyword is used to retrieve a maximum value?'),
(17, 'Which SQL keyword is used to retrieve a minimum value?'),
(17, 'Which SQL clause is used to limit the number of rows returned by a query?'),
(17, 'Which SQL clause is used to combine rows from two or more tables?'),
(17, 'Which SQL keyword is used to retrieve distinct values?'),
(17, 'Which SQL clause is used to filter records?'),
(17, 'Which SQL keyword is used to count the number of rows in a table?'),
(17, 'Which SQL keyword is used to return the number of rows that matches a specified criterion?'),
(17, 'Which SQL clause is used to group rows that have the same values into summary rows?');

INSERT INTO Options (question_id, option_text, is_correct) VALUES
(41, 'SELECT', TRUE),
(41, 'EXTRACT', FALSE),
(41, 'GET', FALSE),
(41, 'OPEN', FALSE),

(42, 'SAVE', FALSE),
(42, 'MODIFY', FALSE),
(42, 'UPDATE', TRUE),
(42, 'CHANGE', FALSE),

(43, 'REMOVE', FALSE),
(43, 'DELETE', TRUE),
(43, 'DROP', FALSE),
(43, 'CUT', FALSE),

(44, 'INSERT', TRUE),
(44, 'ADD', FALSE),
(44, 'NEW', FALSE),
(44, 'APPEND', FALSE),

(45, 'CREATE DATABASE', TRUE),
(45, 'MAKE DATABASE', FALSE),
(45, 'BUILD DATABASE', FALSE),
(45, 'CONSTRUCT DATABASE', FALSE),

(46, 'CREATE TABLE', TRUE),
(46, 'MAKE TABLE', FALSE),
(46, 'BUILD TABLE', FALSE),
(46, 'CONSTRUCT TABLE', FALSE),

(47, 'MODIFY TABLE', FALSE),
(47, 'UPDATE TABLE', FALSE),
(47, 'ALTER TABLE', TRUE),
(47, 'CHANGE TABLE', FALSE),

(48, 'REMOVE TABLE', FALSE),
(48, 'DELETE TABLE', TRUE),
(48, 'DROP TABLE', FALSE),
(48, 'CUT TABLE', FALSE),

(49, 'ADD COLUMN', TRUE),
(49, 'INSERT COLUMN', FALSE),
(49, 'NEW COLUMN', FALSE),
(49, 'APPEND COLUMN', FALSE),

(50, 'DELETE COLUMN', FALSE),
(50, 'DROP COLUMN', TRUE),
(50, 'REMOVE COLUMN', FALSE),
(50, 'CUT COLUMN', FALSE),

(51, 'SORT BY', FALSE),
(51, 'ORDER BY', TRUE),
(51, 'GROUP BY', FALSE),
(51, 'FILTER BY', FALSE),

(52, 'MAX()', TRUE),
(52, 'HIGHEST()', FALSE),
(52, 'GREATEST()', FALSE),
(52, 'UPPER()', FALSE),

(53, 'MIN()', TRUE),
(53, 'LOWEST()', FALSE),
(53, 'SMALLEST()', FALSE),
(53, 'LOWER()', FALSE),

(54, 'TOP', FALSE),
(54, 'LIMIT', TRUE),
(54, 'ROWNUM', FALSE),
(54, 'ROWCOUNT', FALSE),

(55, 'JOIN', TRUE),
(55, 'COMBINE', FALSE),
(55, 'MERGE', FALSE),
(55, 'UNION', FALSE),

(56, 'DIFFERENT', FALSE),
(56, 'DISTINCT', TRUE),
(56, 'UNIQUE', FALSE),
(56, 'DISCRETE', FALSE),

(57, 'WHERE', TRUE),
(57, 'HAVING', FALSE),
(57, 'IF', FALSE),
(57, 'FILTER', FALSE),

(58, 'COUNT()', TRUE),
(58, 'NUMBER()', FALSE),
(58, 'SUM()', FALSE),
(58, 'TOTAL()', FALSE),

(59, 'COUNT()', FALSE),
(59, 'SUM()', FALSE),
(59, 'TOTAL()', FALSE),
(59, 'COUNT()', TRUE),

(60, 'GROUP BY', TRUE),
(60, 'ORDER BY', FALSE),
(60, 'SORT BY', FALSE),
(60, 'SUMMARIZE BY', FALSE);