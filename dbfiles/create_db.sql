DROP DATABASE IF EXISTS Mariomart;
CREATE DATABASE Mariomart;
USE mariomart;  -- MySQL command

-- create the tables
CREATE TABLE bags (
  bagid int(11) NOT NULL AUTO_INCREMENT,
  categoryID int(11) NOT NULL,
  code varchar(10) NOT NULL,
  bagName varchar(255) NOT NULL,
  description text NOT NULL,
  listPrice decimal(10,2) NOT NULL,
  dateAdded datetime NOT NULL,
PRIMARY KEY (bagid),
INDEX categoryID (categoryID),
UNIQUE INDEX code (code)
);


INSERT INTO bags (bagid, categoryID, code, bagName, description, listPrice, dateAdded) VALUES
(1, 3, 'LAPS113ION', 'CASE LOGIC LAPTOP SLEEVE ION', 'Case Logic LAPS113ION 13.3 Laptop Sleeve Ion Blue A seamless wrap of Impact Foam padding provides top to bottom protection. Woven webbing along each side adds subtle texture to the clean design.', '19.98', '2020-01-13 10:05:36'),
(2, 3, 'BAPO', 'BANDO GET IT TOGETHER CYLINDER POUCH', 'The newest way to get it together in style. This update on our get it together pouch has a cylindrical shape, is perfect for writing utensils or makeup, and has a strap on the side for easy carrying. ', '16.00', '2020-01-13 10:05:36'),
(3, 3, 'TNF BLACK', 'BOREALIS BACKPACK', 'With a modern refresh, this classic 28-liter backpack for stashing your gear quickly and hitting the road now offers updated features and an improved suspension system for all-day comfort.', '53.40', '2020-01-13 10:05:36');

-- --------------------------------------------------------

--
-- Table structure for table books
--

CREATE TABLE books (
  bookID int(11) NOT NULL AUTO_INCREMENT,
  categoryID int(11) NOT NULL,
  code varchar(10) NOT NULL,
  subject varchar(255) NOT NULL,
  ISBN bigint(20) NOT NULL,
  bookName varchar(255) NOT NULL,
  description text NOT NULL,
  course varchar(255) NOT NULL,
  listPrice decimal(10,2) NOT NULL,
  dateAdded datetime NOT NULL,
  PRIMARY KEY (bookID),
  INDEX categoryID (categoryID),
  UNIQUE INDEX ISBN (ISBN)
);

--
-- Dumping data for table books
--

INSERT INTO books (bookID, categoryID, code, subject, ISBN, bookName, description, course, listPrice, dateAdded) VALUES
(1, 1, 'AnP', 'Biology', 9780321919007, 'Anatomy & Physiology', 'Anatomy and Physiology is a dynamic textbook for the two-semester human anatomy and physiology course for life science and allied health majors.', 'ANAT 101', '99.00', '2020-01-13 10:05:36'),
(2, 1, 'MicBio', 'Biology', 9783405327328, 'Microbiology', 'This book covers both the basic and clinical aspects of bacteriology, virology, mycology, parasitology, and immunology and also discusses important infectious diseases using an organ system approach.', 'BIO 226', '199.00', '2020-01-13 10:05:36'),
(3, 1, 'CellGen', 'Biology', 9781305730052, 'Cells and Genetics', 'The present book entitled Cell Biology and Genetics aims to cover a wide area of cell biology and Mendelian genetics in a form especially suitable for undergraduates.', 'BIO 244', '274.00', '2020-01-13 10:05:36'),
(4, 1, 'BioC', 'Biochemistry', 9781464126109, 'Principles of Biochemistry', 'Principles of Biochemistry brings clarity and coherence to an often unwieldy discipline, offering a thoroughly updated survey of biochemistry enduring principles, definitive discoveries, and groundbreaking new advances with each edition.', 'BIOC 400 S', '99.99', '2020-01-13 10:05:36'),
(5, 1, 'M121', 'Mathmatics', 9781473707504, 'Essential Calculus early transcendentals', 'Stewarts ESSENTIAL CALCULUS: EARLY TRANSCENDENTALS offers a concise approach to teaching calculus, focusing on major concepts and supporting those with precise definitions, patient explanations.', 'MATH 121', '99.00', '2020-01-13 10:05:36'),
(6, 1, 'HCI', 'INFO', 9781119547259, 'Interaction Design: Beyond Human-Computer Interaction', 'This book offers a cross-disciplinary and process-oriented, state-of-the-art introduction to the field, showing not just what principles ought to apply to interaction design, but crucially how they can be applied.', 'INFO 310', '115.00', '2020-01-13 10:05:36'),
(7, 1, 'CompTIA', 'Computing and Security Technology', 9783219697259, 'CompTIA Security+ Guide to Network Security Fundamentals', 'The text covers the essentials of network security, including compliance and operational security; threats and vulnerabilities; application, data, and host security; access control and identity management; and cryptography.', 'CT 301', '99.99', '2020-01-13 10:05:36'),
(8, 1, 'OrgChem', 'Chemistry', 9781119110477, 'Organic Chemistry', 'The textbook includes all of the concepts typically covered in an organic chemistry textbook, but special emphasis is placed on skills development to support these concepts.', 'CHEM 241', '86.99', '2020-01-13 10:05:36'),
(9, 1, 'DisMath', 'Mathmatics', 9780495826170, 'Discrete Math', 'AN INTRODUCTION TO MATHEMATICAL REASONING provides a clear introduction to discrete mathematics and mathematical reasoning in a compact form that focuses on core topics.', 'MATH 180', '50.99', '2020-01-13 10:05:36');

-- --------------------------------------------------------

--
-- Table structure for table categories
--

CREATE TABLE categories (
  categoryID int(11) NOT NULL AUTO_INCREMENT,
  categoryName varchar(255) NOT NULL,
  PRIMARY KEY (categoryID)
);

--
-- Dumping data for table categories
--

INSERT INTO categories (categoryID, categoryName) VALUES
(1, 'Books'),
(2, 'Electronics'),
(3, 'Bags');

-- --------------------------------------------------------

--
-- Table structure for table electronics
--

CREATE TABLE electronics (
  eid int(11) NOT NULL AUTO_INCREMENT,
  categoryID int(11) NOT NULL,
  code varchar(10) NOT NULL,
  eName varchar(255) NOT NULL,
  description text NOT NULL,
  listPrice decimal(10,2) NOT NULL,
  dateAdded datetime NOT NULL,
PRIMARY KEY (eid),
INDEX categoryID (categoryID),
UNIQUE INDEX code (code)
);

--
-- Dumping data for table electronics
--

INSERT INTO electronics (eid, categoryID, code, eName, description, listPrice, dateAdded) VALUES
(1, 2, 'MSI GE63', 'RAIDER RGB600 15.6 GAMING NOTEBOOK', 'The MSI GE63 Raider brings together a great personal gaming experenice and enjoying it with friends all in one laptop. Powered by the latest Intel 9th Gen Core I7 and NVIDIAs RTX 2070, you can bring the game to life anywhere. ', '2607.98', '2020-01-13 10:05:36'),
(2, 2, 'N4000', 'ASUS CHROMEBOOK 12 11.6 CHROMEBOOK 4 GB RAM', 'ASUS Chromebook 12 is the simple way to boost your productivity and have more fun on the move. This compact and lightweight Chromebook is powered by a dualcore Intel processor, and gives you the freedom of up to 10 hours battery life.', '532.98', '2020-01-13 10:05:36'),
(3, 2, 'T50', 'WIRELESS PROGRAMMABLE ERGONOMIC TRACKBALL MOUSE', 'Meet one of the newest models of the Adesso Trackball product line, the Adesso iMouse T50. This device is cablefree by utilizing the 2.4 GHz radio frequency technology, offering a wireless range of up to 30 feet.', '97.98', '2020-01-13 10:05:36');

-- --------------------------------------------------------

--
-- Table structure for table user
--

CREATE TABLE user (
  id int(11) NOT NULL AUTO_INCREMENT,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  email_address varchar(255) NOT NULL,
  user_name varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (id)
);

--
-- Dumping data for table user
--

INSERT INTO user (id, first_name, last_name, email_address, user_name, password) VALUES
(1, 'salwa', 'ghaffar', 'salwa@gmail.com', 'sghaf', '1234'),
(2, 'salwa', 'ghaffar', 'salwa@gmail.com', 'sghaf', '1234'),
(3, 'shamme', 'alam', 'alam@gmail.com', 'shamme', '1234'),
(4, 'micah', 'bhcjdsbhd', 'micah@gmail.com', 'micah', '1234');

GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO root@localhost
IDENTIFIED BY '';