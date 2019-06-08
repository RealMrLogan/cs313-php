console.log(sessionObj);
if (sessionObj.length == 0) {
   sessionObj.player.displayname = "Player One";
   sessionObj.player.weapon = "Sword";
   sessionObj.player.hitpoints = 100;
   sessionObj.player.damage = 20;
   sessionObj.opponent.displayname = "Enemy";
   sessionObj.opponent.weapon = "none";
   sessionObj.opponent.hitpoints = 80;
   sessionObj.opponent.damage = 10;
}
setTimeout(decideWhoGoesFirst, 1000);

function decideWhoGoesFirst() {
   console.log("flipping the coin");

   // find who goes first
   const first = Math.floor(Math.random() * 10) % 2;
   console.log("Coin Result:", first);
   if (first == 1) { // Player goes first
      document.getElementById("coin-flip").innerHTML = "You go first! Loading Game...";
      sessionObj.turn = "player";
   } else { // opponent goes first
      document.getElementById("coin-flip").innerHTML = "Opponent goes first! Loading Game...";
      sessionObj.turn = "opponent";
   }
   ShowCharacterStats();
   setTimeout(gameLoop, 1000);
}

function gameLoop() {
   document.getElementById("coin-flip").style.display = "none";
   ShowCharacterStats();
   if (sessionObj.player.hitpoints > 0 && sessionObj.opponent.hitpoints > 0) {
      switch (sessionObj.turn) {
         case "player":
            document.getElementById("player-options").style.display = "flex";
            break;
         case "opponent":
            makeMove(sessionObj.opponent, "attack", sessionObj.player);
            break;
      }
   } else { // someone won
      if (sessionObj.player.hitpoints > 0) {
         alert("You won!");
      } else {
         alert("Opponent won!");
      }
      document.getElementById("start-over").style.display = "block";
   }
}

function playerAttackWeapon() {
   document.getElementById("player-options").style.display = "none";
   makeMove(sessionObj.player, "attack", sessionObj.opponent);
}

function playerDefend() {
   document.getElementById("player-options").style.display = "none";
   makeMove(sessionObj.player, "defend", sessionObj.opponent);
}

function showPlayeroptions() {
   document.getElementById("player-options").style.display = "flex";
}
function showPlayeroptions() {
   document.getElementById("player-options").style.display = "flex";
}

function makeMove(actor, action, subject) {
   switch (action) {
      case "attack":
         // add the base damage
         let damage = actor.damage;
         // add the weapon damage
         if (actor.weaponid) { // a weapon is selected
            if (actor.weaponid.durability > 0) { // weapon isn't broken
               damage += actor.weaponid.damage;
               actor.weaponid.durability -= actor.weaponid.damage;
               if (actor.weaponid.durability <= 0) {
                  alert(`${actor.displayname}'s weapon ${actor.weaponid.displayname} broke`);
               }
            }
         }
         // subtract the base armor
         damage -= subject.armor;
         // subtract the protection armor
         if (subject.protectionid) { // protection is on
            if (subject.protectionid.durability > 0) { // protection is not broken
               if (subject.protectionid.armor >= damage) {
                  damage = 0;
               } else {
                  damage -= subject.protectionid.armor;
               }
               subject.protectionid.durability -= damage;

               if (actor.protectionid.durability <= 0) {
                  alert(`${actor.displayname}'s protection ${actor.protectionid.displayname} broke`);
               }
            }
         }
         // apply the damage
         if (damage < 0) { // don't apply negative damage
            damage = 0;
         }
         subject.hitpoints -= damage;
         // display what happened
         alert(`${actor.displayname} attacked ${subject.displayname} and caused ${damage} damage!`);
         break;
      case "defend":
         actor.armor *= 1.5;
         break;
   }

   // display the results
   ShowCharacterStats();

   // change who's turn it is
   switch (sessionObj.turn) {
      case "player":
         sessionObj.turn = "opponent";
         break;
      case "opponent":
         sessionObj.turn = "player";
         break;
   }
   gameLoop(); // loop
}

function ShowCharacterStats() {
   // update the player stats
   document.getElementById("player-name").innerHTML = sessionObj.player.displayname;
   if (sessionObj.player.hitpoints > 0) {
      document.getElementById("player-hp").innerHTML = sessionObj.player.hitpoints;
   } else {
      document.getElementById("player-hp").innerHTML = "Dead";
   }
   document.getElementById("player-damage").innerHTML = sessionObj.player.damage;
   document.getElementById("player-armor").innerHTML = sessionObj.player.armor;
   if (!sessionObj.player.weaponid) { // no weapon selected; null
      document.getElementById("player-weapon").innerHTML = "Bare Handed";
      document.getElementById("player-weapon-damage").innerHTML = 0;
      document.getElementById("player-weapon-durability").innerHTML = 0;
   } else {
      document.getElementById("player-weapon").innerHTML = sessionObj.player.weaponid.displayname;
      document.getElementById("player-weapon-damage").innerHTML = sessionObj.player.weaponid.damage;
      document.getElementById("player-weapon-durability").innerHTML = sessionObj.player.weaponid.durability;
   }
   if (!sessionObj.player.protectionid) {
      document.getElementById("player-protection").innerHTML = "None";
      document.getElementById("player-protection-armor").innerHTML = 0;
   } else {
      document.getElementById("player-protection").innerHTML = sessionObj.player.protectionid.displayname;
      document.getElementById("player-protection-armor").innerHTML = sessionObj.player.protectionid.armor;
   }

   //update the opponent stats
   document.getElementById("opponent-name").innerHTML = sessionObj.opponent.displayname;
   if (sessionObj.opponent.hitpoints > 0) {
      document.getElementById("opponent-hp").innerHTML = sessionObj.opponent.hitpoints;
   } else {
      document.getElementById("opponent-hp").innerHTML = "Dead";
   }
   document.getElementById("opponent-damage").innerHTML = sessionObj.opponent.damage;
   document.getElementById("opponent-armor").innerHTML = sessionObj.opponent.armor;
   if (!sessionObj.opponent.weaponid) { // no weapon selected; null
      document.getElementById("opponent-weapon").innerHTML = "Bare Handed";
      document.getElementById("opponent-weapon-damage").innerHTML = 0;
      document.getElementById("opponent-weapon-durability").innerHTML = 0;
   } else {
      document.getElementById("opponent-weapon").innerHTML = sessionObj.opponent.weaponid.displayname;
      document.getElementById("opponent-weapon-damage").innerHTML = sessionObj.opponent.weaponid.damage;
      document.getElementById("opponent-weapon-durability").innerHTML = sessionObj.opponent.weaponid.durability;
   }
   if (!sessionObj.opponent.protectionid) {
      document.getElementById("opponent-protection").innerHTML = "None";
      document.getElementById("opponent-protection-armor").innerHTML = 0;
      document.getElementById("opponent-protection-durability").innerHTML = 0;
   } else {
      document.getElementById("opponent-protection").innerHTML = sessionObj.opponent.protectionid.displayname;
      document.getElementById("opponent-protection-armor").innerHTML = sessionObj.opponent.protectionid.armor;
      document.getElementById("opponent-protection-durability").innerHTML = sessionObj.opponent.protectionid.durability;
   }
}