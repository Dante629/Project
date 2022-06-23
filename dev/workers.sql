
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `job`
--

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET latin1 NOT NULL,
  `email` text CHARACTER SET latin1 NOT NULL,
  `age` varchar(11) CHARACTER SET latin1 NOT NULL,
  `experience` varchar(512) CHARACTER SET latin1 NOT NULL,
  `average` varchar(11) CHARACTER SET latin1 NOT NULL,
  `image` varchar(512) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `name`, `email`, `age`, `experience`, `average`, `image`) VALUES
(1, 'John Christopher Depp', 'Johnny@gmail.com', '59', '38 years old', '50000', '8bf767ee0a669dc44881d17365be6e0e4dc29b4c-5.jpg'),
(2, 'Amber Laura Heard', 'Amber@gmail.com', '36', '18 years old', '40000', '91e0cbef20a4568edf80f33eb5c35db66024f19e-ember-herd4.jpg'),
(3, 'Orlando Jonathan Blanchard Bloom', 'Bloom@mail.com', '45', '25  years old', '450000', 'eb5c0e51fa0013b96d868d913ed7443c424f1e84-orlando-bloom-b379817bd3bd35501c55795bd365b8a2.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
