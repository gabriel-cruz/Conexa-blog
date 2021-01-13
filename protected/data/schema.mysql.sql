create database blog;
use blog;
                    
create table tbl_users (user_id int not null auto_increment primary key, username varchar (30));

create table tbl_post (post_id int not null auto_increment primary key, title varchar (100), 
					content varchar (280), tags varchar (100), author int not null, FOREIGN KEY (author) REFERENCES users (user_id));

create table tbl_comment (comn_id int not null auto_increment primary key, comn_content varchar (280), author varchar (30), 
						post int not null, FOREIGN KEY (post) REFERENCES post (post_id));

create table tbl_tags (tag_id int not null auto_increment primary key, tagname varchar (100), frequency int (100));


CREATE TABLE tbl_post (id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT, title VARCHAR(128) NOT NULL, content TEXT NOT NULL, tags TEXT, date INTEGER, update_time INTEGER, author varchar(30));