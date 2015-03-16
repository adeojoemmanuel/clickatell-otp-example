CREATE TABLE IF NOT EXISTS `clickatell_otp`.`users` (
  `idusers` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `secret` VARCHAR(256) NULL,
  PRIMARY KEY (`idusers`))
ENGINE = InnoDB;

INSERT INTO users (username, password, phone, email)
VALUES ('YourUsername',  MD5('test123'), 'Your International number without the plus(+) sign', 'youremail@example.com');