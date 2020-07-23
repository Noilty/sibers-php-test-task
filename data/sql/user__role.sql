create table user__role
(
    id int auto_increment,
	user_id bigint not null comment 'Идентификатор пользователя',
	role_id int not null comment 'Идентификатор роли',
	constraint user__role_pk
		primary key (id)
)