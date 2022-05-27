-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: tfg
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (46,'2014_10_12_000000_create_users_table',1),(47,'2014_10_12_100000_create_password_resets_table',1),(48,'2019_08_19_000000_create_failed_jobs_table',1),(49,'2019_12_14_000001_create_personal_access_tokens_table',1),(50,'2022_04_21_211751_create_usuarios_table',1),(51,'2022_05_15_192014_create_productos_table',2),(52,'2022_05_19_175321_create_usuario__pedidos_table',3),(53,'2022_05_19_175306_create_pedidos_table',4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `idPedido` bigint unsigned NOT NULL,
  `idProducto` bigint unsigned NOT NULL,
  `cantidad` int NOT NULL,
  `precio` double(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `pedidos_idpedido_foreign` (`idPedido`),
  KEY `pedidos_idproducto_foreign` (`idProducto`),
  CONSTRAINT `pedidos_idpedido_foreign` FOREIGN KEY (`idPedido`) REFERENCES `usuario__pedidos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pedidos_idproducto_foreign` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,15,2,25.10,NULL,NULL),(1,13,1,7.99,NULL,NULL),(1,1,1,2.50,NULL,NULL),(2,15,2,25.10,NULL,NULL),(2,4,1,3.00,NULL,NULL),(2,14,1,6.50,NULL,NULL),(3,13,2,15.98,NULL,NULL),(3,12,1,8.99,NULL,NULL),(3,4,1,3.00,NULL,NULL),(3,15,1,12.55,NULL,NULL),(3,1,1,2.50,NULL,NULL);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombreProducto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalles` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(5,2) NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idLocal` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productos_idlocal_foreign` (`idLocal`),
  CONSTRAINT `productos_idlocal_foreign` FOREIGN KEY (`idLocal`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Gofres','Gofres con sirope de chocolate y una bola de helado',2.50,'uploads/orYDzjzuXoXY6DPMxWBnJIJilwTdrk4G0VFXbABg.jpg',6,NULL,NULL),(4,'Crepes','Decoradas con nata y frutos del bosque',3.00,'uploads/ocC4uOGjrQ5VNvpyKBSbDNFU4TrUrJF0Jphphu8Q.jpg',6,NULL,NULL),(12,'Pizza carbonara','Tamaño mediano: champiñones, pollo, cebolla',8.99,'uploads/yBAd1GxBLUik6g0J9YEgbFb9TdUYGXk82iOuRSAB.png',6,NULL,NULL),(13,'Espaguetis con tomate','Con hojas de albahaca y queso de cabra',7.99,'uploads/AAqfmAAFfJ1D065FQ4yWP6G9MrEEYYdWnRbilaLP.png',6,NULL,NULL),(14,'Hamburguesa clásica','Lechuga, aros de cebolla, bacon y queso cheddar',6.50,'uploads/r7UOqWnOE45LcptqpWTIGPLB2sGyMsIswOHQICW1.png',6,NULL,NULL),(15,'Empanadas chinas','Empanadas rellenas de cerdo y acompañadas con salsa de soja',12.55,'uploads/tUd6NxtEVzuLdrLiLL0UDNzaeIhRnukEgm0F9txR.png',6,NULL,NULL),(16,'Empanadas chinas - Laravel','Empanadas rellenas de cerdo y acompañadas con salsa de soja',15.55,'uploads/tUd6NxtEVzuLdrLiLL0UDNzaeIhRnukEgm0F9txR.png',9,NULL,NULL),(17,'Hamburguesa clásica - Laravel','Lechuga, aros de cebolla, bacon y queso cheddar',15.50,'uploads/r7UOqWnOE45LcptqpWTIGPLB2sGyMsIswOHQICW1.png',9,NULL,NULL),(18,'Pollo asado','Mucho texto',8.00,'uploads/iNtsCAxuYNJhyQwQrPMIOyjEBbQM9iawO0BDKd5P.png',9,NULL,NULL),(19,'Crepes','Crepes con cosas',16.99,'uploads/sKCHdZfVp00BWNzHLPkSYhZK7cGzaNiIoO50e6Iv.jpg',10,NULL,NULL),(20,'Gofres','Más gofres',4.50,'uploads/UH9l1PzgaLezvLGr5yGRyYFcXbsEFgVeqUwDe30i.jpg',10,NULL,NULL),(21,'Pizza carbonara','Tamaño mediano: champiñones, pollo, cebolla',8.99,'uploads/yBAd1GxBLUik6g0J9YEgbFb9TdUYGXk82iOuRSAB.png',10,NULL,NULL),(22,'Espaguetis con tomate','Con hojas de albahaca y queso de cabra',7.99,'uploads/AAqfmAAFfJ1D065FQ4yWP6G9MrEEYYdWnRbilaLP.png',10,NULL,NULL),(23,'Empanadas chinas','Empanadas rellenas de cerdo y acompañadas con salsa de soja',12.55,'uploads/tUd6NxtEVzuLdrLiLL0UDNzaeIhRnukEgm0F9txR.png',10,NULL,NULL),(24,'Hamburguesa clásica','Lechuga, aros de cebolla, bacon y queso cheddar',6.50,'uploads/r7UOqWnOE45LcptqpWTIGPLB2sGyMsIswOHQICW1.png',10,NULL,NULL),(25,'Crepes','Decoradas con nata y frutos del bosque',3.00,'uploads/ocC4uOGjrQ5VNvpyKBSbDNFU4TrUrJF0Jphphu8Q.jpg',11,NULL,NULL),(26,'Espaguetis con tomate','Con hojas de albahaca y queso de cabra',7.99,'uploads/AAqfmAAFfJ1D065FQ4yWP6G9MrEEYYdWnRbilaLP.png',11,NULL,NULL),(27,'Empanadas chinas','Empanadas rellenas de cerdo y acompañadas con salsa de soja',12.55,'uploads/tUd6NxtEVzuLdrLiLL0UDNzaeIhRnukEgm0F9txR.png',11,NULL,NULL),(28,'Pollo asado','Mucho texto',8.00,'uploads/iNtsCAxuYNJhyQwQrPMIOyjEBbQM9iawO0BDKd5P.png',12,NULL,NULL),(29,'Empanadas chinas','Empanadas rellenas de cerdo y acompañadas con salsa de soja',12.55,'uploads/tUd6NxtEVzuLdrLiLL0UDNzaeIhRnukEgm0F9txR.png',12,NULL,NULL),(30,'Hamburguesa clásica','Lechuga, aros de cebolla, bacon y queso cheddar',6.50,'uploads/r7UOqWnOE45LcptqpWTIGPLB2sGyMsIswOHQICW1.png',12,NULL,NULL);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario__pedidos`
--

DROP TABLE IF EXISTS `usuario__pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario__pedidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario__pedidos_idusuario_foreign` (`idUsuario`),
  CONSTRAINT `usuario__pedidos_idusuario_foreign` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario__pedidos`
--

LOCK TABLES `usuario__pedidos` WRITE;
/*!40000 ALTER TABLE `usuario__pedidos` DISABLE KEYS */;
INSERT INTO `usuario__pedidos` VALUES (1,1,'2022-05-23 09:12:48',NULL),(2,1,'2022-05-23 09:13:18',NULL),(3,1,'2022-05-23 17:23:40',NULL);
/*!40000 ALTER TABLE `usuario__pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rolUsuario` int NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_correo_unique` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'paco','Cuenca','paco@paco.paco','2000-04-05','C/Paco cuenca','00','$2y$10$wp7H78799e5z.6gcKcerXuS48kBD9bEEf4lCbPga4UbFRbR4tzpVy',0,NULL,NULL,NULL),(6,'Restaurante flexbox','no','as@as.as','2022-05-02','C/Paco cuenca','600000000','$2y$10$VuEF/IKnmKJJZjCp1UqVve3lj6K6CnoU.gfcqMFw21j9kW1G8EG6W',1,'uploads/QMk1DATPNmH6QYQEC0aV6EHMiTmJn9k1JQvifAeh.jpg',NULL,NULL),(7,'Usuario','De prueba','aver@simemuero.com','1922-04-28','C/Alguna','600000000','$2y$10$hy99M3RHzBu/neb0/5KqGuv./cdPF7.XKYGs7Y0WOQnY4gepYXJ6.',0,'uploads/TcoIFdMQyTPBR16VnJeeakKkchkqXuSlkLDkV8nD.png',NULL,NULL),(8,'Jose','Vicario','9705@iespuertasdelcampo.es','1999-05-08','Evergreen terrace 742','600000000','$2y$10$wp7H78799e5z.6gcKcerXuS48kBD9bEEf4lCbPga4UbFRbR4tzpVy',2,NULL,NULL,NULL),(9,'Restaurante Laravel',NULL,'res@tau.com',NULL,'C/P.SHerman 42','900000000','$2y$10$wp7H78799e5z.6gcKcerXuS48kBD9bEEf4lCbPga4UbFRbR4tzpVy',1,'uploads/KybtIiR8IpoysX3n30UB4JRFjKlEORKfKLhF6KwB.jpg',NULL,NULL),(10,'Restaurante Grid',NULL,'restaurante@gmail.com',NULL,'C/P.SHerman 43','900000000','$2y$10$o18MSkAohPsyLi54rNXQ5eoR1riHHNJUfEaW14KhGxXN8X5J0Tp1u',1,'uploads/KybtIiR8IpoysX3n30UB4JRFjKlEORKfKLhF6KwC.jpg',NULL,NULL),(11,'Restaurante Docker',NULL,'restaurante@outlook.com',NULL,'C/P.SHerman 44','900000001','$2y$10$o18MSkAohPsyLi54rNXQ5eoR1riHHNJUfEaW14KhGxXN8X5J0Tp1u',1,'uploads/KybtIiR8IpoysX3n30UB4JRFjKlEORKfKLhF6KwD.jpg',NULL,NULL),(12,'Restaurante Ajax',NULL,'ajax@outlook.com',NULL,'C/P.SHerman 45','900000001','$2y$10$o18MSkAohPsyLi54rNXQ5eoR1riHHNJUfEaW14KhGxXN8X5J0Tp1u',1,'uploads/KybtIiR8IpoysX3n30UB4JRFjKlEORKfKLhF6KwE.jpg',NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-27 20:53:49
