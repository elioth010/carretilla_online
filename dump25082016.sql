-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: carretilla_online
-- ------------------------------------------------------
-- Server version	5.6.30-1

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
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `actions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'edit','allow edit into menu','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,'create','allow create option into admin menu','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,'view','allow view option into admin menu','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,'delete','allow delete option into admin menu','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actions_roles_menu`
--

DROP TABLE IF EXISTS `actions_roles_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions_roles_menu` (
  `action_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `menu_admin_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`action_id`,`role_id`,`menu_admin_id`),
  KEY `actions_roles_menu_role_id_foreign` (`role_id`),
  KEY `actions_roles_menu_menu_admin_id_foreign` (`menu_admin_id`),
  CONSTRAINT `actions_roles_menu_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`),
  CONSTRAINT `actions_roles_menu_menu_admin_id_foreign` FOREIGN KEY (`menu_admin_id`) REFERENCES `administration_menus` (`id`),
  CONSTRAINT `actions_roles_menu_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions_roles_menu`
--

LOCK TABLES `actions_roles_menu` WRITE;
/*!40000 ALTER TABLE `actions_roles_menu` DISABLE KEYS */;
INSERT INTO `actions_roles_menu` VALUES (1,2,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,5,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,6,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,7,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,8,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,10,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,11,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,2,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,5,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,6,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,7,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,8,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,10,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,4,11,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,2,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,5,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,6,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,7,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,8,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,10,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,11,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,5,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,6,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,7,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,8,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,10,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,11,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `actions_roles_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_module_user_actions`
--

DROP TABLE IF EXISTS `admin_module_user_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_module_user_actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `action_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_module_user_actions_user_id_foreign` (`user_id`),
  KEY `admin_module_user_actions_shop_id_foreign` (`shop_id`),
  KEY `admin_module_user_actions_menu_id_foreign` (`menu_id`),
  KEY `admin_module_user_actions_action_id_foreign` (`action_id`),
  CONSTRAINT `admin_module_user_actions_action_id_foreign` FOREIGN KEY (`action_id`) REFERENCES `actions` (`id`),
  CONSTRAINT `admin_module_user_actions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  CONSTRAINT `admin_module_user_actions_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `admin_module_user_actions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_module_user_actions`
--

LOCK TABLES `admin_module_user_actions` WRITE;
/*!40000 ALTER TABLE `admin_module_user_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_module_user_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `administration_menus`
--

DROP TABLE IF EXISTS `administration_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administration_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `route` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `administration_menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administration_menus`
--

LOCK TABLES `administration_menus` WRITE;
/*!40000 ALTER TABLE `administration_menus` DISABLE KEYS */;
INSERT INTO `administration_menus` VALUES (1,'admin_users','provide a interface to manage the users on the system','','Users','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/user'),(2,'admin_menus','provide a interface to manage the menus on the system','','Menus','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/menu'),(3,'admin_roles','provide a interface to manage the roles on the system','','Roles','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/role'),(4,'admin_acces','provide a interface to manage the access by roles on the system','','Access Roles','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/admin_menu'),(5,'admin_products','provide a interface to manage the products on the system','','Products','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/product'),(6,'admin_inventories','provide a interface to manage the inventories on the system','','Inventories','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/inventory'),(7,'admin_orders','provide a interface to manage the orders on the system','','Orders','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/order'),(8,'admin_dispatches','provide a interface to manage the dispatches on the system','','Dispatches','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/dispatch'),(10,'admin_categories','provide a interface to manage the categories on the system','','Categories','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/category'),(11,'admin_marks','provide a interface to manage the marks on the system','','Marks','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,'admin/mark');
/*!40000 ALTER TABLE `administration_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_id_unique` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Earrings','2015-05-13 08:46:04','2015-05-13 08:46:04',NULL),(2,'Scarves','2015-05-13 08:46:32','2015-05-13 08:46:32',NULL),(3,'Bracelet','2015-05-21 08:30:37','2015-05-21 08:30:37',NULL);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dispatchs`
--

DROP TABLE IF EXISTS `dispatchs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dispatchs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `dispatch_date` datetime NOT NULL,
  `status` enum('IN_PROCESS','DISPATCHED') COLLATE utf8_unicode_ci NOT NULL,
  `user_dispatches` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `inventory_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dispatchs_order_id_foreign` (`order_id`),
  KEY `dispatchs_user_dispatches_foreign` (`user_dispatches`),
  KEY `dispatchs_inventory_id_foreign` (`inventory_id`),
  CONSTRAINT `dispatchs_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventories` (`id`),
  CONSTRAINT `dispatchs_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `dispatchs_user_dispatches_foreign` FOREIGN KEY (`user_dispatches`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dispatchs`
--

LOCK TABLES `dispatchs` WRITE;
/*!40000 ALTER TABLE `dispatchs` DISABLE KEYS */;
/*!40000 ALTER TABLE `dispatchs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `index_page`
--

DROP TABLE IF EXISTS `index_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `index_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position_id` int(10) unsigned NOT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `header_text` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_page_position_id_foreign` (`position_id`),
  KEY `index_page_product_id_foreign` (`product_id`),
  CONSTRAINT `index_page_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions_page` (`id`),
  CONSTRAINT `index_page_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `index_page`
--

LOCK TABLES `index_page` WRITE;
/*!40000 ALTER TABLE `index_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `index_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `stocks` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `inventories_product_id_foreign` (`product_id`),
  CONSTRAINT `inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventories`
--

LOCK TABLES `inventories` WRITE;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_movements`
--

DROP TABLE IF EXISTS `inventory_movements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_movements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `movements_type` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inventory_movements_document_id_unique` (`document_id`),
  KEY `inventory_movements_product_id_foreign` (`product_id`),
  KEY `inventory_movements_user_id_foreign` (`user_id`),
  KEY `inventory_movements_order_id_foreign` (`order_id`),
  KEY `inventory_movements_movements_type_foreign` (`movements_type`),
  CONSTRAINT `inventory_movements_movements_type_foreign` FOREIGN KEY (`movements_type`) REFERENCES `movements_type` (`id`),
  CONSTRAINT `inventory_movements_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `inventory_movements_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`code`),
  CONSTRAINT `inventory_movements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_movements`
--

LOCK TABLES `inventory_movements` WRITE;
/*!40000 ALTER TABLE `inventory_movements` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_movements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_client_id_foreign` (`client_id`),
  KEY `invoices_order_id_foreign` (`order_id`),
  KEY `invoices_shop_id_foreign` (`shop_id`),
  KEY `invoices_user_id_foreign` (`user_id`),
  CONSTRAINT `invoices_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  CONSTRAINT `invoices_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `invoices_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices_details`
--

DROP TABLE IF EXISTS `invoices_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `tax` decimal(13,2) NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `sub_total` decimal(13,2) NOT NULL,
  `off` decimal(13,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoices_details_product_id_foreign` (`product_id`),
  CONSTRAINT `invoices_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices_details`
--

LOCK TABLES `invoices_details` WRITE;
/*!40000 ALTER TABLE `invoices_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marks`
--

DROP TABLE IF EXISTS `marks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marks` (
  `code` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `product_range_initial` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_range_final` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marks`
--

LOCK TABLES `marks` WRITE;
/*!40000 ALTER TABLE `marks` DISABLE KEYS */;
INSERT INTO `marks` VALUES ('101','Quantal','101-0001','101-9999','2015-05-20 19:55:50','2015-05-21 06:38:51',NULL),('202','Banshee','202-0000','202-9999','2015-05-21 08:29:37','2015-05-21 08:29:37',NULL);
/*!40000 ALTER TABLE `marks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'login','provide a page to make a login or sign up','','Login','2015-04-22 09:38:55','2015-05-21 06:21:14',NULL,'login',5),(3,'home','show the principal page','','Home','2015-04-22 09:38:55','2015-04-22 09:38:55',NULL,'home',0),(4,'logout','make a logout if a user is login','','Logout','2015-04-22 09:38:55','2015-05-04 22:02:28',NULL,'logout',5),(5,'admin','The main page to administrate the content of site','/home/elioth010/PHPWorkspace/carretilla_online/public/web/images/menu/Pencil.png','Administration','2015-05-02 03:59:50','2015-05-04 22:02:14',NULL,'admin',2),(6,'profile','Show the user profile','','Profile','2015-05-05 02:52:48','2015-05-05 02:52:48',NULL,'profile',1),(7,'products','show the principal page of products','','Products','2015-05-20 22:09:18','2015-05-20 22:09:18',NULL,'product',2),(8,'cart','Shopping Cart','','My Cart','2015-05-21 01:46:46','2015-05-21 01:46:46',NULL,'shooppingcart',3),(9,'myorders','show the current orders for user','','My Orders','2015-05-21 06:21:00','2015-05-21 06:21:00',NULL,'orders',4);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus_roles`
--

DROP TABLE IF EXISTS `menus_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus_roles` (
  `menu_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`,`role_id`),
  KEY `menus_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `menus_roles_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  CONSTRAINT `menus_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_roles`
--

LOCK TABLES `menus_roles` WRITE;
/*!40000 ALTER TABLE `menus_roles` DISABLE KEYS */;
INSERT INTO `menus_roles` VALUES (1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(5,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(5,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(6,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(6,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(6,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(7,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(7,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(7,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(8,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(8,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(8,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(9,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(9,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(9,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `menus_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_04_10_195210_create_users_table',1),('2015_04_13_051242_create_password_reminders_table',1),('2015_04_13_051841_create_session_table',1),('2015_04_16_184110_create_roles_table',4),('2015_04_16_184130_create_user_role_table',4),('2015_04_16_184151_create_menus_table',5),('2015_04_16_184201_create_menus_roles_table',5),('2015_04_22_012711_update_menu_table',6),('2015_05_04_153025_update_menu_table_order',7),('2015_05_04_221703_actions',8),('2015_05_04_221715_actions_roles',8),('2015_05_04_221740_profile',8),('2015_05_04_221750_marks',8),('2015_05_04_221756_products',8),('2015_05_04_222127_category',8),('2015_05_04_222137_products_category',9),('2015_05_04_222156_oders',9),('2015_05_04_222235_oders_detail',9),('2015_05_04_222315_dispatch',9),('2015_05_04_222337_inventories',9),('2015_05_04_223811_reserve_inventory',10),('2015_05_06_023324_admin_menus',11),('2015_05_07_142530_movements_types',12),('2015_05_07_142832_inventory_movements',12),('2015_05_06_221715_actions_roles',13),('2015_05_04_222315_dispatch_table',14),('2015_05_04_222337_inventoriesMigration',15),('2015_05_04_223811_reserve_inventory_table',16),('2015_05_13_004405_change_admin_menus',17),('2016_01_11_180354_create_shop_table',18),('2016_01_11_180355_create_warehouse_table',19),('2016_01_11_182006_create_admin_user_module_acion_table',20),('2016_01_11_182307_create_invoices_table',21),('2016_01_11_182337_create_possitions_page_table',21),('2016_01_11_182338_create_index_content_table',22),('2016_01_11_184112_create_shop_users_assigment_table',23),('2016_01_11_184505_create_product_info_table',24),('2016_01_11_195307_create_about_page_table',24),('2016_01_11_195907_update_inventory_table',24),('2016_01_11_210124_invoice_detail_table',25),('2016_01_11_211013_client_info_detail_table',25),('2016_01_11_212734_update_dispatch_info_detail_table',26),('2016_01_11_214421_update_product_info_detail_table',26);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movements_type`
--

DROP TABLE IF EXISTS `movements_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movements_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `movements_type_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movements_type`
--

LOCK TABLES `movements_type` WRITE;
/*!40000 ALTER TABLE `movements_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `movements_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (9,1,'2015-05-21 00:00:00',160.00,'2015-05-21 08:09:31','2015-05-21 08:09:31',NULL),(10,1,'2015-05-21 00:00:00',110.00,'2015-05-21 08:10:36','2015-05-21 08:10:36',NULL),(11,1,'2015-05-21 02:10:51',100.00,'2015-05-21 08:10:51','2015-05-21 08:10:51',NULL),(13,1,'2015-05-21 02:32:39',180.00,'2015-05-21 08:32:39','2015-05-21 08:32:39',NULL),(15,6,'2015-05-21 02:59:45',60.00,'2015-05-21 08:59:45','2015-05-21 08:59:45',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders_details`
--

DROP TABLE IF EXISTS `orders_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_details_order_id_foreign` (`order_id`),
  KEY `orders_details_product_id_foreign` (`product_id`),
  CONSTRAINT `orders_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `orders_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders_details`
--

LOCK TABLES `orders_details` WRITE;
/*!40000 ALTER TABLE `orders_details` DISABLE KEYS */;
INSERT INTO `orders_details` VALUES (13,9,'101-0050',2,100.00,'2015-05-21 08:09:31','2015-05-21 08:09:31',NULL),(14,9,'101-0050',1,10.00,'2015-05-21 08:09:31','2015-05-21 08:09:31',NULL),(15,9,'101-0050',1,50.00,'2015-05-21 08:09:31','2015-05-21 08:09:31',NULL),(16,10,'101-0050',1,50.00,'2015-05-21 08:10:36','2015-05-21 08:10:36',NULL),(17,10,'101-0050',1,10.00,'2015-05-21 08:10:36','2015-05-21 08:10:36',NULL),(18,10,'101-0050',1,50.00,'2015-05-21 08:10:36','2015-05-21 08:10:36',NULL),(19,11,'101-0050',1,50.00,'2015-05-21 08:10:51','2015-05-21 08:10:51',NULL),(20,11,'101-0050',1,50.00,'2015-05-21 08:10:51','2015-05-21 08:10:51',NULL),(21,13,'101-0050',1,120.00,'2015-05-21 08:32:39','2015-05-21 08:32:39',NULL),(22,13,'101-0050',1,10.00,'2015-05-21 08:32:39','2015-05-21 08:32:39',NULL),(23,13,'101-0050',1,50.00,'2015-05-21 08:32:39','2015-05-21 08:32:39',NULL),(27,15,'101-0050',1,50.00,'2015-05-21 08:59:45','2015-05-21 08:59:45',NULL),(28,15,'101-0050',1,10.00,'2015-05-21 08:59:45','2015-05-21 08:59:45',NULL);
/*!40000 ALTER TABLE `orders_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions_page`
--

DROP TABLE IF EXISTS `positions_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions_page`
--

LOCK TABLES `positions_page` WRITE;
/*!40000 ALTER TABLE `positions_page` DISABLE KEYS */;
/*!40000 ALTER TABLE `positions_page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `mark` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `image` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`code`),
  KEY `products_mark_foreign` (`mark`),
  CONSTRAINT `products_mark_foreign` FOREIGN KEY (`mark`) REFERENCES `marks` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('101-0050','101','Short Earring',50.00,'2015-05-20 22:08:21','2015-05-20 22:08:21',NULL,'/home/elioth010/PHPWorkspace/carretilla_online/public/web/images/product/aretecorto.png'),('101-1001','101','Large Blue Earrings',10.00,'2015-05-20 20:23:11','2015-05-20 21:11:06',NULL,'/home/elioth010/PHPWorkspace/carretilla_online/public/web/images/product/blue-topaz-and-diamond-earrings-280-p.jpg'),('101-1010','101','Blue Scarves',50.00,'2015-05-20 22:02:54','2015-05-20 22:04:14',NULL,'/home/elioth010/PHPWorkspace/carretilla_online/public/web/images/product/budanda azul.jpg'),('202-1000','202','Space Moon',120.00,'2015-05-21 08:32:25','2015-05-21 08:32:25',NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_category`
--

DROP TABLE IF EXISTS `products_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_category` (
  `product_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `products_category_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `products_category_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_category`
--

LOCK TABLES `products_category` WRITE;
/*!40000 ALTER TABLE `products_category` DISABLE KEYS */;
INSERT INTO `products_category` VALUES ('101-0050',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),('101-1001',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),('101-1010',2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),('202-1000',3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `products_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_informations`
--

DROP TABLE IF EXISTS `products_informations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_informations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_informations_product_id_foreign` (`product_id`),
  KEY `products_informations_order_id_foreign` (`order_id`),
  KEY `products_informations_shop_id_foreign` (`shop_id`),
  KEY `products_informations_user_id_foreign` (`user_id`),
  CONSTRAINT `products_informations_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `products_informations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`code`),
  CONSTRAINT `products_informations_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `products_informations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_informations`
--

LOCK TABLES `products_informations` WRITE;
/*!40000 ALTER TABLE `products_informations` DISABLE KEYS */;
/*!40000 ALTER TABLE `products_informations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `address1` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  `country` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `departament` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `town` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_user_id_foreign` (`user_id`),
  CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserve_inventories`
--

DROP TABLE IF EXISTS `reserve_inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserve_inventories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `stocks` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reserve_inventories_product_id_foreign` (`product_id`),
  KEY `reserve_inventories_order_id_foreign` (`order_id`),
  CONSTRAINT `reserve_inventories_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `reserve_inventories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserve_inventories`
--

LOCK TABLES `reserve_inventories` WRITE;
/*!40000 ALTER TABLE `reserve_inventories` DISABLE KEYS */;
/*!40000 ALTER TABLE `reserve_inventories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'guest','Provide a basic navigation','2015-04-22 09:38:45','2015-04-22 09:38:45',NULL),(2,'admin','Provide an administration option','2015-04-22 09:38:45','2015-04-22 09:38:45',NULL),(3,'user','Provide a complex user navigation','2015-04-22 09:38:45','2015-04-22 09:38:45',NULL),(4,'master','Provide a complete acccess to navigations levels','2015-04-22 09:38:45','2015-04-22 09:38:45',NULL),(5,'test','this is a role of test','2015-05-13 08:28:35','2015-05-13 08:28:35',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  UNIQUE KEY `sessions_id_unique` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shops_id_code_unique` (`id`,`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'master','$2y$10$3DqJACDGPTsOPuFThLlAm.W9s4mY1lNTap0CJUAU6yzny95gLxBW6','klank4135@gmail.com','Alexander Morales',30,NULL,'2015-04-13 11:20:17','2015-05-05 03:20:45',NULL),(3,'erivera','$2y$10$9tEpluwIE6qfk8txzd..meSwdCV3NTlxEtdIN7/15EJIUSUdRDUme','elioth010@gmail.com','Elioth Rivera',20,NULL,'2015-05-05 03:07:06','2015-05-05 03:07:06',NULL),(4,'morozco','$2y$10$g.Xe94TPWpKyxz/alDY8NO9R0ZKGRBzcXN/oyZZ4a/A7LFGbGTA9a','morozco@gmail.com','Magno Orozco',20,NULL,'2015-05-13 07:13:22','2015-05-13 07:13:22',NULL),(5,'arivera','$2y$10$7z.tRnBfVEUkao9SN.NH8OK79R0wmgw9yuBs8c0oEy3VZxfUn.wvO','arivera@domain.com','Alfredy Rivera',20,NULL,'2015-05-21 08:12:14','2015-05-21 08:12:14',NULL),(6,'prueba','$2y$10$mjCPdk02qYh6KogmPa0tvO4hrJugc6MpVV8rdbejJQXaYwSQyacpC','prueba@example.com','Prueba Prueba',100,NULL,'2015-05-21 08:58:13','2015-05-21 08:58:13',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `users_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(1,4,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,2,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(4,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(5,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(6,3,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_shops`
--

DROP TABLE IF EXISTS `users_shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_shops` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_shops_user_id_foreign` (`user_id`),
  KEY `users_shops_shop_id_foreign` (`shop_id`),
  CONSTRAINT `users_shops_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  CONSTRAINT `users_shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_shops`
--

LOCK TABLES `users_shops` WRITE;
/*!40000 ALTER TABLE `users_shops` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `shop_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `warehouses_name_unique` (`name`),
  KEY `warehouses_shop_id_foreign` (`shop_id`),
  CONSTRAINT `warehouses_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-25 20:02:28
