/* Creating a table
 * Template: CREATE TABLE tableName(column, dataType);
 * Add a column
 * Template: ALTER TABLE tableName
 *           ADD columnName dataType;
 */
-- Create the character table
CREATE TABLE character (
characterid       SERIAL PRIMARY KEY,
displayname       varchar(80),
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
weaponid       	SERIAL PRIMARY KEY,
displayname       varchar(80),
damage   		   int,
range   		      int,
durability       	int
);

-- Create the spell table
CREATE TABLE spell (
displayname       varchar(80),
spellname        	varchar(80),
damage   		   int,
range    		   int,
cost     		   int,
cooldown 		   int
);

-- Create the protection table
CREATE TABLE protection (
displayname       varchar(80),
protectionname   	varchar(80),
armor    		   int,
durability       	int
);

-- Create the buffs table
CREATE TABLE buffs (
displayname       varchar(80),
buffname 		   varchar(80),
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
INSERT INTO character(displayname, hitpoints, damage, armor, magic, weaponname, protectionname, spellname, buffname, isdead)
VALUES ('Player One', 100, 20, 10, 10, NULL, NULL, NULL, NULL, false);
-- Add an NPC
INSERT INTO character(displayname, hitpoints, damage, armor, magic, weaponname, protectionname, spellname, buffname, isdead)
VALUES ('Civilian', 50, 5, 0, 0, NULL, NULL, NULL, NULL, false);
-- Add an enemy
INSERT INTO character(displayname, hitpoints, damage, armor, magic, weaponname, protectionname, spellname, buffname, isdead)
VALUES ('Enemy', 75, 10, 10, 0, NULL, NULL, NULL, NULL, false);

-- ADD A WEAPON
-- add a sword
INSERT INTO weapon(displayname, weaponname, damage, range, durability)
VALUES ('Sword', 'sword', 20, 10, 100);
-- add a bow
INSERT INTO weapon(displayname, weaponname, damage, range, durability)
VALUES ('Long Bow', 'long bow', 10, 40, 75);

-- ADD A PROTECTION
-- add a breastplate
INSERT INTO protection(displayname, protectionname, armor, durability)
VALUES ('Breastplate', 'breastplate', 20, 100);
-- add a helmet
INSERT INTO protection(displayname, protectionname, armor, durability)
VALUES ('Helmet', 'helmet', 12, 100);

-- ADD A SPELL
-- add a fireball
INSERT INTO spell(displayname, spellname, damage, range, cost, cooldown)
VALUES ('Fire Ball', 'fireball', 10, 30, 5, 5);
-- add a lightning bolt
INSERT INTO spell(spellname, damage, range, cost, cooldown)
VALUES ('Lightning Bolt', 'lightning bolt', 8, 15, 3, 3);