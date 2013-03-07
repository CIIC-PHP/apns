/*create database if not exists `apnsp` default character set utf8;*/

drop table if exists `apns_admin`;
create table `apns_admin` (
    `account` char(32) not null,
    `password` char(32) not null,
    `authority` char(64) not null default '',
    primary key(`account`)
);

drop table if exists `apns_user`;
create table `apns_user` (
    `deviceToken` char(80) not null,
    `createAt` timestamp not null default current_timestamp,
    `type` enum('dev','pro','nil') not null default 'nil',
    `aid` char(64) not null,
    primary key(`deviceToken`)
);

drop table if exists `apns_application`;
create table `apns_application` (
    `id` char(64) not null,
    `name` char(64) not null,
    `caDev` char(255) not null,
    `caPro` char(255) not null,
    `createAt` timestamp not null default current_timestamp,
    `description` text default '',
    primary key(`id`)
);

drop table if exists `apns_message`;
create table `apns_message` (
    `id` integer not null auto_increment,
    `alert` char(255) not null default '',
    `badge` char(255) not null default '',
    `sound` char(255) not null default '',
    `aid` char(64) not null,
    `createAt` timestamp not null default current_timestamp,
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