--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` text,
  `password` varchar(100) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `modify_date` date DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `create_date`, `modify_date`, `status`) VALUES
(14, 'kan meyreyya', 'kan.meyreyya@gmail.com', '123', '1', '2016-09-19', NULL, 1),
(15, 'phat phalla', 'yu.mengkhorng@gmail.com', '123', '1', '2016-09-19', NULL, 1),
(16, 'testing', 'example@gmail.com', '123', '1', '2016-09-19', NULL, 1),
(17, 'yu mengkhorng', 'yu.mengkhorng@gmail.com', '123', 'administrator', '2016-09-19', NULL, 1),
(18, 'khiev Rotana', 'example@gmail.com', '123', 'author', '2016-09-19', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
