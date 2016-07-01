医院表：hos_hospital
CREATE TABLE IF NOT EXISTS `hos_hospital` (
    `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `src` varchar(255) NOT NULL,
    `adress` varchar(255) NOT NULL,
    `weburl` varchar(255) NOT NULL,
		`LEVEL` INT NOT NULL,
		`zhongorxi` INT NOT NULL,
    `create_time` int(11) unsigned NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;