-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: fieldhockey_gum
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `coaches`
--

DROP TABLE IF EXISTS `coaches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaches` (
  `Coaches_id` int(11) NOT NULL AUTO_INCREMENT,
  `Team_name` varchar(45) NOT NULL,
  `Gender` tinytext NOT NULL,
  `Position` mediumtext NOT NULL,
  `Experience` date NOT NULL,
  `Starting_Date` date NOT NULL,
  `Ending_Date` date NOT NULL,
  PRIMARY KEY (`Coaches_id`),
  KEY `fk_team_name_idx` (`Team_name`),
  CONSTRAINT `fk_team_name` FOREIGN KEY (`Team_name`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaches`
--

LOCK TABLES `coaches` WRITE;
/*!40000 ALTER TABLE `coaches` DISABLE KEYS */;
/*!40000 ALTER TABLE `coaches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_fouls`
--

DROP TABLE IF EXISTS `event_fouls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_fouls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Foul_Commiter` varchar(6) NOT NULL,
  `Card_issued` tinytext NOT NULL,
  `Foul_type` enum('Travelling','Obstruction','Backstick','Highball','Above Shoulder','Advancing','Interfence','Rough Play','Blocking') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_event_foul_type_idx` (`Foul_type`),
  KEY `fk_event_fouls_foul_commiter_idx` (`Foul_Commiter`),
  CONSTRAINT `fk_event_fouls_foul_commiter` FOREIGN KEY (`Foul_Commiter`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_fouls`
--

LOCK TABLES `event_fouls` WRITE;
/*!40000 ALTER TABLE `event_fouls` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_fouls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_hits`
--

DROP TABLE IF EXISTS `event_hits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_hits` (
  `id` int(11) NOT NULL,
  `Player_id` varchar(6) NOT NULL,
  `Type_of_Hit` enum('16 yard hit','Free hit') NOT NULL,
  `Intercepted` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hit_event_player_id_idx` (`Player_id`),
  CONSTRAINT `fk_hit_event_player_id` FOREIGN KEY (`Player_id`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_hits`
--

LOCK TABLES `event_hits` WRITE;
/*!40000 ALTER TABLE `event_hits` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_hits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_shots`
--

DROP TABLE IF EXISTS `event_shots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_shots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Shot_taker` varchar(6) NOT NULL,
  `Shot_Type` enum('Penality','Field Goal') NOT NULL,
  `Assisted` varchar(6) NOT NULL,
  `Shot_saved` bit(1) NOT NULL,
  `Intercepted` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shots_shot_taker_idx` (`Shot_taker`),
  KEY `fk_shots_assisted_idx` (`Assisted`),
  CONSTRAINT `fk_shots_assisted` FOREIGN KEY (`Assisted`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_shots_shot_taker` FOREIGN KEY (`Shot_taker`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_shots`
--

LOCK TABLES `event_shots` WRITE;
/*!40000 ALTER TABLE `event_shots` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_shots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_substitution`
--

DROP TABLE IF EXISTS `event_substitution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_substitution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Player_off` varchar(6) NOT NULL,
  `Player_on` varchar(6) NOT NULL,
  `Position` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Subs_player_off_idx` (`Player_off`),
  KEY `fk_Subs_player_on_idx` (`Player_on`),
  CONSTRAINT `fk_Subs_player_off` FOREIGN KEY (`Player_off`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Subs_player_on` FOREIGN KEY (`Player_on`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_substitution`
--

LOCK TABLES `event_substitution` WRITE;
/*!40000 ALTER TABLE `event_substitution` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_substitution` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Game_id` int(11) unsigned zerofill NOT NULL,
  `Time_of_Event` datetime NOT NULL,
  `Event_type` enum('Hits','Fouls','Shots','Substitution','Corner') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Events_game_id_idx` (`Game_id`),
  CONSTRAINT `fk_Events_game_id` FOREIGN KEY (`Game_id`) REFERENCES `games` (`Games_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events_corner`
--

DROP TABLE IF EXISTS `events_corner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events_corner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Player_id` varchar(6) NOT NULL,
  `Type_of_Corner` enum('Long Corner','Short Corner') NOT NULL,
  `Goal_scored` bit(1) NOT NULL,
  `Intercepted` bit(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_corner_player_id_idx` (`Player_id`),
  CONSTRAINT `fk_corner_player_id` FOREIGN KEY (`Player_id`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events_corner`
--

LOCK TABLES `events_corner` WRITE;
/*!40000 ALTER TABLE `events_corner` DISABLE KEYS */;
/*!40000 ALTER TABLE `events_corner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_stats`
--

DROP TABLE IF EXISTS `game_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_stats` (
  `Game_id` int(11) unsigned zerofill NOT NULL,
  `Own_goals` int(10) unsigned zerofill NOT NULL,
  `Total_games` int(10) unsigned zerofill NOT NULL,
  `Yellow_cards` int(10) unsigned zerofill NOT NULL,
  `Free_hits` int(10) unsigned zerofill NOT NULL,
  `Short_corners` tinyint(127) unsigned zerofill NOT NULL,
  `Long_corners` tinyint(127) unsigned zerofill NOT NULL,
  `Total_fouls` int(10) unsigned zerofill NOT NULL,
  `Red_cards` int(10) unsigned zerofill NOT NULL,
  `Green_cards` int(10) unsigned zerofill NOT NULL,
  `Extra_time` binary(1) NOT NULL,
  `Penalties` binary(1) NOT NULL,
  `Game_winner` varchar(255) NOT NULL,
  `Game_loser` varchar(255) NOT NULL,
  `game_statscol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Game_id`),
  KEY `fk_game_winner_idx` (`Game_winner`),
  KEY `fk_game_loser_idx` (`Game_loser`),
  CONSTRAINT `fk_Stats_game_id` FOREIGN KEY (`Game_id`) REFERENCES `games` (`Games_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_loser` FOREIGN KEY (`Game_loser`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_game_winner` FOREIGN KEY (`Game_winner`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_stats`
--

LOCK TABLES `game_stats` WRITE;
/*!40000 ALTER TABLE `game_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `Games_id` int(11) unsigned zerofill NOT NULL,
  `Umpire_licence` int(10) unsigned zerofill NOT NULL,
  `tournement_id` int(5) NOT NULL,
  `Team_1` varchar(45) NOT NULL,
  `Team_2` varchar(45) NOT NULL,
  `Date_of_Match` date NOT NULL,
  `Alt_match_day` date NOT NULL,
  `Location_id` varchar(45) NOT NULL,
  `Time_duration` int(11) NOT NULL,
  `Game_round` varchar(45) NOT NULL,
  PRIMARY KEY (`Games_id`),
  KEY `fk_umpire_licence_idx` (`Umpire_licence`),
  KEY `fk_tournement_id_idx` (`tournement_id`),
  KEY `fk_team1_idx` (`Team_1`),
  KEY `fk_team2_idx` (`Team_2`),
  CONSTRAINT `fk_team1` FOREIGN KEY (`Team_1`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_team2` FOREIGN KEY (`Team_2`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tournement_id` FOREIGN KEY (`tournement_id`) REFERENCES `tournement` (`Tournement_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_umpire_licence` FOREIGN KEY (`Umpire_licence`) REFERENCES `umpire` (`Umpire_licence`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_stats`
--

DROP TABLE IF EXISTS `player_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_stats` (
  `Player_id` varchar(6) NOT NULL,
  `Total_assists` int(10) unsigned zerofill NOT NULL,
  `Total_goals` int(10) unsigned zerofill NOT NULL,
  `Red_cards` int(10) unsigned zerofill NOT NULL,
  `Yellow_cards` int(10) unsigned zerofill NOT NULL,
  `Green_cards` int(10) unsigned zerofill NOT NULL,
  `Games_played` int(10) unsigned zerofill NOT NULL,
  `Player_rating` int(5) unsigned zerofill NOT NULL,
  PRIMARY KEY (`Player_id`),
  CONSTRAINT `fk_Stats_player_id` FOREIGN KEY (`Player_id`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_stats`
--

LOCK TABLES `player_stats` WRITE;
/*!40000 ALTER TABLE `player_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `players` (
  `Player_id` varchar(6) NOT NULL,
  `Team_name` varchar(255) NOT NULL,
  `First_Name` tinytext NOT NULL,
  `Last_Name` tinytext NOT NULL,
  `Position` varchar(15) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  PRIMARY KEY (`Player_id`),
  KEY `fk_team_name_idx` (`Team_name`),
  KEY `fk_teamname_idx` (`Team_name`),
  CONSTRAINT `fk_teamname` FOREIGN KEY (`Team_name`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_stats`
--

DROP TABLE IF EXISTS `team_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_stats` (
  `Team_Name` varchar(255) NOT NULL,
  `Cards_issued` tinyint(255) unsigned NOT NULL,
  `Games_played` int(10) unsigned zerofill NOT NULL,
  `Total_games` int(10) unsigned zerofill NOT NULL,
  `Shots_on_goal` int(10) unsigned zerofill NOT NULL,
  `Shots_on_target` int(10) unsigned zerofill NOT NULL,
  `Goal_accuracy` decimal(65,1) unsigned zerofill NOT NULL,
  `Team_rating` int(5) unsigned zerofill NOT NULL,
  `Team_wins` int(10) unsigned zerofill NOT NULL,
  `Team_loses` int(10) unsigned zerofill NOT NULL,
  `Team_draws` int(10) unsigned zerofill NOT NULL,
  `Goals_conceded` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`Team_Name`),
  CONSTRAINT `fk_Stat_teamName` FOREIGN KEY (`Team_Name`) REFERENCES `teams` (`Team_name`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_stats`
--

LOCK TABLES `team_stats` WRITE;
/*!40000 ALTER TABLE `team_stats` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `Team_name` varchar(255) NOT NULL,
  `Coach_id` int(11) NOT NULL,
  `Team_Captain` varchar(45) NOT NULL,
  `Team_Origin` varchar(45) NOT NULL,
  PRIMARY KEY (`Team_name`),
  KEY `fk_coaches_id_idx` (`Coach_id`),
  KEY `fk_captain_idx` (`Team_Captain`),
  CONSTRAINT `fk_captain` FOREIGN KEY (`Team_Captain`) REFERENCES `players` (`Player_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_coaches_id` FOREIGN KEY (`Coach_id`) REFERENCES `coaches` (`Coaches_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tournement`
--

DROP TABLE IF EXISTS `tournement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tournement` (
  `Tournement_ID` int(5) NOT NULL,
  `Tournement_Name` mediumtext DEFAULT NULL,
  `Tournement_Season` varchar(45) NOT NULL,
  `Tournement_Location_Country` varchar(255) NOT NULL,
  `Tournement_Location_City` varchar(255) DEFAULT NULL,
  `Tournement_Winner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Tournement_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tournement`
--

LOCK TABLES `tournement` WRITE;
/*!40000 ALTER TABLE `tournement` DISABLE KEYS */;
/*!40000 ALTER TABLE `tournement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `umpire`
--

DROP TABLE IF EXISTS `umpire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `umpire` (
  `Umpire_licence` int(10) unsigned zerofill NOT NULL,
  `Name` mediumtext NOT NULL,
  `Games` varchar(45) NOT NULL,
  `Age` tinyint(60) NOT NULL,
  `Experience` int(11) unsigned NOT NULL,
  PRIMARY KEY (`Umpire_licence`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `umpire`
--

LOCK TABLES `umpire` WRITE;
/*!40000 ALTER TABLE `umpire` DISABLE KEYS */;
/*!40000 ALTER TABLE `umpire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(45) NOT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `is_admin` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Password_UNIQUE` (`Password`),
  UNIQUE KEY `Email_UNIQUE` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'fieldhockey_gum'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-30 15:43:01
