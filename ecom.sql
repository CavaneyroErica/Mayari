

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `cartinfo` (
  `idno` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `usermessage` (
  `idno` int(100) NOT NULL,
  `user_idno` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `contact_num` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `orderinfo` (
  `idno` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `paymethod` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placeorder` varchar(50) NOT NULL,
  `prodreview` varchar(500) NOT NULL,
  `paystatus` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `productinfo` (
  `idno` int(100) NOT NULL,
  `prodname` varchar(100) NOT NULL,
  `proddesc` varchar(300) NOT NULL,
  `prodtype` varchar(50) NOT NULL,
  `prodprice` int(100) NOT NULL,
  `prod_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `userinfo` (
  `idno` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `useremail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `cartinfo`
  ADD PRIMARY KEY (`idno`);

ALTER TABLE `usermessage`
  ADD PRIMARY KEY (`idno`);


ALTER TABLE `orderinfo`
  ADD PRIMARY KEY (`idno`);


ALTER TABLE `productinfo`
  ADD PRIMARY KEY (`idno`);


ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`idno`);


ALTER TABLE `cartinfo`
  MODIFY `idno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;


ALTER TABLE `usermessage`
  MODIFY `idno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `orderinfo`
  MODIFY `idno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `productinfo`
  MODIFY `idno` int(100) NOT NULL AUTO_INCREMENT;


ALTER TABLE `userinfo`
  MODIFY `idno` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

