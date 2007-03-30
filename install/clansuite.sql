-- MySQL dump 10.10
--
-- Host: localhost    Database: clansuite
-- ------------------------------------------------------
-- Server version	5.0.24a-community

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
-- Table structure for table `cs_adminmenu`
--

DROP TABLE IF EXISTS `cs_adminmenu`;
CREATE TABLE `cs_adminmenu` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `parent` tinyint(3) unsigned NOT NULL default '0',
  `type` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `order` tinyint(4) NOT NULL,
  `icon` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `right_to_view` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`,`parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_adminmenu`
--


/*!40000 ALTER TABLE `cs_adminmenu` DISABLE KEYS */;
INSERT INTO `cs_adminmenu` VALUES (1,0,'folder','Modules','','Modules','_self',0,'package.png','access_controlcenter'),(2,1,'folder','News','','News','_self',0,'page_edit.png',''),(3,2,'item','Manage News','index.php?mod=news&amp;sub=admin','Manage News','_self',0,'application_form_edit.png',''),(4,1,'folder','Articles','','Articles','_self',1,'report.png',''),(5,4,'item','Manage Articles','index.php?mod=articles&amp;sub=admin','Manage Articles','_self',0,'application_form_edit.png',''),(6,1,'folder','Static Pages','','Static Pages','_self',2,'html.png',''),(7,6,'item','Create new Static Page','index.php?mod=staticpages&amp;sub=admin&amp;action=create','Create new Static Page','_self',0,'add.png',''),(8,6,'item','Show Static Pages','index.php?mod=staticpages&amp;sub=admin','Show Static Pages','_self',1,'pencil.png',''),(9,1,'folder','Matches','index.php?mod=matches&amp;action=show','Matches','_self',3,'database_go.png',''),(10,9,'item','Manage Matches','index.php?mod=matches&amp;sub=admin','Manage Matches','_self',0,'application_form_edit.png',''),(11,1,'folder','Replays','','Replays','_self',4,'film.png',''),(12,11,'item','Manage Replays','index.php?mod=replays&amp;sub=admin','Manage Replays','_self',0,'application_form_edit.png',''),(13,1,'folder','Serverlist','','Serverlist','_self',5,'table.png',''),(14,13,'item','Show Servers','index.php?mod=serverlist&amp;sub=admin&amp;action=show','Show Servers','_self',0,'application_view_list.png',''),(15,13,'item','Add Server','index.php?mod=serverlist&amp;sub=admin&amp;action=create','Add Server','_self',1,'application_form_edit.png',''),(16,1,'folder','Forum','','Forum','_self',6,'application_view_list.png',''),(17,16,'item','Manage Forum','index.php?mod=forum&amp;sub=admin','Manage Forum','_self',0,'application_form_edit.png',''),(18,1,'folder','Guestbook','index.php?mod=guestbook&amp;action=show','Guestbook','_self',7,'book_open.png',''),(19,18,'item','Manage Guestbook','index.php?mod=guestbook&amp;sub=admin','Manage Guestbook','_self',0,'application_form_edit.png',''),(20,1,'folder','Downloads','','Downloads','_self',8,'disk.png',''),(21,20,'item','Manage Downloads','index.php?mod=downloads&amp;sub=admin','Manage Downloads','_self',0,'application_form_edit.png',''),(22,1,'folder','Gallery','','Gallery','_self',9,'map_go.png',''),(23,22,'item','Manage Gallery','index.php?mod=gallery&amp;sub=admin','Manage Gallery','_self',0,'application_form_edit.png',''),(24,1,'folder','Shoutbox','','Shoutbox','_self',10,'comment.png',''),(25,24,'item','Manage Shoutbox','index.php?mod=shoutbox&amp;sub=admin','Manage Shoutbox','_self',0,'application_form_edit.png',''),(26,1,'folder','Messaging','','Messaging','_self',11,'email_open_image.png',''),(27,26,'item','Manage Messages','index.php?mod=messaging&amp;sub=admin','Manage Messages','_self',0,'application_form_edit.png',''),(28,0,'folder','Administration','','Administration','_self',1,'textfield_key.png',''),(29,28,'folder','Users','','Users','_self',0,'user_suit.png',''),(30,29,'item','Show all Users','index.php?mod=admin&amp;sub=users','Show all Users','_self',0,'table.png',''),(31,29,'item','Create a user','index.php?mod=admin&amp;sub=users&amp;action=create','Create a user','_self',1,'add.png',''),(32,29,'item','Search a User','index.php?mod=admin&amp;sub=users&amp;action=search','Search a User','_self',2,'magnifier.png',''),(33,28,'folder','Groups','','Groups','_self',1,'group.png',''),(34,33,'item','Show all Groups','index.php?mod=admin&amp;sub=groups','Show all Groups','_self',0,'table.png',''),(35,33,'item','Create a group','index.php?mod=admin&amp;sub=groups&amp;action=create','Create a group','_self',1,'add.png',''),(36,28,'folder','Permissions','','Permissions','_self',2,'key.png',''),(37,36,'item','Show all Permissions','index.php?mod=admin&amp;sub=permissions','Show all Permissions','_self',0,'table.png',''),(38,28,'item','Categories','index.php?mod=admin&amp;sub=categories','Categories','_self',3,'spellcheck.png',''),(39,28,'folder','Layout & Styles','','Layout & Styles','_self',4,'layout_header.png',''),(40,39,'item','BB Code Editor','index.php?mod=admin&amp;sub=bbcode','BB Code Editor','_self',0,'text_bold.png',''),(41,39,'item','Adminmenu Editor','index.php?mod=admin&amp;sub=menueditor','Adminmenu Editor','_self',1,'application_form_edit.png',''),(42,39,'item','Template Editor','index.php?mod=admin&amp;sub=templates','Template Editor','_self',2,'layout_edit.png',''),(43,39,'item','Themes Manager','index.php?mod=admin&amp;sub=themes','Themes Manager','_self',3,'layout_edit.png',''),(44,0,'folder','System','','System','_self',2,'computer.png',''),(45,44,'item','Settings','index.php?mod=admin&amp;sub=settings','Settings','_self',0,'settings.png',''),(46,44,'folder','Database','','Database','_self',1,'database_gear.png',''),(47,46,'item','Optimize','index.php?mod=database&amp;action=optimize','Optimize','_self',0,'database_go.png',''),(48,46,'item','Backup','index.php?mod=database&amp;action=backup','Backup','_self',1,'database_key.png',''),(49,44,'folder','Modules','','Modules','_self',2,'bricks.png',''),(50,49,'item','Install new modules','index.php?mod=admin&amp;sub=modules&amp;action=install_new','Install new modules','_self',0,'package.png',''),(51,49,'item','Create a module/submodule','index.php?mod=admin&amp;sub=modules&amp;action=create_new','Create a new module/submodule','_self',1,'add.png',''),(52,49,'item','Show and edit modules','index.php?mod=admin&amp;sub=modules&amp;action=show_all','Show and edit modules','_self',2,'bricks_edit.png',''),(53,49,'item','Export a module','index.php?mod=admin&amp;sub=modules&amp;action=export','Export a module','_self',3,'compress.png',''),(54,44,'folder','Language','','Language','_self',3,'spellcheck.png',''),(55,54,'item','Language Editor','index.php?mod=language&amp;sub=editor','Language Editor','_self',0,'spellcheck.png',''),(56,0,'folder','Help','','Help','_self',3,'help.png',''),(57,56,'item','Help','index.php?mod=admin&amp;sub=staticpages&amp;action=show&amp;page=help','Help','_self',0,'help.png',''),(58,56,'item','Manual','index.php?mod=admin&amp;sub=manual','Manual','_self',1,'book_open.png',''),(59,56,'item','Report Bugs & Give Feedback','index.php?mod=admin&amp;sub=bugs','Report Bugs & Give Feedback','_self',2,'error.png',''),(60,56,'item','Registration','index.php','Registration','_self',3,'favicon.ico',''),(61,56,'item','About Clansuite','index.php?mod=admin&amp;sub=staticpages&amp;action=show&amp;page=about','About Clansuite','_self',4,'information.png','');
/*!40000 ALTER TABLE `cs_adminmenu` ENABLE KEYS */;

--
-- Table structure for table `cs_adminmenu_backup`
--

DROP TABLE IF EXISTS `cs_adminmenu_backup`;
CREATE TABLE `cs_adminmenu_backup` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `parent` tinyint(3) unsigned NOT NULL default '0',
  `type` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `order` tinyint(4) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `right_to_view` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`,`parent`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_adminmenu_backup`
--


/*!40000 ALTER TABLE `cs_adminmenu_backup` DISABLE KEYS */;
INSERT INTO `cs_adminmenu_backup` VALUES (1,0,'folder','Modules','','Modules','_self',0,'package.png','access_controlcenter'),(2,1,'folder','News','','News','_self',0,'page_edit.png',''),(3,2,'item','Manage News','index.php?mod=news&amp;sub=admin','Manage News','_self',0,'application_form_edit.png',''),(4,1,'folder','Articles','','Articles','_self',1,'report.png',''),(5,4,'item','Manage Articles','index.php?mod=articles&amp;sub=admin','Manage Articles','_self',0,'application_form_edit.png',''),(6,1,'folder','Static Pages','','Static Pages','_self',2,'html.png',''),(7,6,'item','Create new Static Page','index.php?mod=staticpages&amp;sub=admin&amp;action=create','Create new Static Page','_self',0,'add.png',''),(8,6,'item','Show Static Pages','index.php?mod=staticpages&amp;sub=admin','Show Static Pages','_self',1,'pencil.png',''),(9,1,'folder','Matches','index.php?mod=matches&amp;action=show','Matches','_self',3,'database_go.png',''),(10,9,'item','Manage Matches','index.php?mod=matches&amp;sub=admin','Manage Matches','_self',0,'application_form_edit.png',''),(11,1,'folder','Replays','','Replays','_self',4,'film.png',''),(12,11,'item','Manage Replays','index.php?mod=replays&amp;sub=admin','Manage Replays','_self',0,'application_form_edit.png',''),(13,1,'folder','Serverlist','','Serverlist','_self',5,'table.png',''),(14,13,'item','Show Servers','index.php?mod=serverlist&amp;sub=admin&amp;action=show','Show Servers','_self',0,'application_view_list.png',''),(15,13,'item','Add Server','index.php?mod=serverlist&amp;sub=admin&amp;action=create','Add Server','_self',1,'application_form_edit.png',''),(16,1,'folder','Forum','','Forum','_self',6,'application_view_list.png',''),(17,16,'item','Manage Forum','index.php?mod=forum&amp;sub=admin','Manage Forum','_self',0,'application_form_edit.png',''),(18,1,'folder','Guestbook','index.php?mod=guestbook&amp;action=show','Guestbook','_self',7,'book_open.png',''),(19,18,'item','Manage Guestbook','index.php?mod=guestbook&amp;sub=admin','Manage Guestbook','_self',0,'application_form_edit.png',''),(20,1,'folder','Downloads','','Downloads','_self',8,'disk.png',''),(21,20,'item','Manage Downloads','index.php?mod=downloads&amp;sub=admin','Manage Downloads','_self',0,'application_form_edit.png',''),(22,1,'folder','Gallery','','Gallery','_self',9,'map_go.png',''),(23,22,'item','Manage Gallery','index.php?mod=gallery&amp;sub=admin','Manage Gallery','_self',0,'application_form_edit.png',''),(24,1,'folder','Shoutbox','','Shoutbox','_self',10,'comment.png',''),(25,24,'item','Manage Shoutbox','index.php?mod=shoutbox&amp;sub=admin','Manage Shoutbox','_self',0,'application_form_edit.png',''),(26,1,'folder','Messaging','','Messaging','_self',11,'email_open_image.png',''),(27,26,'item','Manage Messages','index.php?mod=messaging&amp;sub=admin','Manage Messages','_self',0,'application_form_edit.png',''),(28,0,'folder','Administration','','Administration','_self',1,'textfield_key.png',''),(29,28,'folder','Users','','Users','_self',0,'user_suit.png',''),(30,29,'item','Show all Users','index.php?mod=admin&amp;sub=users','Show all Users','_self',0,'table.png',''),(31,29,'item','Create a user','index.php?mod=admin&amp;sub=users&amp;action=create','Create a user','_self',1,'add.png',''),(32,29,'item','Search a User','index.php?mod=admin&amp;sub=users&amp;action=search','Search a User','_self',2,'magnifier.png',''),(33,28,'folder','Groups','','Groups','_self',1,'group.png',''),(34,33,'item','Show all Groups','index.php?mod=admin&amp;sub=groups','Show all Groups','_self',0,'table.png',''),(35,33,'item','Create a group','index.php?mod=admin&amp;sub=groups&amp;action=create','Create a group','_self',1,'add.png',''),(36,28,'folder','Permissions','','Permissions','_self',2,'key.png',''),(37,36,'item','Show all Permissions','index.php?mod=admin&amp;sub=permissions','Show all Permissions','_self',0,'table.png',''),(38,28,'item','Categories','index.php?mod=admin&amp;sub=categories','Categories','_self',3,'spellcheck.png',''),(39,28,'folder','Layout & Styles','','Layout & Styles','_self',4,'layout_header.png',''),(40,39,'item','BB Code Editor','index.php?mod=admin&amp;sub=bbcode','BB Code Editor','_self',0,'text_bold.png',''),(41,39,'item','Adminmenu Editor','index.php?mod=admin&amp;sub=menueditor','Adminmenu Editor','_self',1,'application_form_edit.png',''),(42,39,'item','Template Editor','index.php?mod=admin&amp;sub=templates','Template Editor','_self',2,'layout_edit.png',''),(43,39,'item','Themes Manager','index.php?mod=admin&amp;sub=themes','Themes Manager','_self',3,'layout_edit.png',''),(44,0,'folder','System','','System','_self',2,'computer.png',''),(45,44,'item','Settings','index.php?mod=admin&amp;sub=settings','Settings','_self',0,'settings.png',''),(46,44,'folder','Database','','Database','_self',1,'database_gear.png',''),(47,46,'item','Optimize','index.php?mod=database&amp;action=optimize','Optimize','_self',0,'database_go.png',''),(48,46,'item','Backup','index.php?mod=database&amp;action=backup','Backup','_self',1,'database_key.png',''),(49,44,'folder','Modules','','Modules','_self',2,'bricks.png',''),(50,49,'item','Install new modules','index.php?mod=admin&amp;sub=modules&amp;action=install_new','Install new modules','_self',0,'package.png',''),(51,49,'item','Create a module/submodule','index.php?mod=admin&amp;sub=modules&amp;action=create_new','Create a new module/submodule','_self',1,'add.png',''),(52,49,'item','Show and edit modules','index.php?mod=admin&amp;sub=modules&amp;action=show_all','Show and edit modules','_self',2,'bricks_edit.png',''),(53,49,'item','Export a module','index.php?mod=admin&amp;sub=modules&amp;action=export','Export a module','_self',3,'compress.png',''),(54,44,'folder','Language','','Language','_self',3,'spellcheck.png',''),(55,54,'item','Language Editor','index.php?mod=language&amp;sub=editor','Language Editor','_self',0,'spellcheck.png',''),(56,0,'folder','Help','','Help','_self',3,'help.png',''),(57,56,'item','Help','index.php?mod=admin&amp;sub=staticpages&amp;action=show&amp;page=help','Help','_self',0,'help.png',''),(58,56,'item','Manual','index.php?mod=admin&amp;sub=manual','Manual','_self',1,'book_open.png',''),(59,56,'item','Report Bugs & Give Feedback','index.php?mod=admin&amp;sub=bugs','Report Bugs & Give Feedback','_self',2,'error.png',''),(60,56,'item','Registration','index.php','Registration','_self',3,'favicon.ico',''),(61,56,'item','About Clansuite','index.php?mod=admin&amp;sub=staticpages&amp;action=show&amp;page=about','About Clansuite','_self',4,'information.png','');
/*!40000 ALTER TABLE `cs_adminmenu_backup` ENABLE KEYS */;

--
-- Table structure for table `cs_adminmenu_shortcuts`
--

DROP TABLE IF EXISTS `cs_adminmenu_shortcuts`;
CREATE TABLE `cs_adminmenu_shortcuts` (
  `id` tinyint(4) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `order` tinyint(4) NOT NULL default '30',
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_adminmenu_shortcuts`
--


/*!40000 ALTER TABLE `cs_adminmenu_shortcuts` DISABLE KEYS */;
INSERT INTO `cs_adminmenu_shortcuts` VALUES (1,'Console','index.php?mod=admin&amp;sub=console','console.png',45,''),(2,'Downloads','index.php?mod=admin&amp;sub=downloads','downloads.png',30,''),(3,'Articles','index.php?mod=admin&amp;sub=articles','articles.png',30,''),(4,'Links','index.php?mod=admin&amp;sub=links','links.png',30,''),(5,'Calendar','index.php?mod=admin&amp;sub=calendar','calendar.png',30,''),(6,'Time','index.php?mod=admin&amp;sub=time','time.png',30,''),(7,'Email','index.php?mod=admin&amp;sub=email','email.png',3,''),(8,'Shoutbox','index.php?mod=admin&amp;sub=shoutbox','shoutbox.png',30,''),(9,'Help','index.php?mod=admin&amp;sub=help','help.png',40,''),(10,'Security','index.php?mod=admin&amp;sub=security','security.png',41,''),(11,'Gallery','index.php?mod=admin&amp;sub=gallery','gallery.png',30,''),(12,'System','index.php?mod=admin&amp;sub=system','system.png',42,''),(13,'Replays','index.php?mod=admin&amp;sub=replays','replays.png',30,''),(14,'News','index.php?mod=admin&amp;sub=news','news.png',2,''),(15,'Settings','index.php?mod=admin&amp;sub=settings','settings.png',43,''),(16,'Users','index.php?mod=admin&amp;sub=users','users.png',1,''),(17,'Backup','index.php?mod=admin&amp;sub=backup','backup.png',44,''),(18,'Templates','index.php?mod=admin&amp;sub=templates','templates.png',4,''),(19,'Groups','index.php?mod=admin&amp;sub=groups','groups.png',2,''),(20,'Search','index.php?mod=admin&amp;sub=search','search.png',30,'');
/*!40000 ALTER TABLE `cs_adminmenu_shortcuts` ENABLE KEYS */;

--
-- Table structure for table `cs_areas`
--

DROP TABLE IF EXISTS `cs_areas`;
CREATE TABLE `cs_areas` (
  `area_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default 'New Area',
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_areas`
--


/*!40000 ALTER TABLE `cs_areas` DISABLE KEYS */;
INSERT INTO `cs_areas` VALUES (5,'Shoutbox','Rights for the shoutbox'),(4,'Control Center','The area to handle the permissions of the control center'),(6,'News','The area for the news module'),(7,'Filebrowser','The filebrowser module area'),(8,'Guestbook','The area to handle the permissions of the guestbook'),(9,'Articles','The area to handle the permissions of the articles'),(10,'Static Pages','The area to handle the permissions of the static pages'),(11,'Forum','The area to handle the permissions of the forum'),(12,'Matches','The area to handle the permissions of the matches'),(13,'Serverlist','The area to handle the permissions of the serverlist'),(14,'Downloads','The area to handle the permissions of the downloads'),(15,'Gallery','The area to handle the permissions of the gallery'),(16,'Replays','The area to handle the permissions of the replays'),(17,'Messaging','The area to handle the permissions of the messaging system');
/*!40000 ALTER TABLE `cs_areas` ENABLE KEYS */;

--
-- Table structure for table `cs_bb_code`
--

DROP TABLE IF EXISTS `cs_bb_code`;
CREATE TABLE `cs_bb_code` (
  `bb_code_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `start_tag` varchar(255) NOT NULL,
  `end_tag` varchar(255) NOT NULL,
  `content_type` varchar(255) NOT NULL,
  `allowed_in` varchar(255) NOT NULL,
  `not_allowed_in` varchar(255) NOT NULL,
  PRIMARY KEY  (`bb_code_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_bb_code`
--


/*!40000 ALTER TABLE `cs_bb_code` DISABLE KEYS */;
INSERT INTO `cs_bb_code` VALUES (1,'b','<b>','</b>','block','listitem,block,inline,link',''),(2,'i','<i>','</i>','block','listitem,block,inline,link',''),(3,'center','<center>','</center>','block','listitem,block,inline,link','');
/*!40000 ALTER TABLE `cs_bb_code` ENABLE KEYS */;

--
-- Table structure for table `cs_categories`
--

DROP TABLE IF EXISTS `cs_categories`;
CREATE TABLE `cs_categories` (
  `cat_id` tinyint(4) NOT NULL auto_increment,
  `module_id` tinyint(4) default NULL,
  `sortorder` tinyint(4) default '0',
  `name` varchar(200) default 'New Category',
  `description` text,
  `image` varchar(60) default NULL,
  `icon` varchar(60) default NULL,
  `color` varchar(7) default NULL,
  PRIMARY KEY  (`cat_id`),
  UNIQUE KEY `cat_id` (`cat_id`),
  KEY `modul_id` (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_categories`
--


/*!40000 ALTER TABLE `cs_categories` DISABLE KEYS */;
INSERT INTO `cs_categories` VALUES (1,7,1,'-keine-','Diese News sind keiner Kategorie zugeordnet','','','#000000'),(2,7,2,'Allgemein','Thema Allgemein','','','#000000'),(3,7,3,'Member','Thema Members','','','#3366CC'),(4,7,4,'Page','Thema Page','','','#000000'),(5,88,5,'IRC','Thema IRC','','','#000000'),(6,88,6,'Clan-Wars','Thema Matches','','','#000000'),(7,88,7,'Sonstiges','Thema Hardware','','','#000000');
/*!40000 ALTER TABLE `cs_categories` ENABLE KEYS */;

--
-- Table structure for table `cs_group_rights`
--

DROP TABLE IF EXISTS `cs_group_rights`;
CREATE TABLE `cs_group_rights` (
  `group_id` int(11) NOT NULL default '0',
  `right_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`group_id`,`right_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_group_rights`
--


/*!40000 ALTER TABLE `cs_group_rights` DISABLE KEYS */;
INSERT INTO `cs_group_rights` VALUES (1,10),(1,11),(1,12),(1,13),(1,16),(2,11),(3,1),(3,3),(3,4),(3,5);
/*!40000 ALTER TABLE `cs_group_rights` ENABLE KEYS */;

--
-- Table structure for table `cs_groups`
--

DROP TABLE IF EXISTS `cs_groups`;
CREATE TABLE `cs_groups` (
  `group_id` int(5) unsigned NOT NULL auto_increment,
  `sortorder` int(4) unsigned NOT NULL default '0',
  `name` varchar(80) default 'New Group',
  `description` varchar(255) NOT NULL,
  `icon` varchar(255) default NULL,
  `image` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL,
  PRIMARY KEY  (`group_id`),
  UNIQUE KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_groups`
--


/*!40000 ALTER TABLE `cs_groups` DISABLE KEYS */;
INSERT INTO `cs_groups` VALUES (1,1,'Administrator','The Administrator Group','','','#666600'),(2,1,'Guests','The Guest Group','','','#000000');
/*!40000 ALTER TABLE `cs_groups` ENABLE KEYS */;

--
-- Table structure for table `cs_guestbook`
--

DROP TABLE IF EXISTS `cs_guestbook`;
CREATE TABLE `cs_guestbook` (
  `gb_id` int(11) NOT NULL auto_increment,
  `gb_added` int(12) default NULL,
  `gb_nick` varchar(25) character set utf8 default NULL,
  `gb_email` varchar(35) character set utf8 default NULL,
  `gb_icq` int(13) default NULL,
  `gb_website` varchar(35) character set utf8 default NULL,
  `gb_town` varchar(25) character set utf8 default NULL,
  `gb_text` text character set utf8,
  `gb_admincomment` text,
  `gb_ip` varchar(16) default NULL,
  PRIMARY KEY  (`gb_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs_guestbook`
--


/*!40000 ALTER TABLE `cs_guestbook` DISABLE KEYS */;
INSERT INTO `cs_guestbook` VALUES (2,1174782228,'mr.vain','vain@vain.vain',32754333,'http://www.clansuite.com','Greifswald','guestbook entry test','123','127.0.0.1');
/*!40000 ALTER TABLE `cs_guestbook` ENABLE KEYS */;

--
-- Table structure for table `cs_help`
--

DROP TABLE IF EXISTS `cs_help`;
CREATE TABLE `cs_help` (
  `help_id` int(11) NOT NULL auto_increment,
  `mod` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `helptext` text NOT NULL,
  `related_links` text NOT NULL,
  PRIMARY KEY  (`help_id`),
  UNIQUE KEY `help_id` (`help_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_help`
--


/*!40000 ALTER TABLE `cs_help` DISABLE KEYS */;
INSERT INTO `cs_help` VALUES (1,'admin','','show','[b]BOLD: admin show helptext[/b] [i]ITALICS: Italiener sind Spagettifresser![/i]\n[s]STRANGETEST: not defined bbcode[/s]','www.google.de');
/*!40000 ALTER TABLE `cs_help` ENABLE KEYS */;

--
-- Table structure for table `cs_messages`
--

DROP TABLE IF EXISTS `cs_messages`;
CREATE TABLE `cs_messages` (
  `message_id` int(11) NOT NULL auto_increment,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `headline` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(11) NOT NULL,
  `read` int(1) NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `from` (`from`,`to`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_messages`
--


/*!40000 ALTER TABLE `cs_messages` DISABLE KEYS */;
INSERT INTO `cs_messages` VALUES (10,1,1,'test','testentry1',1171204602,1),(11,1,1,'test2','testentry2',1171204602,1),(12,1,1,'test3','testentry3',1171204602,1);
/*!40000 ALTER TABLE `cs_messages` ENABLE KEYS */;

--
-- Table structure for table `cs_mod_rel_sub`
--

DROP TABLE IF EXISTS `cs_mod_rel_sub`;
CREATE TABLE `cs_mod_rel_sub` (
  `module_id` int(11) NOT NULL,
  `submodule_id` int(11) NOT NULL,
  PRIMARY KEY  (`module_id`,`submodule_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_mod_rel_sub`
--


/*!40000 ALTER TABLE `cs_mod_rel_sub` DISABLE KEYS */;
INSERT INTO `cs_mod_rel_sub` VALUES (1,70),(2,1),(2,2),(2,3),(2,4),(2,5),(2,6),(2,7),(2,8),(2,9),(2,10),(2,11),(2,12),(2,13),(2,14),(2,15),(2,61),(2,72),(5,18),(7,16),(9,17),(13,65),(14,62),(15,66),(16,69),(17,63),(18,64),(19,68),(20,67),(21,71);
/*!40000 ALTER TABLE `cs_mod_rel_sub` ENABLE KEYS */;

--
-- Table structure for table `cs_modules`
--

DROP TABLE IF EXISTS `cs_modules`;
CREATE TABLE `cs_modules` (
  `module_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `license` varchar(255) NOT NULL,
  `copyright` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `version` float NOT NULL,
  `cs_version` float NOT NULL,
  `core` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`module_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_modules`
--


/*!40000 ALTER TABLE `cs_modules` DISABLE KEYS */;
INSERT INTO `cs_modules` VALUES (1,'account','Jens-AndrÃ© Koch, Florian Wolf','http://www.clansuite.com','GPL v2','Clansuite Group','Account Administration','This module handles all necessary account stuff - like login/logout etc.','module_account','account.module.php','account',1,'module_account.jpg',0.1,0,1),(3,'captcha','Jens-AndrÃ© Koch, Florian Wolf','http://www.clansuite.com','GPL v2','Clansuite Group','Captcha Module','The captcha module presents a image only humanoids can read.','module_captcha','captcha.module.php','captcha',1,'module_captcha.jpg',0.1,0,1),(4,'index','Jens-AndrÃ© Koch, Florian Wolf','http://www.clansuite.com','GPL v2','Clansuite Group','Index Module','This is the main site.','module_index','index.module.php','index',1,'module_index.jpg',0.1,0,1),(2,'admin','Jens-AndrÃ© Koch, Florian Wolf','http://www.clansuite.com','GPL v2','Clansuite Group','Admin Interface','This is the Admin Control Panel','module_admin','admin.module.php','admin',0,'module_admin.jpg',0.1,0,1),(15,'matches','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','ClanSuite Group','Matches','The matches system of clansuite','module_matches','matches.module.php','matches',1,'module_matches.jpg',0.1,0.1,0),(6,'shoutbox','BjÃ¶rn Spiegel, Florian Wolf','http://www.clansuite.com','GPL v2','Clansuite Group','Shoutbox Modul','This module displays a shoutbox. You can do entries and administrate it ...','module_shoutbox','shoutbox.module.php','shoutbox',1,'module_shoutbox.jpg',0.1,0,0),(7,'news','Jens-AndrÃ© Koch, Florian Wolf','http://www.clansuite.com','GPL v2','Clansuite Group','News','News module','module_news','news.module.php','news',1,'module_news.jpg',0.1,0,0),(8,'filebrowser','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','clansuite group','Filebrowser','The filebrowser of clansuite','module_filebrowser','filebrowser.module.php','filebrowser',1,'module_filebrowser.jpg',0.1,0,0),(9,'serverlist','Jens-AndrÃ© Koch','http://www.clansuite.com','BSD','Clansuite Group','Serverlist','List Gameservers','module_serverlist','serverlist.module.php','serverlist',1,'module_serverlist.jpg',0.1,0,0),(13,'guestbook','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','ClanSuite Group','Guestbook','The guestbook for visitors','module_guestbook','guestbook.module.php','guestbook',1,'module_guestbook.jpg',0.1,0.1,0),(14,'forum','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','ClanSuite Group','Forum','The forum where people meet','module_forum','forum.module.php','forum',1,'module_forum.jpg',0.1,0.1,0),(16,'downloads','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','ClanSuite Group','Downloads','The download area of clansuite','module_downloads','downloads.module.php','downloads',1,'module_downloads.jpg',0.1,0.1,0),(17,'articles','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','ClanSuite Group','Articles','The articles module to write some stuff','module_articles','articles.module.php','articles',1,'module_articles.jpg',0.1,0.1,0),(18,'gallery','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','ClanSuite Group','Gallery','The gallery module of clansuite','module_gallery','gallery.module.php','gallery',1,'module_gallery.jpg',0.1,0.1,0),(19,'replays','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','ClanSuite Group','Replays','The replays area of clansuite','module_replays','replays.module.php','replays',1,'module_replays.jpg',0.1,0.1,0),(20,'messaging','Florian Wolf, Jens-AndrÃ© Koch','http://www.clansuite.com','GPL v2','ClanSuite Group','Messaging','The messaging module of clansuite','module_messaging','messaging.module.php','messaging',1,'module_messaging.jpg',0.1,0.1,0),(22,'staticpages','Jens-Andr? Koch, Florian Wolf','http://www.clansuite.com','GPL v2','Clansuite Group','Static Pages','Static Pages store HTML content','module_staticpages','staticpages.module.php','staticpages',1,'module_staticpages.jpg',0.1,0.1,0);
/*!40000 ALTER TABLE `cs_modules` ENABLE KEYS */;

--
-- Table structure for table `cs_news`
--

DROP TABLE IF EXISTS `cs_news`;
CREATE TABLE `cs_news` (
  `news_id` int(11) NOT NULL auto_increment,
  `news_title` varchar(255) NOT NULL,
  `news_body` text NOT NULL,
  `cat_id` tinyint(4) NOT NULL default '0',
  `user_id` int(11) unsigned NOT NULL default '0',
  `news_added` int(11) default NULL,
  `news_hidden` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`news_id`,`cat_id`,`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_news`
--


/*!40000 ALTER TABLE `cs_news` DISABLE KEYS */;
INSERT INTO `cs_news` VALUES (1,'testeintrag1','testbody1\r\n1\r\n2\r\n3\r\n4\r\n5\r\n6\r\n7\r\n8\r\n9\r\n10\r\ntestbody11',2,1,1168260056,0),(2,'1243','21341234',0,1,1168260056,0),(3,'2345','asdvgfas',0,1,1168260056,0),(4,'3451','dfas',0,1,1168260056,0),(5,'234512','df',0,1,1168260056,0),(6,'51','dfaas',0,1,1168260056,0),(7,'3512','sdf',0,1,1168260056,0),(8,'1234512','fasdf',0,1,1168260056,0),(9,'23512345','asdasd',0,1,1168260056,0),(10,'512351','f',0,1,1168260056,0),(11,'123451324','asdf',0,1,1168260056,0),(12,'512351234','asd',0,1,1168260056,0),(13,'12351325','asdf',0,1,1168260056,0),(14,'41234123','f',0,1,1168260056,0),(15,'312','asd',0,1,1168260056,0),(16,'Lore ipsum','<a href=\"index.html\">Nunc eget pretium</a> diam.\r\n                \r\n				<p>Praesent nisi sem, bibendum in, ultrices sit amet, euismod sit amet, dui. Fusce nibh. Curabitur pellentesque, lectus at <a href=\"index.html\">volutpat interdum</a>. Pellentesque a nibh quis nunc volutpat aliquam</p>\r\n				\r\n				<blockquote><p>Sed sodales nisl sit amet augue. Donec ultrices, augue ullamcorper posuere laoreet, turpis massa tristique justo, sed egestas metus magna sed purus.</p></blockquote>\r\n				\r\n				<code>margin-bottom: 12px;\r\n                font-size: 1.1em;\r\n                background: url(images/quote.gif);\r\n                padding-left: 28px;\r\n                color: #555;</code>\r\n\r\n                <ul>\r\n					<li>Tristique</li>\r\n					<li>Aenean</li>\r\n					<li>Pretium</li>\r\n				</ul>\r\n\r\n				<p>Eget feugiat est leo tempor quam. Ut quis neque convallis magna consequat molestie.</p>',0,1,1168260056,0);
/*!40000 ALTER TABLE `cs_news` ENABLE KEYS */;

--
-- Table structure for table `cs_news_comments`
--

DROP TABLE IF EXISTS `cs_news_comments`;
CREATE TABLE `cs_news_comments` (
  `news_id` int(11) NOT NULL default '0',
  `comment_id` int(10) unsigned NOT NULL default '0',
  `user_id` int(11) unsigned NOT NULL default '0',
  `body` text NOT NULL,
  `added` datetime NOT NULL default '0000-00-00 00:00:00',
  `pseudo` varchar(25) default NULL,
  `ip` varchar(15) NOT NULL,
  `host` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_news_comments`
--


/*!40000 ALTER TABLE `cs_news_comments` DISABLE KEYS */;
INSERT INTO `cs_news_comments` VALUES (1,1,1,'123','2005-07-29 13:04:07','','127.0.0.1','localhost'),(1,2,0,'1234567','2005-07-29 16:50:08','blub','127.0.0.1','localhost'),(2,0,0,'testeee','2006-03-04 02:25:42','test','127.0.0.1','localhost'),(2,0,0,'eee','2006-03-04 02:25:57','tester','127.0.0.1','localhost'),(3,0,1,'[center]test[/center]','2006-05-11 18:30:57','test','127.0.0.1','localhost');
/*!40000 ALTER TABLE `cs_news_comments` ENABLE KEYS */;

--
-- Table structure for table `cs_profiles`
--

DROP TABLE IF EXISTS `cs_profiles`;
CREATE TABLE `cs_profiles` (
  `profile_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL default '-',
  `height` int(11) NOT NULL,
  `address` varchar(255) NOT NULL default '-',
  `zipcode` varchar(255) NOT NULL default '-',
  `city` varchar(255) NOT NULL default '-',
  `country` varchar(255) NOT NULL default '-',
  `homepage` varchar(255) NOT NULL default '-',
  `icq` varchar(255) NOT NULL default '-',
  `msn` varchar(255) NOT NULL default '-',
  `skype` varchar(255) NOT NULL default '-',
  `phone` varchar(255) NOT NULL default '-',
  `mobile` varchar(255) NOT NULL default '-',
  `custom_text` text NOT NULL,
  PRIMARY KEY  (`profile_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_profiles`
--


/*!40000 ALTER TABLE `cs_profiles` DISABLE KEYS */;
INSERT INTO `cs_profiles` VALUES (1,1,1174341824,'Florian','Wolf',496274400,'male',178,'Mühlenstr. 65','78126','Jena','DE','http://www.clansuite.com','163164530','-','-','-','-','[b]bla[/b]'),(2,2,1174883610,'','',0,'-',0,'-','-','-','-','-','-','-','-','-','-','');
/*!40000 ALTER TABLE `cs_profiles` ENABLE KEYS */;

--
-- Table structure for table `cs_rights`
--

DROP TABLE IF EXISTS `cs_rights`;
CREATE TABLE `cs_rights` (
  `right_id` int(11) unsigned NOT NULL auto_increment,
  `area_id` int(11) NOT NULL default '0',
  `name` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY  (`right_id`,`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_rights`
--


/*!40000 ALTER TABLE `cs_rights` DISABLE KEYS */;
INSERT INTO `cs_rights` VALUES (11,5,'shoutbox_post','The right to post into the shoutbox'),(10,4,'access_controlcenter','The right to access the control center'),(12,6,'create_news','Add a news'),(13,7,'access_filebrowser','Access the filebrowser'),(14,6,'edit_news','Edit a news'),(15,6,'view_news','View the news'),(16,17,'use_messaging_system','The ability to use the messaging system.');
/*!40000 ALTER TABLE `cs_rights` ENABLE KEYS */;

--
-- Table structure for table `cs_serverlist`
--

DROP TABLE IF EXISTS `cs_serverlist`;
CREATE TABLE `cs_serverlist` (
  `server_id` int(5) default NULL,
  `ip` varchar(15) default NULL,
  `port` varchar(5) default NULL,
  `name` varchar(250) default NULL,
  `csquery_engine` varchar(60) default NULL,
  `gametype` varchar(60) default NULL,
  `image_country` varchar(20) default NULL,
  UNIQUE KEY `server_id` (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_serverlist`
--


/*!40000 ALTER TABLE `cs_serverlist` DISABLE KEYS */;
INSERT INTO `cs_serverlist` VALUES (1,'team-n1.com','27339','knd-squad DEATHMATCH powered by CLANSUITE DOT COM ','steam','cs','de.png'),(2,'87.117.208.193','27025',' DigitalTakedown.org UK - Public Server','steam','cs','de.png'),(3,'83.133.81.95','27015','#German Headquarter 3 WC3FT | Team.GHQ | www.team-GHQ.eu ','steam','cs','de.png'),(4,'210.55.92.68','27980','Xtra Quake 3 RA #1','q3a','q3a','de.png'),(5,'85.14.233.32','27015','B I E R F R I E D H O F | TICK100 | by ngz-server.de','steam','cssource','de.png');
/*!40000 ALTER TABLE `cs_serverlist` ENABLE KEYS */;

--
-- Table structure for table `cs_session`
--

DROP TABLE IF EXISTS `cs_session`;
CREATE TABLE `cs_session` (
  `user_id` int(11) NOT NULL default '0',
  `session_id` varchar(32) NOT NULL,
  `session_data` text NOT NULL,
  `session_name` text NOT NULL,
  `session_expire` int(11) NOT NULL default '0',
  `session_visibility` tinyint(4) NOT NULL default '0',
  `session_where` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  UNIQUE KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_session`
--


/*!40000 ALTER TABLE `cs_session` DISABLE KEYS */;
INSERT INTO `cs_session` VALUES (1,'d564dd9fa29af11dbd186385abfcdb4e','client_ip|s:9:\"127.0.0.1\";client_browser|s:87:\"Mozilla/5.0 (Windows; U; Windows NT 5.1; de; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3\";client_host|s:9:\"localhost\";suiteSID|s:32:\"d564dd9fa29af11dbd186385abfcdb4e\";user|a:9:{s:6:\"authed\";i:1;s:7:\"user_id\";s:1:\"1\";s:4:\"nick\";s:5:\"admin\";s:8:\"password\";s:40:\"d1ca11799e222d429424d47b424047002ea72d44\";s:5:\"email\";s:21:\"support@clansuite.com\";s:8:\"disabled\";s:1:\"0\";s:9:\"activated\";s:1:\"1\";s:6:\"groups\";a:1:{i:0;s:1:\"1\";}s:6:\"rights\";a:5:{s:20:\"access_controlcenter\";i:1;s:13:\"shoutbox_post\";i:1;s:11:\"create_news\";i:1;s:18:\"access_filebrowser\";i:1;s:20:\"use_messaging_system\";i:1;}}SmartyPaginate|a:1:{s:7:\"default\";a:9:{s:10:\"item_limit\";i:20;s:10:\"item_total\";i:1;s:12:\"current_item\";i:1;s:6:\"urlvar\";s:4:\"page\";s:3:\"url\";s:45:\"index.php?mod=guestbook&sub=admin&action=show\";s:9:\"prev_text\";s:4:\"prev\";s:9:\"next_text\";s:4:\"next\";s:10:\"first_text\";s:5:\"first\";s:9:\"last_text\";s:4:\"last\";}}SmartyColumnSort|a:1:{s:7:\"default\";a:8:{s:10:\"column_var\";s:10:\"defaultCol\";s:8:\"sort_var\";s:11:\"defaultSort\";s:12:\"column_array\";a:2:{i:0;s:5:\"gb_id\";i:1;s:8:\"gb_added\";}s:14:\"default_column\";i:1;s:12:\"default_sort\";s:4:\"desc\";s:14:\"current_column\";i:1;s:12:\"current_sort\";s:4:\"desc\";s:11:\"target_page\";s:46:\"/index.php?mod=guestbook&sub=admin&action=show\";}}','suiteSID',1175259592,1,'admin');
/*!40000 ALTER TABLE `cs_session` ENABLE KEYS */;

--
-- Table structure for table `cs_shoutbox`
--

DROP TABLE IF EXISTS `cs_shoutbox`;
CREATE TABLE `cs_shoutbox` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `msg` tinytext NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `ip` varchar(15) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_shoutbox`
--


/*!40000 ALTER TABLE `cs_shoutbox` DISABLE KEYS */;
INSERT INTO `cs_shoutbox` VALUES (1,'12345','123test@test.com','texttext',1155898254,'127.0.0.1'),(2,'109876','123@123.123','shoutboxtesttest',1155898254,'127.0.0.1'),(17,'test','test@test.de','clansuite is just the best !!!',1158356530,'127.0.0.1'),(18,'test','test@test.de','how are you? feeling well?',1158356544,'127.0.0.1'),(19,'test','test@test.de','next time this will be a chat :)',1158356601,'127.0.0.1');
/*!40000 ALTER TABLE `cs_shoutbox` ENABLE KEYS */;

--
-- Table structure for table `cs_static_pages`
--

DROP TABLE IF EXISTS `cs_static_pages`;
CREATE TABLE `cs_static_pages` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `html` text NOT NULL,
  `iframe` tinyint(1) NOT NULL default '0',
  `iframe_height` int(11) NOT NULL default '300',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_static_pages`
--


/*!40000 ALTER TABLE `cs_static_pages` DISABLE KEYS */;
INSERT INTO `cs_static_pages` VALUES (1,'Credits','Without their brains Clansuite would not be - Thanks alot!','','<u><strong>Clansuite - Credits </strong></u>\r\n<br />\r\n<br />\r\n<br />\r\n<table width=\"691\" cellspacing=\"1\" cellpadding=\"1\" border=\"1\" summary=\"cs credits\">\r\n    <tbody>\r\n        <tr>\r\n            <td align=\"center\">Class</td>\r\n            <td align=\"center\">Author<br />\r\n            </td>\r\n            <td align=\"center\">&nbsp;Licence</td>\r\n        </tr>\r\n        <tr>\r\n            <td>tar.class.php</td>\r\n            <td>Vincent Blavet &lt;vincent@phpconcept.net&gt;<br />\r\n            Copyright (c) 1997-2003 The PHP Group <br />\r\n            </td>\r\n            <td>PHP license v3</td>\r\n        </tr>\r\n        <tr>\r\n            <td>PEAR, the PHP Extension and Application Repository</td>\r\n            <td>Sterling Hughes &lt;sterling@php.net&gt;<br />\r\n            Stig Bakken &lt;ssb@php.net&gt;<br />\r\n            Tomas V.V.Cox &lt;cox@idecnet.com&gt;<br />\r\n            Greg Beaver &lt;cellog@php.net&gt;<br />\r\n            &nbsp;Copyright&nbsp; 1997-2006 The PHP Group</td>\r\n            <td>PHP license v3</td>\r\n        </tr>\r\n        <tr>\r\n            <td>Swift Mailer: A Flexible PHP Mailer Class</td>\r\n            <td>&quot;Chris Corbyn&quot; &lt;chris@w3style.co.uk&gt;<br />\r\n            Copyright 2006 Chris Corbyn</td>\r\n            <td>LGPL</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">Smarty: the PHP compiling template engine</td>\r\n            <td valign=\"top\">Monte Ohrt &lt;monte at ohrt dot com&gt;<br />\r\n            Andrei Zmievski &lt;andrei@php.net&gt;<br />\r\n            Copyright 2001-2005 New Digital Group, Inc.</td>\r\n            <td valign=\"top\">LGPL</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">Sajax : cross-platform, cross-browser web scripting toolkit</td>\r\n            <td valign=\"top\">Copyright 2005-2006 modernmethod</td>\r\n            <td valign=\"top\">BSD</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">Imagemanger</td>\r\n            <td valign=\"top\">Xiang Wei ZHUO &lt;wei@zhuo.org&gt;</td>\r\n            <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">DHTML Calendar Javascript</td>\r\n            <td valign=\"top\">Copyright Mihai Bazon, 2002-2005</td>\r\n            <td valign=\"top\">LGPL</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">Tab Pane Javascript</td>\r\n            <td valign=\"top\">Copyright (c) 2002, 2003, 2006 Erik Arvidsson</td>\r\n            <td valign=\"top\">Apache License v2</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\"><a href=\"http://www.fckeditor.net/\">FCKEditor</a>- WYSIWYG</td>\r\n            <td valign=\"top\">&nbsp;</td>\r\n            <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">Icons by <a href=\"http://www.famfamfam.com/lab/icons/\">famfamfam</a></td>\r\n            <td valign=\"top\">&nbsp;</td>\r\n            <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">mygosumenu\'s</td>\r\n            <td valign=\"top\">Copyright 2003,2004 Cezary Tomczak</td>\r\n            <td valign=\"top\">BSD</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">Bitstream Vera Fonts </td>\r\n            <td valign=\"top\">Copyright (c) 2003 by Bitstream, Inc.</td>\r\n            <td valign=\"top\">own</td>\r\n        </tr>\r\n        <tr>\r\n            <td valign=\"top\">&nbsp;</td>\r\n            <td valign=\"top\">&nbsp;</td>\r\n            <td valign=\"top\">&nbsp;</td>\r\n        </tr>\r\n    </tbody>\r\n</table>\r\n',0,300),(2,'Google','Google','http://www.google.de','',1,500),(3,'Help','The help for ClanSuite','','<strong><font size=\"4\">Help</font><br />\r\n<br />\r\n</strong><strong> - gogo<br />\r\n- gogogogo<br />\r\n- gogogogogogo</strong>',1,300),(4,'Manual','The Manual','','<font size=\"4\">Manual</font><br />\r\n<br />\r\n- some content',1,300),(5,'About','About ClanSuite','','<font size=\"4\">About</font><br />\r\n<br />\r\n- some content',1,300);
/*!40000 ALTER TABLE `cs_static_pages` ENABLE KEYS */;

--
-- Table structure for table `cs_submodules`
--

DROP TABLE IF EXISTS `cs_submodules`;
CREATE TABLE `cs_submodules` (
  `submodule_id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`submodule_id`)
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_submodules`
--


/*!40000 ALTER TABLE `cs_submodules` DISABLE KEYS */;
INSERT INTO `cs_submodules` VALUES (1,'admin','filebrowser.admin.php','module_filebrowser_admin'),(2,'configs','configs.module.php','module_admin_configs'),(3,'modules','modules.module.php','module_admin_modules'),(4,'users','users.module.php','module_admin_users'),(5,'usercenter','usercenter.module.php','module_admin_usercenter'),(6,'groups','groups.module.php','module_admin_groups'),(7,'permissions','perms.module.php','module_admin_permissions'),(8,'menueditor','menueditor.module.php','module_admin_menueditor'),(9,'static','static.module.php','module_admin_static'),(10,'bugs','bugs.module.php','module_admin_bugs'),(11,'manual','manual.module.php','module_admin_manual'),(12,'templates','templates.module.php','module_admin_templates'),(13,'settings','settings.module.php','module_admin_settings'),(14,'categories','categories.module.php','module_admin_categories'),(15,'help','help.module.php','module_admin_help'),(16,'admin','news.admin.php','module_news_admin'),(17,'admin','serverlist.admin.php','module_serverlist_admin'),(61,'bbcode','bbcode.module.php','module_admin_bbcode'),(62,'admin','forum.admin.php','module_forum_admin'),(63,'admin','articles.admin.php','module_articles_admin'),(64,'admin','gallery.admin.php','module_gallery_admin'),(65,'admin','guestbook.admin.php','module_guestbook_admin'),(66,'admin','matches.admin.php','module_matches_admin'),(67,'admin','messaging.admin.php','module_messaging_admin'),(68,'admin','replays.admin.php','module_replays_admin'),(69,'admin','downloads.admin.php','module_downloads_admin'),(70,'profile','profile.module.php','module_account_profile'),(18,'admin','staticpages.admin.php','module_static_admin'),(72,'themes','themes.module.php','module_admin_themes');
/*!40000 ALTER TABLE `cs_submodules` ENABLE KEYS */;

--
-- Table structure for table `cs_user_groups`
--

DROP TABLE IF EXISTS `cs_user_groups`;
CREATE TABLE `cs_user_groups` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `group_id` int(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_user_groups`
--


/*!40000 ALTER TABLE `cs_user_groups` DISABLE KEYS */;
INSERT INTO `cs_user_groups` VALUES (1,1);
/*!40000 ALTER TABLE `cs_user_groups` ENABLE KEYS */;

--
-- Table structure for table `cs_user_options`
--

DROP TABLE IF EXISTS `cs_user_options`;
CREATE TABLE `cs_user_options` (
  `option_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY  (`option_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_user_options`
--


/*!40000 ALTER TABLE `cs_user_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `cs_user_options` ENABLE KEYS */;

--
-- Table structure for table `cs_user_rights`
--

DROP TABLE IF EXISTS `cs_user_rights`;
CREATE TABLE `cs_user_rights` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `right_id` int(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`right_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `cs_user_rights`
--


/*!40000 ALTER TABLE `cs_user_rights` DISABLE KEYS */;
/*!40000 ALTER TABLE `cs_user_rights` ENABLE KEYS */;

--
-- Table structure for table `cs_users`
--

DROP TABLE IF EXISTS `cs_users`;
CREATE TABLE `cs_users` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `email` varchar(150) NOT NULL,
  `nick` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `new_password` varchar(40) NOT NULL,
  `code` varchar(255) NOT NULL,
  `joined` int(11) NOT NULL default '0',
  `timestamp` int(11) NOT NULL default '0',
  `disabled` tinyint(1) NOT NULL default '0',
  `activated` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`user_id`),
  KEY `email` (`email`),
  KEY `nick` (`nick`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cs_users`
--


/*!40000 ALTER TABLE `cs_users` DISABLE KEYS */;
INSERT INTO `cs_users` VALUES (1,'support@clansuite.com','admin','d1ca11799e222d429424d47b424047002ea72d44','','',0,0,0,1),(2,'test@test.de','test','974c2e9429ade22627f12ecb4b400f224474dfd0','','',1158144934,0,0,1);
/*!40000 ALTER TABLE `cs_users` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

