create table users
(
	id bigint auto_increment comment 'Идентификатор',
	login varchar(30) not null comment 'Никнейм',
	password varchar(255) not null comment 'Пароль',
	name varchar(50) null comment 'Имя',
	surname varchar(50) null comment 'Фамилия',
	gender varchar(24) not null comment 'Пол',
	birthday timestamp null comment 'День рождение',
	reg_date timestamp not null default current_timestamp comment 'Дата регистрации',
	constraint users_pk
		primary key (id)
);

create unique index users_login_uindex
	on users (login);