-- Create the character table
CREATE TABLE character (
person		      varchar(80),
hitpoints         int,
damage   		   int,
armor    		   int,
magic    		   int,
weaponname       	varchar(80),
protectionname   	varchar(80),
spellname        	varchar(80),
buffname		      varchar(80),
isdead   		   boolean
);

-- Create the weapon table
CREATE TABLE weapon (
weaponname       	varchar(80),
damage   		   int,
range   		      int,
durability       	int
);

-- Create the spell table
CREATE TABLE spell (
spellname        	varchar(80),
damage   		   int,
range    		   int,
cost     		   int,
cooldown 		   int
);

-- Create the protection table
CREATE TABLE protection (
protectionname   	varchar(80),
armor    		   int,
durability       	int
);

-- Create the buffs table
CREATE TABLE buffs (
buffname 		   varchar(80),
multiplier       	decimal,
affectedattribute varchar(80),
duration 		   int
);

-- INSERT template: INSERT INTO table(column1, column2, ...)
--                  VALUES (value1, value2, ...);
-- Add a character
-- Add a player
INSERT INTO character(person, hitpoints, damage, armor, magic, weaponname, protectionname, spellname, buffname, isdead)
VALUES ('player1', 100, 20, 10, 10, NULL, NULL, NULL, NULL, false);
-- Add an NPC
INSERT INTO character(person, hitpoints, damage, armor, magic, weaponname, protectionname, spellname, buffname, isdead)
VALUES ('npc1', 50, 5, 0, 0, NULL, NULL, NULL, NULL, false);
-- Add an enemy
INSERT INTO character(person, hitpoints, damage, armor, magic, weaponname, protectionname, spellname, buffname, isdead)
VALUES ('enemy1', 75, 10, 10, 0, NULL, NULL, NULL, NULL, false);