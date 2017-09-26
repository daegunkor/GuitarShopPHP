-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: ldg_db
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `buylist`
--

DROP TABLE IF EXISTS `buylist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buylist` (
  `id` char(20) DEFAULT NULL,
  `num` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buylist`
--

LOCK TABLES `buylist` WRITE;
/*!40000 ALTER TABLE `buylist` DISABLE KEYS */;
INSERT INTO `buylist` VALUES ('test2',13);
/*!40000 ALTER TABLE `buylist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `num` int(10) unsigned NOT NULL,
  `title` char(40) NOT NULL,
  `name` text NOT NULL,
  `content` text,
  `price` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `regist_day` char(20) NOT NULL,
  `id` char(20) DEFAULT NULL,
  `nick` char(20) DEFAULT NULL,
  `mainImg` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'Sings Guitar * 특가 판매','Stings Guitar','<p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>&nbsp;해외 직수한 Stings Guitar 입니다 ㅎㅎ</p><p>&nbsp;상품 품질은 보장하니 안심하고 구매하셔도 됩니다.</p><p><br></p><p>&nbsp; <img width=\"410\" height=\"322\" style=\"width: 327px; height: 278px;\" src=\"http://localhost/ownsite/menus/buying/uploads/goodsData/1/img/image5.jpg\"></p><p>&nbsp;</p>&nbsp; <img width=\"486\" height=\"323\" style=\"width: 504px; height: 365px;\" src=\"./uploads/goodsData/1/img/image7.jpg\">',380000,10,'2016-12-13 00:58:39','test1','일번닉네임','image5.jpg'),(2,'해외 직송 기타 [premium]','해외 직송 기타','<p><br></p><p>&nbsp; 이러쿵 저러쿵 </p>',220000,8,'2016-12-13 01:06:49','test1','일번닉네임','guitar2.jpg'),(3,'해외 직송 기타 [premium]','슈퍼 기타','<p><br></p><p><br></p><p><br></p><p>&nbsp; </p><p><img src=\"./uploads/goodsData/3/img/image2.jpg\"></p><p><br></p><p>&nbsp;해외 직송해서 최소한의 가격을 잡았습니다.</p><p>&nbsp;제품 품질은 의심하지 않고 구매하셔도 좋습니다.</p>',390000,15,'2016-12-13 01:09:00','test1','일번닉네임','guitar3.jpg'),(4,'해외 직송 기타 [premium]','좋은 기타','<p><br><img src=\"./uploads/goodsData/4/img/image7.jpg\"></p><p><br></p><p>&nbsp;해외 직송해서 최소한의 가격을 잡았습니다.</p><p>&nbsp;제품 품질은 의심하지 않고 구매하셔도 좋습니다.<br></p>',350000,5,'2016-12-13 01:11:06','test1','일번닉네임','image6.jpg'),(5,'해외 직송 기타 [premium]','킹왕짱 기타','<p><br><img src=\"./uploads/goodsData/5/img/image3.jpg\"></p><p>&nbsp;해외 직송해서 최소한의 가격을 잡았습니다.</p><p>&nbsp;제품 품질은 의심하지 않고 구매하셔도 좋습니다.<br></p>',990000,99,'2016-12-13 01:12:09','test1','일번닉네임','image1.jpg'),(6,'해외 직송 기타 [premium]','짱짱 기타','<p>&nbsp;해외 직송해서 최소한의 가격을 잡았습니다.</p><p>&nbsp;제품 품질은 의심하지 않고 구매하셔도 좋습니다.</p><img src=\"./uploads/goodsData/6/img/image3.jpg\">',100000,10,'2016-12-13 01:12:49','test1','일번닉네임','image5.jpg'),(7,'해외 직송 기타 [premium]','기타 33','<p><br><img src=\"./uploads/goodsData/7/img/image2.jpg\"></p><p>&nbsp;해외 직송해서 최소한의 가격을 잡았습니다.</p><p>&nbsp;제품 품질은 의심하지 않고 구매하셔도 좋습니다.<br></p><p><br></p>',130000,134,'2016-12-13 01:14:37','test1','일번닉네임','image7.jpg'),(8,'해외 직송 기타 [premium]','슈퍼 기타','<p><br><img width=\"285\" height=\"161\" style=\"width: 370px; height: 275px;\" src=\"./uploads/goodsData/8/img/guitar3.jpg\"></p><p><br></p><p><br>&nbsp;해외 직송해서 최소한의 가격을 잡았습니다.</p><p>&nbsp;제품 품질은 의심하지 않고 구매하셔도 좋습니다.<br></p>',88,880000,'2016-12-13 01:22:09','test1','일번닉네임','guitar3.jpg'),(9,'해외 직송 기타 [premium]','슈퍼기타','<p><br><img src=\"./uploads/goodsData/9/img/image2.jpg\"></p><p>&nbsp;해외 직송해서 최소한의 가격을 잡았습니다.</p><p>&nbsp;제품 품질은 의심하지 않고 구매하셔도 좋습니다.<br></p>',990000,123,'2016-12-13 01:22:46','test1','일번닉네임','image1.jpg'),(10,'* 최저가 급매 * Stings Guitar','스팅스기타','<p><br><img src=\"./uploads/goodsData/10/img/image3.jpg\"></p><p><br></p><p>&nbsp;해외 직송해서 최소한의 가격을 잡았습니다.</p><p>&nbsp;제품 품질은 의심하지 않고 구매하셔도 좋습니다.<br></p>',895000,55,'2016-12-13 01:23:55','test1','일번닉네임','guitar2.jpg'),(11,'* 저도 기타 한번 올려봐요 ㅜㅜ','super Guitar','<p><br><img src=\"./uploads/goodsData/11/img/image4.jpg\"></p><p><br></p><p>&nbsp;할아버지가 물려주신 기타예요 ㅜㅜ</p><p><br></p><p>&nbsp; 이별하긴 아쉽지만 용돈이 모자라서 팝니다</p><p><img src=\"./uploads/goodsData/11/img/guitar2.jpg\">ㄴ</p><p><br></p><p>ㅁㄴㅇㅁㄴㅇㅁㄴ</p>',990000,1313,'2016-12-13 01:33:56','test2','일번닉네임','guitar1.jpg'),(12,'[ 초 특가 매매 ] Super Guitar','Super Guitar','<p><br></p><p><br></p><p>&nbsp;&nbsp; </p><p><img src=\"./uploads/goodsData/12/img/image2.jpg\"></p><p><br></p><p>으엄청난 기타를 으엄청난 가격에!!!</p>',550000,100,'2016-12-13 01:35:09','test2','일번닉네임','image6.jpg'),(13,'[ 초 특가 매매 ] Super Guitar','Super Guitar','<p><br><img src=\"./uploads/goodsData/13/img/image2.jpg\"></p><p><br></p><p>&nbsp;으엄청난 기타다!!</p>',99000,999,'2016-12-13 01:35:52','test2','일번닉네임','guitar3.jpg');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goodsreview`
--

DROP TABLE IF EXISTS `goodsreview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goodsreview` (
  `parent` int(11) DEFAULT NULL,
  `content` text,
  `regist_day` char(20) NOT NULL,
  `id` char(20) DEFAULT NULL,
  `nick` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goodsreview`
--

LOCK TABLES `goodsreview` WRITE;
/*!40000 ALTER TABLE `goodsreview` DISABLE KEYS */;
INSERT INTO `goodsreview` VALUES (7,'제가 제글에 댓글도 달아봅니다 ㅎㅎ','2016-12-13 01:36:25','test2','일번닉네임'),(13,'ㅎㅎㅎ','2016-12-13 01:36:51','test2','일번닉네임');
/*!40000 ALTER TABLE `goodsreview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qboardanswer`
--

DROP TABLE IF EXISTS `qboardanswer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qboardanswer` (
  `parent` int(11) DEFAULT NULL,
  `title` char(40) NOT NULL,
  `content` text,
  `regist_day` char(20) NOT NULL,
  `id` char(20) DEFAULT NULL,
  `nick` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qboardanswer`
--

LOCK TABLES `qboardanswer` WRITE;
/*!40000 ALTER TABLE `qboardanswer` DISABLE KEYS */;
INSERT INTO `qboardanswer` VALUES (1,'신기해라','제가 제 글에 댓글도 다네요 ㅎㅎ','2016-12-12 17:22:54','test1','일번닉네임'),(24,'제가 제글에 답변을답니다 ㅜㅜ','   ㅜㅜㅜ','2016-12-13 01:43:04','test1','일번닉네임');
/*!40000 ALTER TABLE `qboardanswer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qboardquestion`
--

DROP TABLE IF EXISTS `qboardquestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qboardquestion` (
  `num` int(10) unsigned NOT NULL,
  `title` char(40) NOT NULL,
  `content` text,
  `regist_day` char(20) NOT NULL,
  `hit` int(11) DEFAULT NULL,
  `id` char(20) DEFAULT NULL,
  `nick` char(20) DEFAULT NULL,
  `norFile` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qboardquestion`
--

LOCK TABLES `qboardquestion` WRITE;
/*!40000 ALTER TABLE `qboardquestion` DISABLE KEYS */;
INSERT INTO `qboardquestion` VALUES (1,'기타 치는 자세좀 봐주세요','<p><br><img width=\"486\" height=\"324\" style=\"width: 288px; height: 183px;\" src=\"./uploads/questionData/1/img/image7.jpg\"></p><p><br></p><p>이렇게 치면 될까요? </p><p><br></p><p>내용내용내용</p><p>내용내용내용</p><p>내용내용내용</p><p>내용내용내용</p><p>내용내용내용</p><p>내용내용내용</p><p>내용내용내용</p><p>내용내용내용</p>','2016-12-12 17:22:18',5,'test1','일번닉네임','image7.jpg'),(2,'첨부파일 안올리면 디스크가 없어지네요!','<p><br><img src=\"./uploads/questionData/2/img/image1.jpg\"></p><p><br></p><p>&nbsp;신기해라 !ㅎㅎ</p>','2016-12-13 01:38:25',1,'test1','일번닉네임',''),(3,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:38:50',0,'test1','일번닉네임',''),(4,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:38:56',0,'test1','일번닉네임',''),(5,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:39:02',0,'test1','일번닉네임',''),(6,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:39:09',0,'test1','일번닉네임',''),(7,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:39:15',0,'test1','일번닉네임',''),(8,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:39:20',0,'test1','일번닉네임',''),(9,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:39:27',0,'test1','일번닉네임',''),(10,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:39:33',0,'test1','일번닉네임',''),(11,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:39:40',0,'test1','일번닉네임',''),(12,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:39:54',0,'test1','일번닉네임',''),(13,'첨부파일 안올리면 디스크가 없어지네요!','신기해라!','2016-12-13 01:40:00',0,'test1','일번닉네임',''),(14,'첨부파일 안올리면 디스크가 없어지네요!','ㅁㄴㅇ','2016-12-13 01:40:22',0,'test1','일번닉네임',''),(15,'첨부파일 안올리면 디스크가 없어지네요!','ㅁㄴㅇ','2016-12-13 01:40:26',0,'test1','일번닉네임',''),(16,'첨부파일 안올리면 디스크가 없어지네요!','ㅁㄴㅇ','2016-12-13 01:40:31',0,'test1','일번닉네임',''),(17,'첨부파일 안올리면 디스크가 없어지네요!','ㅁㄴㅇ','2016-12-13 01:40:36',0,'test1','일번닉네임',''),(18,'첨부파일 안올리면 디스크가 없어지네요!','ㅁㄴㅇ','2016-12-13 01:40:41',0,'test1','일번닉네임',''),(19,'첨부파일 안올리면 디스크가 없어지네요!','ㅁㄴㅇ','2016-12-13 01:40:46',0,'test1','일번닉네임',''),(20,'첨부파일 안올리면 디스크가 없어지네요!','ㅁㄴㅇ','2016-12-13 01:40:50',1,'test1','일번닉네임',''),(21,'첨부파일 안올리면 디스크가 없어지네요!','ㅁㄴㅇ','2016-12-13 01:40:54',0,'test1','일번닉네임',''),(22,'게시글이 삭제 수정이 되는군요 ㅎㅎ','<p><br><img src=\"./uploads/questionData/22/img/guitar1.jpg\"></p><p><br></p><p>ㅎㅎ</p>','2016-12-13 01:41:30',1,'test1','일번닉네임',''),(23,'게시글 내용에 이미지를 첨부 할 수 있네요!','<p><br><img src=\"./uploads/questionData/23/img/image1.jpg\"></p><p><br></p><p>&nbsp;블로깅도 가능할듯 ㅎㅎ</p>','2016-12-13 01:42:18',1,'test1','일번닉네임','image4.jpg'),(24,'답변좀 달아주세요 ㅜㅜ','<p>&nbsp; ㅇ<img src=\"./uploads/questionData/24/img/image2.jpg\"></p><p>&nbsp; 외로워요 ㅜㅜ</p>','2016-12-13 01:42:51',2,'test1','일번닉네임',''),(25,'페이징 기능도 있구요 ㅎㅎ','ㅎㅎ','2016-12-13 01:43:34',1,'test1','일번닉네임',''),(26,'아이디 별로 게시글, 댓글에 대한 권한이 다르군요!','&nbsp; 아하!<img src=\"./uploads/questionData/26/img/image7.jpg\">','2016-12-13 01:44:15',1,'test2','일번닉네임','');
/*!40000 ALTER TABLE `qboardquestion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` char(20) DEFAULT NULL,
  `password` char(20) DEFAULT NULL,
  `name` char(20) DEFAULT NULL,
  `nick` char(20) DEFAULT NULL,
  `hp` char(20) DEFAULT NULL,
  `email` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('test1','1234','일번이름','일번닉네임','010-1111-1111','email1@naver.com'),('test2','1234','일번이름','일번닉네임','010-2222-2222','email2@naver.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlist` (
  `id` char(20) DEFAULT NULL,
  `num` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-13  9:57:03
