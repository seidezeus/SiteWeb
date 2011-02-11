SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `boutique`
-- ----------------------------
DROP TABLE IF EXISTS `boutique`;
CREATE TABLE `boutique` (
  `id` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `nom` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of boutique
-- ----------------------------
INSERT INTO `boutique` VALUES ('28771', '2', 'Justice de la Lumière', '1');
INSERT INTO `boutique` VALUES ('28657', '2', 'Ecrase-patate', '1');
INSERT INTO `boutique` VALUES ('32857', '10', 'Rênes de drake de l\'Aile-du-Néant onyx', '9');
INSERT INTO `boutique` VALUES ('28729', '2', 'Lame du dédain', '1');
INSERT INTO `boutique` VALUES ('41508', '10', 'Mécabécane', '9');
INSERT INTO `boutique` VALUES ('37011', '10', 'Balai magique', '9');
INSERT INTO `boutique` VALUES ('50731', '2', 'Archus, grand bâton d\'Antonidas', '1');
INSERT INTO `boutique` VALUES ('48691', '10', 'Robe de Brume-funeste rapiécée', '8');
INSERT INTO `boutique` VALUES ('38082', '10', 'Sac gigantesque ', '10');

-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `act` text NOT NULL,
  `titre` text NOT NULL,
  `contenu` text NOT NULL,
  `auteur` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `timestamp` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `act_code` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `id` text,
  `category` int(11) NOT NULL DEFAULT '1',
  `try` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'Installation réussie !', 'le site à été installé avec succés !', 0x6B65747261, 0x31323835353433333033, 0x50504E56453255413851465551374E3658334F41354D494F565058314230524A523236334A534446545745433157475943425947395A504C4B4B4D4434345349304E37485654484C39355A, '1', '0', '0', '2010-09-26 18:12:30');
INSERT INTO `news` VALUES ('1', 'bienvenue sur World Of Warcraft !', 'Bienvenue sur le nouveau site de World Of Warcraft ! je vous souhaite une bonne visite a tous !', '', '', '', '2', '0', '0', '2010-09-30 10:05:03');

-- ----------------------------
-- Table structure for `password_template`
-- ----------------------------
DROP TABLE IF EXISTS `password_template`;
CREATE TABLE `password_template` (
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of password_template
-- ----------------------------
INSERT INTO `password_template` VALUES ('850ead918f5c311dbd6aa5bc270fc4238e2ae2fa');
