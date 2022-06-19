-- tables
-- Table: comments
CREATE TABLE comments (
    id_comment varchar(30) NOT NULL,
    post_time timestamp NOT NULL,
    id_user varchar(30) NOT NULL,
    comment text NOT NULL,
    CONSTRAINT comments_pk PRIMARY KEY (id_comment)
);

-- Table: user_video
CREATE TABLE user_video (
    id_user varchar(30) NOT NULL,
    id_video varchar(30) NOT NULL,
    CONSTRAINT user_video_pk PRIMARY KEY (id_user,id_video)
);

-- Table: users
CREATE TABLE users (
    username varchar(30) NOT NULL,
    gender varchar(20) NOT NULL,
    email varchar(60) NOT NULL,
    password varchar(20) NOT NULL,
    country varchar(60) NOT NULL,
    fav_cat int NOT NULL,
    CONSTRAINT users_pk PRIMARY KEY (username)
);

-- Table: video
CREATE TABLE video (
    id_video varchar(30) NOT NULL,
    comment_count int NOT NULL,
    views int NOT NULL,
    category varchar(30) NOT NULL,
    upload_date timestamp NOT NULL,
    tags text NOT NULL,
    title varchar(100) NOT NULL,
    description text NOT NULL,
    CONSTRAINT video_pk PRIMARY KEY (id_video)
);

-- Table: video_comment
CREATE TABLE video_comment (
    id_video varchar(30) NOT NULL,
    id_comment varchar(30) NOT NULL,
    CONSTRAINT video_comment_pk PRIMARY KEY (id_video,id_comment)
);

-- foreign keys
-- Reference: user_video_users (table: user_video)
ALTER TABLE user_video ADD CONSTRAINT user_video_users FOREIGN KEY user_video_users (id_user)
    REFERENCES users (username);

-- Reference: user_video_video (table: user_video)
ALTER TABLE user_video ADD CONSTRAINT user_video_video FOREIGN KEY user_video_video (id_video)
    REFERENCES video (id_video);

-- Reference: video_comment_comments (table: video_comment)
ALTER TABLE video_comment ADD CONSTRAINT video_comment_comments FOREIGN KEY video_comment_comments (id_comment)
    REFERENCES comments (id_comment);

-- Reference: video_comment_video (table: video_comment)
ALTER TABLE video_comment ADD CONSTRAINT video_comment_video FOREIGN KEY video_comment_video (id_video)
    REFERENCES video (id_video);

-- End of file.

