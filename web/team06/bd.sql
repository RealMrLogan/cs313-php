-- Create Topics table
CREATE TABLE topics (
   id int,
   name varchar(80)
);
-- Add to teh topics
INSERT INTO topics (id, name)
VALUES (1, 'Faith');

INSERT INTO topics (id, name)
VALUES (2, 'Sacrifice');

INSERT INTO topics (id, name)
VALUES (3, 'Charity');

-- Create many-to-many table
CREATE TABLE scripture_topics (
   topic_id int PRIMARY KEY,
   scripture_id int REFERENCES scripture(scripture_id)
);