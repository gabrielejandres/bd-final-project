create database queezy character set UTF8;

use queezy;

create table media (id int,
					name varchar(512) not null,
					release_year year,
					parental_rating varchar(16),
					description text,
					primary key(id));

create table countries (country_code char(2),
					country_name varchar(32),
					media_id int,
					constraint fk_country_media foreign key (media_id) references media(id),
					primary key(country_code, country_name, media_id));

create table series (num_seasons int,
					media_id int,
					constraint fk_media foreign key (media_id) references media(id),
					primary key(media_id));

create table movies (duration int, media_id int,
					constraint fk_media_id foreign key (media_id) references media(id),
					primary key(media_id));

create table actors (id int , 
					name varchar(512) not null,
					profile_photo varchar(256),
					primary key (id));

create table genres (id int ,
					name varchar(512) not null,
                    unique(name),
					primary key (id));

create table directors (id int, 
					name text not null,
					profile_photo varchar(256),
					primary key (id));

create table platforms (id int,
						name varchar(16),
						primary key (id));

create table media_platform (platform_id int,
							inclusion_date date,
							media_id int,
							constraint fk_plaform_catalog foreign key (platform_id) references platforms(id),
							constraint fk_media_catalog foreign key (media_id) references media(id),
							primary key (media_id, platform_id));


create table director_media (media_id int,
					director_id int,
					constraint fk_media_director foreign key (media_id) references media(id),
					constraint fk_directing foreign key (director_id) references directors(id),
					primary key (media_id, director_id));

create table genre_media (media_id int,
						 genre_id int,
						 constraint fk_genre_show foreign key (media_id) references media(id),
						 constraint fk_genre_id foreign key (genre_id) references genres(id),
						 primary key (media_id, genre_id));

create table actor_media (media_id int,
						actor_id int,
						constraint fk_media_actor foreign key (media_id) references media(id),
						constraint fk_actor foreign key (actor_id) references actors(id),
						primary key (media_id, actor_id));
