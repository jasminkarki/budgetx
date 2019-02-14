CREATE Database budgetx
CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `expenses` (`id`, `amount`, `day`) VALUES
	(1, 1000, 1),
	(2, 2000, 2),
	(3, 5000, 3),
	(4, 3000, 4),
	(5, 2000, 5),
	(6, 1000, 6),
	(7, 8000, 7),
	(8, 10000, 8),
	(9, 1000, 9),
	(10, 7000, 10),
	(11, 8000, 11),
	(12, 8000, 12),
	(13, 8000, 13);
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;