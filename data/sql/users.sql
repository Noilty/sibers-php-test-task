create table users
(
	id int auto_increment,
	login varchar(100) null,
	password varchar(100) not null,
	name varchar(100) not null,
	last_name varchar(100) not null,
	gander int null,
	date_birth datetime null,
	constraint users_pk
		primary key (id)
);

create unique index users_name_uindex
	on users (name);

