# Deploy at GCP - Database 

## DB Process

After preparing database VM, please setup Mysql server. 

## Installation
sudo apt install default-mysql-server;

sudo mysql;

Create DB user:
```bash
CREATE USER 'db_conn'@'%' IDENTIFIED BY 'pass321';
GRANT ALL PRIVILEGES ON *.* TO 'db_conn'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
```
After that ALLOW host to outside - 

```bash
sudo vim /etc/mysql/my.cnf

[mysqld]
bind-address = 0.0.0.0

sudo systemctl restart mariadb

netstat -ant | grep 3306
```

## DB Command

sudo mysql;

Create Database:

```bash
CREATE DATABASE `restdb`CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
```

Then Create Table:
```bash
USE restdb;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`address`) values 
(1,'Mahbub','Tito','Cumilla'),
(2,'kamal','khan','Dhaka');

```
