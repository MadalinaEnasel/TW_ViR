CREATE TABLE statistcs (
id_video varchar(30) NOT NULL,
views int NOT NULL,
male_views int NOT NULL,
female_views int NOT NULL,
binary_views int NOT NULL,
others_views int NOT NULL,
today_views int NOT NULL,
dateToday date default CURRENT_TIMESTAMP
 
);
ALTER TABLE statistics ADD CONSTRAINT id_video_statistics FOREIGN KEY id_video_statistics(id_video)
    REFERENCES video (id_video);