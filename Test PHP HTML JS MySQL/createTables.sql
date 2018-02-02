CREATE TABLE User (
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(15) NOT NULL,
  last_name VARCHAR(15) NOT NULL,
  birth_date DATE  NOT NULL
);

CREATE TABLE Address (
  id INT(6) AUTO_INCREMENT PRIMARY KEY,
  zip MEDIUMINT NOT NULL,
  city VARCHAR(50) NOT NULL,
  street VARCHAR(50) NOT NULL,
  house VARCHAR(6) NOT NULL
);

CREATE TABLE UsersAddress (
    id  INT(6) AUTO_INCREMENT PRIMARY KEY,
    id_user INT(6) NOT NULL,
    id_address INT(6) NOT NULL
);

INSERT INTO `Address` (`zip`, `city`, `street`, `house`)
VALUES ('1111', 'Kharkov', 'Sumskaya', '129'),
       ('123123', 'Kharkov', 'Nauki', '19'),
       ('555555', 'Kharkov', 'Pobedy', '87'),
       ('888888', 'Kharkov', 'Klochkovskaya', '185');

INSERT INTO `user` (`first_name`, `last_name`, `birth_date`)
VALUES ('Kate', 'Volkova', '1987-07-14'),
       ('Denis', 'Petrov', '1956-05-24'),
       ('Irina', 'Ivanova', '1997-05-04'),
       ('Oleg', 'Vasiliev', '1990-10-16');

ALTER TABLE `UsersAddress`
ADD FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

ALTER TABLE `UsersAddress`
ADD FOREIGN KEY (`id_address`) REFERENCES `address` (`id`);

INSERT INTO `usersaddress` (`id_user`, `id_address`)
VALUES ('1', '2'), ('2', '1'), ('3', '3'), ('4', '4');

SELECT * FROM User JOIN UsersAddress ON User.id = UsersAddress.id_user 
JOIN Address ON UsersAddress.id_address = Address.id
WHERE Timestampdiff(year,User.birth_date, now())>22;;

