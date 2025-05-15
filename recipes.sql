-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2025 at 12:34 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, '🥗 Салати'),
(2, '🥘 Гарячі страви'),
(3, '🍰 Десерти'),
(4, '🥤 Напої'),
(5, '🥪 Перекуси'),
(6, '🥒 Веганське'),
(9, '🥩 М\'ясо');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `recipe_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `recipe_id`) VALUES
(8, 0, 3),
(9, 0, 2),
(10, 0, 6),
(11, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `image`, `title`, `description`) VALUES
(3, '3.jpg', '🌿 Найкращі спеції для кожної кухні', 'Опис: Спеції здатні повністю змінити смак страви. Розкажемо, які з них варто мати вдома кожному.\n\nЗміст:\nІталійська кухня: базилік, орегано, розмарин\nІндійська кухня: куркума, карі, кумін, гарам масала\nАзійська кухня: імбир, коріандр, чилі, соєвий соус\nУкраїнська кухня: лавровий лист, перець горошком, часник, кріп\n\nСпеції краще зберігати в герметичних баночках, подалі від світла. Аромат і смак зберігаються довше, якщо купувати спеції цілими (зернами чи листками) й подрібнювати перед використанням.\n\n'),
(4, '4.jpeg', '🥣 Як приготувати ідеальний бульйон', 'Опис: Бульйон — основа багатьох супів. Ділимось секретами насиченого смаку.\n\nЗміст:\nВикористовуйте м\'ясо на кістці або цілу тушку.\nНе забудьте про овочі: морква, цибуля, селера — обов’язково.\nВаріть на дуже повільному вогні, не допускаючи кипіння.\nРегулярно знімайте піну.\nНаприкінці додайте лавровий лист і перець горошком.\n\nБульйон можна заморозити в контейнерах або формочках для льоду й використовувати як основу для соусів або супів.'),
(5, '5.png', '🥖 Чим замінити хліб: корисні альтернативи', 'Опис: Якщо хочеш зменшити споживання хліба — ось варіанти, які його гідно замінять.\n\nЗміст:\nЛаваш або цільнозернові тортильї\nРисові або кукурудзяні хлібці\nСалатне листя замість булки в бургері\nДомашні галети з насіння\nОмлет-обгортки\n\nТакі заміни не тільки знижують калорійність страв, але й додають нових смакових ноток.'),
(6, '6.png', '🧈 Масло, олія, топлений жир — що і для чого', 'Опис: Який жир краще використовувати для смаження, а який — у салати?\n\nЗміст:\nОливкова олія — ідеальна для салатів та легкого обсмажування\nСоняшникова — універсальна, але краще використовувати рафіновану\nКокосова — витримує високу температуру, приємний аромат\nВершкове масло — підходить для соусів, каш, тостів\nТоплений жир (гхі) — не пригорає, корисний для смаження\nКожен жир має свій «димовий поріг», тому обирай уважно залежно від типу приготування.');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int NOT NULL,
  `cook_id` int NOT NULL,
  `image` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `complexity` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `cook_id`, `image`, `title`, `description`, `complexity`) VALUES
(1, 0, '1.jpg', '🥗 Салат із кіноа та авокадо', 'Опис: Легкий і корисний салат з кіноа, свіжим авокадо, помідорами чері та лимонною заправкою. Ідеальний для здорового обіду.\r\n\r\nІнгредієнти:\r\nКіноа – 100 г\r\nАвокадо – 1 шт\r\nПомідори чері – 10 шт\r\nОгірок – 1 шт\r\nОливкова олія – 2 ст.л.\r\nСік лимона – 1 ст.л.\r\nСіль, перець – за смаком\r\n\r\nПриготування:\r\nКіноа зварити згідно інструкції на упаковці, остудити.\r\nАвокадо нарізати кубиками, чері – навпіл, огірок – кружечками.\r\nУсе змішати, заправити оливковою олією та соком лимона.\r\nПосолити, поперчити й подати одразу.', 1),
(2, 0, '2.png', '🍝 Паста з куркою та грибами', 'Опис: Кремова паста зі шматочками курки, печерицями та сиром пармезан. Швидкий рецепт для ситної вечері.\n\nІнгредієнти:\nПаста – 200 г\nКуряче філе – 300 г\nПечериці – 200 г\nВершки 20% – 200 мл\nЦибуля – 1 шт\nЧасник – 1 зубчик\nСіль, перець, олія – за смаком\n\nПриготування:\nВідварити пасту до стану аль денте.\nКурку нарізати, обсмажити на олії. Додати цибулю, часник і гриби.\nВлити вершки, тушкувати 5–7 хвилин. Посолити і поперчити.\nДодати пасту, перемішати й подавати гарячою.', 2),
(3, 0, '3.png', '🍲 Крем-суп із гарбуза', 'Опис: Ніжний суп з печеного гарбуза з нотками імбиру та вершків. Смачний варіант для осіннього меню.\n\nІнгредієнти:\nГарбуз – 500 г\nМорква – 1 шт\nКартопля – 1 шт\nВершки – 150 мл\nВода або овочевий бульйон – 400 мл\nСіль, перець, мускатний горіх – за смаком\n\nПриготування:\nНарізати овочі кубиками, залити водою або бульйоном.\nВарити до м’якості. Збити блендером до однорідності.\nВлити вершки, додати спеції.\nПрогріти 2–3 хвилини та подати з грінками.', 3),
(4, 0, '4.jpg', '🍕 Домашня піца з моцарелою', 'Опис: Хрустка основа, соус із томатів, моцарела та базилік. Класичний смак, як в італійській траторії.\r\n\r\nІнгредієнти:\r\nОснова для піци – 1 шт\r\nТоматний соус – 3 ст.л.\r\nМоцарела – 150 г\r\nПомідори – 1 шт\r\nБазилік – кілька листків\r\nОливкова олія – 1 ст.л.\r\n\r\nПриготування:\r\nЗмастити основу соусом, викласти нарізану моцарелу та помідори.\r\nПосипати базиліком, збризнути олією.\r\nВипікати 10–12 хв при 200°C.\r\nПодати гарячою.', 2),
(5, 0, '5.jpg', '🍰 Чізкейк з полуницею', 'Опис: Повітряний чізкейк на основі печива з вершковим сиром та соковитими полуницями. Ідеальний десерт до чаю.\r\n\r\nІнгредієнти:\r\nПечиво (типу Марія) – 200 г\r\nВершкове масло – 80 г\r\nВершковий сир – 400 г\r\nЦукор – 100 г\r\nВершки – 150 мл\r\nЖелатин – 10 г\r\nПолуниця – 200 г\r\n\r\nПриготування:\r\nПечиво подрібнити, змішати з розтопленим маслом, викласти у форму.\r\nЗмішати сир, цукор, вершки, додати розчинений желатин.\r\nВилити масу на основу, поставити в холодильник на 3–4 години.\r\nПрикрасити полуницею.', 3),
(6, 0, '6.jpg', '🥪 Сендвіч із лососем', 'Опис: Тост із вершковим сиром, слабосоленим лососем, листям салату та каперсами. Легка закуска або сніданок.\n\nІнгредієнти:\nХліб тостовий – 2 скибки\nВершковий сир – 2 ст.л.\nЛосось слабосолений – 50 г\nЛистя салату – 2–3 шт\nОгірок – кілька скибок\n\nПриготування:\nНамазати хліб вершковим сиром.\nВикласти лосось, салат і огірок.\nНакрити другою скибкою, при бажанні підсмажити на грилі.\nПодати одразу.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_categories`
--

CREATE TABLE `recipe_categories` (
  `id` int NOT NULL,
  `recipe_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_categories`
--

INSERT INTO `recipe_categories` (`id`, `recipe_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 2, 2),
(4, 3, 2),
(5, 4, 5),
(6, 5, 3),
(7, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `user_id`, `text`) VALUES
(3, 5, 'Я повар в шкільній їдальні, дайте мені роль'),
(6, 6, 'Навчаюсь на кухаря, тому хочу отримати роль, аби викладати сюди свої улюблені рецепти');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `name` varchar(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(0, 'Читач'),
(1, 'Кухар'),
(2, 'Адмін');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`, `surname`, `email`, `role_id`) VALUES
(0, 'admin', '1111', 'Микола', 'Ковбасюк', 'kovbkola@gmail.com', 2),
(3, 'cook', '1111', 'Кук', 'Кукович', 'cook@gmail.com', 1),
(5, 'user', '1111', 'Юзер', 'Юзерович', 'user@gmail.com', 0),
(6, 'newuser', '1111', 'New', 'Cook', 'newcook@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_ibfk_1` (`recipe_id`),
  ADD KEY `favorites_ibfk_2` (`user_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_ibfk_1` (`cook_id`);

--
-- Indexes for table `recipe_categories`
--
ALTER TABLE `recipe_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_categories_ibfk_1` (`recipe_id`),
  ADD KEY `recipe_categories_ibfk_2` (`category_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `recipe_categories`
--
ALTER TABLE `recipe_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`cook_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `recipe_categories`
--
ALTER TABLE `recipe_categories`
  ADD CONSTRAINT `recipe_categories_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `recipe_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
