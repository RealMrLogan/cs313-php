/* Creating a table
 * Template: CREATE TABLE tableName(column, dataType);
 * Add a column
 * Template: ALTER TABLE tableName
 *           ADD columnName dataType;
 */
-- Create the character table
CREATE TABLE characters (
id                SERIAL PRIMARY KEY,
displayname       varchar(80),
hitpoints         int,
damage   		   int,
armor    		   int,
magic    		   int,
weaponid       	int REFERENCES weapons(id),
protectionid   	int REFERENCES protection(id),
spellid        	int REFERENCES spells(id),
buffid		      int REFERENCES buffs(id),
isdead   		   boolean
);

-- Create the weapon table
CREATE TABLE weapons (
id       	      SERIAL PRIMARY KEY,
displayname       varchar(80),
damage   		   int,
range   		      int,
durability       	int
);

-- Create the spell table
CREATE TABLE spells (
id       	      SERIAL PRIMARY KEY,
displayname       varchar(80),
damage   		   int,
range    		   int,
cost     		   int,
cooldown 		   int
);

-- Create the protection table
CREATE TABLE protection (
id                SERIAL PRIMARY KEY,
displayname       varchar(80),
armor    		   int,
durability       	int
);

-- Create the buffs table
CREATE TABLE buffs (
id         	      SERIAL PRIMARY KEY,
displayname       varchar(80),
multiplier       	decimal,
affectedattribute varchar(80),
duration 		   int
);
/* Update a cell
 * Template: UPDATE tableName
 *           SET column1 = value1, column2 = value2, ...
 *           WHERE condition;
 */
-- INSERT template: INSERT INTO table(column1, column2, ...)
--                  VALUES (value1, value2, ...);
-- ADD A CHARACTER
-- Add a player
INSERT INTO characters(displayname, hitpoints, damage, armor, magic, isdead)
VALUES ('Player One', 100, 20, 10, 10, false);
-- Add an NPC
INSERT INTO characters(displayname, hitpoints, damage, armor, magic, isdead)
VALUES ('Civilian', 50, 5, 0, 0, false);
-- Add an enemy
INSERT INTO characters(displayname, hitpoints, damage, armor, magic, isdead)
VALUES ('Enemy', 75, 10, 10, 0, false);

-- ADD A WEAPON
-- add a sword
INSERT INTO weapons(displayname, damage, range, durability)
VALUES ('Sword', 20, 10, 100);
-- add a bow
INSERT INTO weapons(displayname, damage, range, durability)
VALUES ('Long Bow', 10, 40, 75);

-- ADD A PROTECTION
-- add a breastplate
INSERT INTO protection(displayname, armor, durability)
VALUES ('Breastplate', 20, 100);
-- add a helmet
INSERT INTO protection(displayname, armor, durability)
VALUES ('Helmet', 12, 100);

-- ADD A SPELL
-- add a fireball
INSERT INTO spells(displayname, damage, range, cost, cooldown)
VALUES ('Fire Ball', 10, 30, 5, 5);
-- add a lightning bolt
INSERT INTO spells(displayname, damage, range, cost, cooldown)
VALUES ('Lightning Bolt', 8, 15, 3, 3);