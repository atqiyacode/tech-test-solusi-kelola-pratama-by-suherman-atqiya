-- MySQL dump 10.13  Distrib 8.0.25, for macos11 (x86_64)
--
-- Host: 139.59.124.6    Database: sip_test
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.34-MariaDB-0ubuntu0.20.04.1

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
-- Table structure for table `service_details`
--

DROP TABLE IF EXISTS `service_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_id` bigint(20) NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandatory` tinyint(1) NOT NULL,
  `sequence` bigint(20) NOT NULL,
  `parent` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_multiple` tinyint(1) NOT NULL,
  `remark` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_details`
--

LOCK TABLES `service_details` WRITE;
/*!40000 ALTER TABLE `service_details` DISABLE KEYS */;
INSERT INTO `service_details` VALUES (1,2,'parent','TTD Perjanjian',0,1,'0','text',0,NULL,'ACTIVE','6',NULL,'2021-10-26 03:55:04',NULL,NULL),(2,2,'child','D-004B-1 Perjanjian Pembelian dengan Pembayaran secara Angsuran (Bermaterai)',1,2,'1','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 03:55:04',NULL,NULL),(3,2,'child','D-004B-2 Struktur Perjanjian Pembelian dengan Pembayaran secara Angsuran',1,3,'1','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 03:57:04',NULL,NULL),(4,2,'child','D-025 Surat Permohonan Debitur',1,4,'1','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 03:58:37',NULL,NULL),(5,2,'child','F-024A / F-024E Tanda terima BPKB',1,5,'1','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 03:59:24',NULL,NULL),(6,2,'child','F-002 Formulir Permohonan Pembiayaan',1,6,'1','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 03:59:53',NULL,NULL),(7,2,'child','D-041 Surat Kuasa Pembebanan Jaminan Fidusia (Bermaterai)',1,7,'1','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:00:31',NULL,NULL),(8,2,'child','D-079 Surat Pernyataan Asuransi Jiwa',1,8,'1','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:01:31',NULL,NULL),(9,2,'child','Kwitansi',1,9,'1','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:02:01',NULL,NULL),(10,2,'parent','Dokumen Kondisional',0,2,'0','text',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:02:01',NULL,NULL),(11,2,'child','D-012 Jaminan Penanggungan Hutang (Personal Guarantee)',0,11,'10','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:02:54',NULL,NULL),(12,2,'child','D-012B Jaminan Pembayaran (Payment Guarantee)',0,12,'10','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:03:42',NULL,NULL),(13,2,'child','D-018B Surat Pernyataan & Persetujuan Pasangan',0,13,'10','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:04:14',NULL,NULL),(14,2,'child','D-045 Surat Pernyataan Beda Data di Identitas',0,14,'10','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(15,3,'parent','BPKB',0,1,'0','text',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(16,3,'child','Cek Kondisi Fisik BPKB (Dipastikan sampul BPKB dan kertas BPKB tidak rusak) ',1,2,'15','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(17,3,'child','Melakukan Senter Sinar UV Pada BPKB (Watermark dan Benang Pengaman)',1,3,'15','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(18,3,'child','Mengecek Nama BPKB dengan STNK',1,4,'15','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(19,3,'child','Mengecek Nama STNK dengan KTP Debitur/Pasangan',1,5,'15','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(20,3,'child','Mengecek No. Rangka di BPKB dengan di Motor',1,6,'15','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(21,3,'child','Mengecek No. Mesin di BPKB dengan di Motor',1,7,'15','checkbox',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(22,1,'parent','Foto Persyaratan',0,1,'0','text',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(23,1,'child','Silahkan selesaikan Pengerjaan Service Pickers ini dengan melengkapi foto-foto yang ada di bawah ini, foto harus jernih & dapat terbaca tulisannya.',0,2,'22','text',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(24,1,'parent','Foto Konsumen dan Kebutuhan Data Konsumen',0,2,'0','text',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(25,1,'child','Foto Debitur saat sedang TTD Dokumen (Tanpa Masker)',1,2,'24','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(26,1,'child','Foto Pasangan Debitur (Suami/Istri) saat sedang TTD Dokumen (Tanpa Masker)',0,3,'24','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(27,1,'child','Foto Bagian Depan Buku Tabungan terlihat No. Rekening',0,4,'24','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(28,1,'child','Foto Token Listrik/Struk Pembayaran Listrik/Screenshoot Pembayaran Listrik Satu Bulan Terakhir',0,5,'24','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(29,1,'child','Foto KTP Debitur & Pasangan ',1,6,'24','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(30,1,'child','Foto Kartu Keluarga',1,7,'24','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(31,1,'child','Foto BPKB',0,8,'24','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(32,1,'child','Foto Slip Gaji/Screenshoot Slip Gaji',0,9,'24','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(33,1,'parent','Foto Kendaraan & Surat Kendaraan',0,3,'0','text',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(34,1,'child','Foto Selfie Pikers dengan Unit Agunan',0,2,'33','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(35,1,'child','Foto No. Rangka Unit',0,3,'33','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(36,1,'child','Foto No. Mesin Unit',0,4,'33','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(37,1,'child','Foto Motor Serong Kanan (Terlihat plat no depan)',0,5,'33','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(38,1,'child','Foto Motor Serong Kiri (Terlihat plat no belakang)',0,6,'33','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(39,1,'child','Foto STNK',0,7,'33','photo',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(40,1,'child','Foto Kondisi Kendaraan Yang Rusak',0,8,'33','photo',1,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(41,1,'parent','Video Kendaraan',0,4,'0','text',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL),(42,1,'child','Upload Video dengan durasi maksimal 10 detik dengan kondisi mesin menyala',0,2,'41','video',0,NULL,'ACTIVE','6',NULL,'2021-10-26 04:21:39',NULL,NULL);
/*!40000 ALTER TABLE `service_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_headers`
--

DROP TABLE IF EXISTS `service_headers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_headers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mandatory` tinyint(1) NOT NULL,
  `package_id` bigint(20) NOT NULL,
  `debitur_type_id` bigint(20) NOT NULL,
  `service_price_amount` decimal(17,2) NOT NULL DEFAULT 0.00,
  `service_discount_amount` decimal(17,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_headers`
--

LOCK TABLES `service_headers` WRITE;
/*!40000 ALTER TABLE `service_headers` DISABLE KEYS */;
INSERT INTO `service_headers` VALUES (1,'Foto Persyaratan',1,1,1,20000.00,6500.00,'ACTIVE','6',NULL,'2021-10-27 07:57:12','2021-10-27 14:57:12',NULL),(2,'Tanda Tangan Perjanjian',1,1,1,20000.00,0.00,'ACTIVE','6',NULL,'2021-11-01 07:15:28',NULL,NULL),(3,'BPKB Kendaraan',1,1,1,20000.00,2000.00,'ACTIVE','6',NULL,'2021-11-01 07:49:24',NULL,NULL);
/*!40000 ALTER TABLE `service_headers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sip_test'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-22 20:10:16
