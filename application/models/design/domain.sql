/*create database if not exists `apnsp` default character set utf8;*/

drop table if exists `apns_admin`;
create table `apns_admin` (
    `account` char(32) not null,
    `password` char(32) not null,
    `role` enum('founder','manager','guest') not null default 'guest',
    primary key(`account`)
);

insert into `apns_admin`(`account`,`password`,`role`) values ('admin', md5('admin'), 'founder');

drop table if exists `apns_user`;
create table `apns_user` (
    `deviceToken` char(80) not null,
    `createAt` timestamp not null default current_timestamp,
    `status` enum('dev','pro','nil') not null default 'nil',
    `aid` char(64) not null,
    primary key(`deviceToken`, `aid`)
);

drop table if exists `apns_application`;
create table `apns_application` (
    `id` char(64) not null,
    `name` char(64) not null,
    `caDev` char(255) not null,
    `caPro` char(255) not null,
    `createAt` timestamp not null default current_timestamp,
    `description` text default '',
    `status` enum('dev','pro','nil') not null default 'nil',
    primary key(`id`)
);

drop table if exists `apns_message`;
create table `apns_message` (
    `id` integer unsigned not null auto_increment,
    `alert` char(255) not null default '',
    `badge` char(255) not null default '',
    `sound` char(255) not null default '',
    `aid` char(64) not null,
    `createAt` timestamp not null default current_timestamp,
    `status` enum('prepare','ready','sending','sent','cancel') not null default 'prepare',
    primary key(`id`)
);

drop table if exists `apns_task`;
create table `apns_task` (
    `aid` char(64) not null,
    `uid` char(80) not null,
    `mid` integer not null,
    primary key(`aid`,`uid`,`mid`)
);

drop table if exists `apns_history`;
create table `apns_history` (
    `aid` char(64) not null,
    `uid` char(80) not null,
    `mid` integer not null,
    `createAt` timestamp not null default current_timestamp,
    primary key(`aid`,`uid`,`mid`)
);