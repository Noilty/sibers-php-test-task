create table roles
(
	id int auto_increment comment 'Идентификатор роли',
	role varchar(50) not null comment 'Имя роли',
	description text not null comment 'Описание роли',
	constraint roles_pk
		primary key (id)
);

create unique index roles_role_uindex
	on roles (role);

/**
INSERT INTO `roles` (`id`, `role`, `description`)
VALUES (NULL, 'Администратор', 'description role'),
       (NULL, 'Участник', 'description role')
 */