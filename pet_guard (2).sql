-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-12-10 06:30
-- 서버 버전: 10.4.22-MariaDB
-- PHP 버전: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `pet_guard`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `members`
--

CREATE TABLE `members` (
  `num` int(11) NOT NULL,
  `id` char(15) NOT NULL,
  `pass` char(15) NOT NULL,
  `name` char(10) NOT NULL,
  `email` char(80) DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `tag_name` varchar(20) NOT NULL,
  `state` char(10) NOT NULL,
  `level` int(11) NOT NULL,
  `last_position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `members`
--

INSERT INTO `members` (`num`, `id`, `pass`, `name`, `email`, `type`, `tag_name`, `state`, `level`, `last_position`) VALUES
(34, '이재윤', '1234', '이재윤', 'dlwodbs2005@naver.com', '권기문', 'YNC_1505067', 'O', 1, 'NO_CHECK'),
(35, '홍길동', '1234', '홍길동', 'honggilldong@naver.com', '댕댕쓰', 'template_001', 'O', 9, 'NO_CHECK'),
(36, '신사임당', '1234', '신사임당', 'OHMANWON@naver.com', '굴렁이', '154156237128', 'X', 9, 'YNC디컨실'),
(37, 'kim1', '1234', '김하나', 'kim1@naver.com', '강하나', 'template_003', 'O', 9, 'NO_CHECK'),
(38, 'kim2', '1234', '김둘', 'kim2@naver.com', '강둘', '204696999', 'X', 9, 'YNC디컨실'),
(39, 'kim3', '1234', '김셋', 'kim3@naver.com', '강셋', 'template_005', 'O', 9, 'NO_CHECK'),
(40, 'kim4', '1234', '김넷', 'kim4@naver.com', '강넷', '140637073', 'X', 9, 'NO_CHECK');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
