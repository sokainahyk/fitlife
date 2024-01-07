-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 08:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user name` varchar(50) NOT NULL,
  `phone number` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user name`, `phone number`, `password`) VALUES
('ali123', 12345678, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `AppID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `dietitianID` int(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dietitian`
--

CREATE TABLE `dietitian` (
  `D-ID` int(11) NOT NULL,
  `Dietitian name` varchar(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone number` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birth date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dietitian`
--

INSERT INTO `dietitian` (`D-ID`, `Dietitian name`, `address`, `phone number`, `password`, `birth date`) VALUES
(19, 'sokaina hay', 'lebanon,nabatyeh', 70681692, '$2y$10$ANsSpzFVqyKbSJsG6GhyNO.MM0RDrGAboMO7DAQahjUbuAaR7EFXS', '2002-10-14');

-- --------------------------------------------------------

--
-- Table structure for table `diet plan`
--

CREATE TABLE `diet plan` (
  `planID` int(20) NOT NULL,
  `Diet name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diet plan`
--

INSERT INTO `diet plan` (`planID`, `Diet name`) VALUES
(54, 'Healthy Balanced diet');

-- --------------------------------------------------------

--
-- Table structure for table `exercise routines`
--

CREATE TABLE `exercise routines` (
  `ER-ID` int(20) NOT NULL,
  `routine-name` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exercise routines`
--

INSERT INTO `exercise routines` (`ER-ID`, `routine-name`, `time`, `image_path`, `description`) VALUES
(2, 'Cardio workouts', '25min', 'uploads/indoor-cardio-workout.jpg', 'you should do this workout for 25 min each day prefer to be at morning'),
(4, 'Cardio & Core', '30min', 'uploads/cardio&core.jpg', 'because your primary goal is to improve cardiovascular fitness while also working on your abs, doing them together in the same workout can be most efficient for you !');

-- --------------------------------------------------------

--
-- Table structure for table `library_items`
--

CREATE TABLE `library_items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` enum('video','article') NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_items`
--

INSERT INTO `library_items` (`id`, `title`, `type`, `url`) VALUES
(2, 'Healthy Eating Habits', 'article', 'https://www.nhs.uk/live-well/eat-well/how-to-eat-a-balanced-diet/eight-tips-for-healthy-eating/'),
(4, 'Benefits of Cardio', 'article', 'https://health.clevelandclinic.org/the-many-benefits-of-a-cardio-workout'),
(5, 'The Benefits of Regular Exercise', 'article', 'https://www.medicalnewstoday.com/articles/323093'),
(6, 'Healthy Eating: A Beginner\'s Guide', 'article', 'https://www.healthline.com/nutrition/healthy-eating-for-beginners'),
(7, 'Stress Management Techniques', 'article', 'https://www.helpguide.org/articles/stress/stress-management.htm'),
(8, 'Importance of Sleep for Overall Health', 'article', 'https://www.webmd.com/sleep-disorders/benefits-sleep-more'),
(9, 'Mindful Meditation and its Benefits', 'article', 'https://www.mindful.org/meditation/mindfulness-getting-started/'),
(10, 'Understanding and Managing Anxiety', 'article', 'https://www.psychologytoday.com/us/basics/anxiety'),
(11, 'Tips for a Healthy Work-Life Balance', 'article', 'https://www.forbes.com/sites/deeppatel/2017/08/03/7-tips-for-maintaining-a-healthy-work-life-balance/'),
(12, 'The Importance of Hydration for Your Body', 'article', 'https://www.health.harvard.edu/staying-healthy/the-importance-of-staying-hydrated'),
(13, 'Benefits of Regular Cardiovascular Exercise', 'article', 'https://www.medicalnewstoday.com/articles/323093'),
(14, 'Healthy Snacking Habits for Better Nutrition', 'article', 'https://www.eatwell101.com/healthy-snacks-recipes');

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `mealID` int(11) NOT NULL,
  `planID` int(11) NOT NULL,
  `dayOfWeek` varchar(20) NOT NULL,
  `mealType` varchar(200) NOT NULL,
  `calories` varchar(300) DEFAULT NULL,
  `proteins` varchar(300) DEFAULT NULL,
  `carbs` varchar(300) DEFAULT NULL,
  `vegetablesFruits` varchar(300) DEFAULT NULL,
  `fats` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`mealID`, `planID`, `dayOfWeek`, `mealType`, `calories`, `proteins`, `carbs`, `vegetablesFruits`, `fats`) VALUES
(1, 54, 'Monday', 'Breakfast', 'Macronutrients: approximately 327 calories, 18 grams protein, 41 grams carbohydrates, and 11 grams fat', 'Two poached eggs (or fried in a non-stick pan)', 'One slice 100% whole wheat toast', 'One grapefruit', ''),
(2, 54, 'Monday', 'Lunch', 'Macronutrients: 396 calories, 41 grams protein, 18 grams carbohydrates, 18 grams fat', '6 ounces grilled chicken breast', '', 'Large garden salad (3 cups mixed greens with 1 cup cherry tomatoes, 1/4 avocado, topped with 2 tablespoons balsamic vinaigrette)', ''),
(3, 54, 'Monday', 'Dinner', '', 'Halibut (4-ounce portion)', '1 cup of brown rice', '1 cup steamed broccoli', ''),
(4, 54, 'Monday', 'First_Snack', 'Macronutrients: 192 calories, 7 grams protein, 31 grams carbohydrates, 5 grams fat', '3 tablespoons hummus', '1/2 piece of pita bread', '1 cup (about 10) baby carrots', ''),
(5, 54, 'Monday', 'Second_Snack', '', '', '', 'Two pitted Medjool dates', 'Two pitted Medjool dates'),
(6, 54, 'Tuesday', 'Breakfast', 'Macronutrients: 391 calories with 14 grams protein, 52 grams carbohydrates, and 17 grams fat', '', 'One whole-wheat English muffin', 'One orange', '2 tablespoons peanut butter'),
(7, 54, 'Tuesday', 'Lunch', 'Macronutrients: 540 calories, 59 grams protein, 34 grams carbohydrates, 18 grams fat', '6 ounces of turkey breast meat', 'two slices of whole wheat bread', 'large tomato slice, green lettuce, 1/4 avocado', ' teaspoons honey mustard'),
(8, 54, 'Tuesday', 'Dinner', 'Macronutrients: 612 calories, 48 grams protein, 40 grams carbohydrates, 30 grams fat', '5-ounce sirloin steak', 'One roasted sweet potato', '1 cup cooked spinach', '1 cup green beans'),
(9, 54, 'Tuesday', 'First_Snack', '', '', '1 cup plain popcorn', '', '1 ounce 70% dark chocolate'),
(10, 54, 'Tuesday', 'Second_Snack', '', '', '', '1 cup (about 30) grapes', ''),
(11, 54, 'Wednesday', 'Breakfast', 'Macronutrients: approximately 431 calories with 12 grams protein, 73 grams carbohydrates, 13 grams fat', '1/2 cup oats', '2 tablespoons chia seeds', 'one mashed banana', '1 cup almond milk, 1 teaspoon cinnamon'),
(12, 54, 'Wednesday', 'Lunch', '', 'One fried egg', 'One slice whole wheat bread', '1 medium apple', '1/2 avocado, mashed'),
(13, 54, 'Wednesday', 'Dinner', 'Macronutrients: 531 calories, 43 grams protein, 38 grams carbohydrates, 24 grams fat', '5-ounce turkey burger', 'One whole wheat english muffin', 'ne slice tomato, two leaves lettuce, one slice onion', '2 tablespoons ketchup'),
(14, 54, 'Wednesday', 'First_Snack', 'Macronutrients: 337 calories, 6 grams protein, 46 grams carbohydrates, 15 grams fat', '', '', '1 cup fresh raspberries', '1 cup of ice cream'),
(15, 54, 'Wednesday', 'Second_Snack', '', '3 tablespoons hummus', '1 cup baby carrots', '1 cup cherry tomatoes', ''),
(16, 54, 'Thursday', 'Breakfast', '', '', 'Two slices 100% whole wheat toast', 'One banana', '2 tablespoons peanut butter'),
(17, 54, 'Thursday', 'Lunch', 'Macronutrients: 496 calories, 27 grams protein, 28 grams carbohydrates, 132grams fat', 'Tuna wrap', ' one wheat flour tortilla', 'lettuce, and sliced tomato', '1 tablespoon mayonnaise'),
(18, 54, 'Thursday', 'Dinner', 'Macronutrients: 472 calories, 18 grams protein, 91 grams carbohydrates, 8 grams fat', '1 cup tomato sauce', '1 1/2 cups whole wheat pasta', 'Small garden salad (1 cup mixed greens with one half cup cherry tomatoes topped with one tablespoon balsamic vinaigrette)', ''),
(19, 54, 'Thursday', 'First_Snack', 'Macronutrients: 205 calories, 29 grams protein, 17 grams carbohydrates, 3 grams fat', '1 cup cottage cheese (1% fat)', '', '1/2 cup blueberries', ''),
(20, 54, 'Thursday', 'Second_Snack', 'Macronutrients: 290 calories, 5 grams protein, 31 grams carbohydrates, 19 grams fat', '', '', '1 cup grapes', '1 ounce (14) walnuts'),
(21, 54, 'Friday', 'Breakfast', 'Macronutrients: approximately 441 calories with 15 grams protein, 59 grams carbohydrates, and 16 grams fat', '3 tablespoons cream cheese', 'One whole wheat bagel', '', ''),
(22, 54, 'Friday', 'Lunch', '', 'Veggie burger', 'Whole grain bun', 'One sliced apple', 'One slice cheddar cheese'),
(23, 54, 'Friday', 'Dinner', 'Macronutrients: 526 calories, 38 grams protein, 60 grams carbohydrates, 15 grams fat', '4 ounces trout filet', '1 cup brown rice', 'One small garden salad with 1 tablespoon salad dressing', '1 cup steamed green beans'),
(24, 54, 'Friday', 'First_Snack', '', '', '', '1 cup baby carrots', '2 tablespoons ranch dressing'),
(25, 54, 'Friday', 'Second_Snack', 'Macronutrients: 293 calories, 8 grams protein, 35 grams carbohydrates, 16 grams fat', '', '', 'One banana', '2 tablespoons peanut butter'),
(26, 54, 'Saturday', 'Breakfast', '', 'One (7-ounce) container of 2% Greek yogurt', 'One hard-boiled egg', 'One banana', ''),
(27, 54, 'Saturday', 'Lunch', 'Macronutrients: 531 calories, 43 grams protein, 25 grams carbohydrates, 28 grams fat', '4 ounces turkey', 'One whole wheat tortilla', '1 cup mixed greens', 'One slice cheddar cheese'),
(28, 54, 'Saturday', 'Dinner', 'Macronutrients: 440 calories, 42 grams protein, 31 grams carbohydrates, 16 grams fat', '5 ounces pork loin', '1 medium baked sweet potato', 'Small garden salad with 1 tablespoon vinaigrette', '5 asparagus spears'),
(29, 54, 'Saturday', 'First_Snack', 'Macronutrients: 153 calories, 5 grams protein, 20 grams carbohydrates, 8 grams fat', '', '', 'One fresh peach', '1/2 ounce (11) almonds'),
(30, 54, 'Saturday', 'Second_Snack', 'Macronutrients: 305 calories, 10 grams protein, 55 grams carbohydrates, 6 grams fat', '3 tablespoons hummus', '10 whole wheat pretzel twists', '', ''),
(31, 54, 'Sunday', 'Breakfast', 'Macronutrients: 439 calories, 17 grams protein, 50 grams carbohydrates, 21 grams fat', '1 cup cooked oatmeal', '1/2 cup non-fat milk', '1/2 cup blueberries', '2 tablespoons almond butter'),
(32, 54, 'Sunday', 'Lunch', 'Macronutrients: 708 calories, 45 grams protein, 42 grams carbohydrates, 40 grams fat', '6-ounce baked chicken breast', 'One baked sweet potato', 'Large garden salad with tomatoes and onions and 2 tablespoons balsamic vinaigrette', ''),
(33, 54, 'Sunday', 'Dinner', 'Macronutrients: 468 calories, 31 grams protein, 49 grams carbohydrates, 16 grams fat', '4-ounce serving of baked or grilled salmon', '1 cup brown rice', 'Five asparagus spears', ''),
(34, 54, 'Sunday', 'First_Snack', 'Macronutrients: 241 calories, 20 grams protein, 33 grams carbohydrates, 4 grams fat', 'One (7-ounce) container 2% Greek yogurt', '', 'One sliced apple', ''),
(35, 54, 'Sunday', 'Second_Snack', 'Macronutrients: 201 calories, 3 grams protein, 32 grams carbohydrates, 8 grams fat', '', '', '1 cup sliced strawberries', 'One medium chocolate chip cookie');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `P-ID` int(20) NOT NULL,
  `Patient_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `birth date` date NOT NULL,
  `D-ID` int(20) NOT NULL,
  `P-dietPlan` int(50) DEFAULT NULL,
  `P-exerciseRoutine` int(50) DEFAULT NULL,
  `P-nextAppointment` date DEFAULT NULL,
  `patientProgress` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`P-ID`, `Patient_name`, `password`, `birth date`, `D-ID`, `P-dietPlan`, `P-exerciseRoutine`, `P-nextAppointment`, `patientProgress`) VALUES
(16, 'batoul hayek', '$2y$10$lq7EoLZY.8cqJYUy8O4YN.8xaAjIsW4S1foqYuvDtY9Oteld1QOA2', '2014-01-24', 19, NULL, NULL, NULL, NULL),
(18, 'mohammad harb', '$2y$10$2XZzg5j/aHvVraYIPh8st.lyN9n0wPugRuxdy0R38GfO06dJw4o.i', '2024-01-07', 19, NULL, NULL, NULL, NULL),
(19, 'sokaina hay', '$2y$10$QMrZAXnjWmERAQPt3RGWjedtKhHCrvAVdYNUk25483Z4eAVZVuewi', '2024-01-08', 19, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `progress record`
--

CREATE TABLE `progress record` (
  `Prog-ID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `date` date NOT NULL,
  `%` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Rate-ID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `DietitianID` int(11) NOT NULL,
  `rate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Rate-ID`, `PatientID`, `DietitianID`, `rate`) VALUES
(1, 16, 19, '5'),
(2, 16, 19, '5'),
(3, 16, 19, '5');

-- --------------------------------------------------------

--
-- Table structure for table `vists`
--

CREATE TABLE `vists` (
  `visitID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `DietitianID` int(11) NOT NULL,
  `visit date` date NOT NULL,
  `weight` varchar(11) NOT NULL,
  `height` varchar(11) NOT NULL,
  `BMI` varchar(11) NOT NULL,
  `fat mass` varchar(11) NOT NULL,
  `muscles mass` varchar(11) NOT NULL,
  `PatientProgress` varchar(50) NOT NULL,
  `diet plan` varchar(50) NOT NULL,
  `exercise routine` varchar(50) NOT NULL,
  `Next appointment` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vists`
--

INSERT INTO `vists` (`visitID`, `PatientID`, `DietitianID`, `visit date`, `weight`, `height`, `BMI`, `fat mass`, `muscles mass`, `PatientProgress`, `diet plan`, `exercise routine`, `Next appointment`) VALUES
(28, 16, 19, '2024-01-06', '56', '160', '22', '30', '20', '80%', '54', '1', '2024-01-20'),
(29, 16, 19, '2024-01-06', '56', '160', '22', '30', '20', '80%', '54', '1', '2024-01-20'),
(30, 16, 19, '2024-01-20', '54', '160', '21.5', '38', '30', '80%', '54', '2', '2024-02-03'),
(31, 18, 19, '2024-01-07', '70', '172', '21.5', '38', '30', '80%', '54', '2', '2024-01-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user name`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`AppID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `dietitianID` (`dietitianID`);

--
-- Indexes for table `dietitian`
--
ALTER TABLE `dietitian`
  ADD PRIMARY KEY (`D-ID`),
  ADD UNIQUE KEY `Dietitian name` (`Dietitian name`);

--
-- Indexes for table `diet plan`
--
ALTER TABLE `diet plan`
  ADD PRIMARY KEY (`planID`),
  ADD UNIQUE KEY `Diet name` (`Diet name`);

--
-- Indexes for table `exercise routines`
--
ALTER TABLE `exercise routines`
  ADD PRIMARY KEY (`ER-ID`);

--
-- Indexes for table `library_items`
--
ALTER TABLE `library_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meals`
--
ALTER TABLE `meals`
  ADD PRIMARY KEY (`mealID`),
  ADD KEY `planID` (`planID`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`P-ID`),
  ADD UNIQUE KEY `Patient_name` (`Patient_name`),
  ADD UNIQUE KEY `Patient_name_2` (`Patient_name`),
  ADD KEY `D-ID` (`D-ID`),
  ADD KEY `P-dietPlan` (`P-dietPlan`),
  ADD KEY `P-exerciseRoutine` (`P-exerciseRoutine`);

--
-- Indexes for table `progress record`
--
ALTER TABLE `progress record`
  ADD PRIMARY KEY (`Prog-ID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Rate-ID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DietitianID` (`DietitianID`);

--
-- Indexes for table `vists`
--
ALTER TABLE `vists`
  ADD PRIMARY KEY (`visitID`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `DietitianID` (`DietitianID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `AppID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dietitian`
--
ALTER TABLE `dietitian`
  MODIFY `D-ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `diet plan`
--
ALTER TABLE `diet plan`
  MODIFY `planID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `exercise routines`
--
ALTER TABLE `exercise routines`
  MODIFY `ER-ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `library_items`
--
ALTER TABLE `library_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `meals`
--
ALTER TABLE `meals`
  MODIFY `mealID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `P-ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `progress record`
--
ALTER TABLE `progress record`
  MODIFY `Prog-ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Rate-ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vists`
--
ALTER TABLE `vists`
  MODIFY `visitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`P-ID`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`dietitianID`) REFERENCES `dietitian` (`D-ID`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`P-ID`),
  ADD CONSTRAINT `appointments_ibfk_4` FOREIGN KEY (`dietitianID`) REFERENCES `dietitian` (`D-ID`);

--
-- Constraints for table `meals`
--
ALTER TABLE `meals`
  ADD CONSTRAINT `meals_ibfk_1` FOREIGN KEY (`planID`) REFERENCES `diet plan` (`planID`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`D-ID`) REFERENCES `dietitian` (`D-ID`),
  ADD CONSTRAINT `patients_ibfk_2` FOREIGN KEY (`P-dietPlan`) REFERENCES `diet plan` (`planID`),
  ADD CONSTRAINT `patients_ibfk_3` FOREIGN KEY (`P-exerciseRoutine`) REFERENCES `exercise routines` (`ER-ID`);

--
-- Constraints for table `progress record`
--
ALTER TABLE `progress record`
  ADD CONSTRAINT `progress record_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`P-ID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`P-ID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`DietitianID`) REFERENCES `dietitian` (`D-ID`);

--
-- Constraints for table `vists`
--
ALTER TABLE `vists`
  ADD CONSTRAINT `vists_ibfk_1` FOREIGN KEY (`PatientID`) REFERENCES `patients` (`P-ID`),
  ADD CONSTRAINT `vists_ibfk_2` FOREIGN KEY (`DietitianID`) REFERENCES `dietitian` (`D-ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
