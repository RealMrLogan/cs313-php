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
   setTimeout(gameLoop, 1000);
}

function gameLoop() {
   document.getElementById("coin-flip").style.display = "none";
   ShowCharacterStats();
   if (sessionObj.player.hitpoints > 0 && sessionObj.opponent.hitpoints > 0) {
      switch (sessionObj.turn) {
         case "player":
            // displayPlayerOptions();
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
   }
}

function playerAttack() {
   makeMove(sessionObj.player, "attack", sessionObj.opponent);
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
         const damage = actor.damage; // modify using weapon and buffs
         subject.hitpoints -= damage;
         // display what happened
         alert(`${actor.displayname} attacked ${subject.displayname} and caused ${damage} damage!`);
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
}

function ShowCharacterStats() {
   // update the player stats
   document.getElementById("player-name").innerHTML = sessionObj.player.displayname;
   document.getElementById("player-hp").innerHTML = sessionObj.player.hitpoints;
   document.getElementById("player-weapon").innerHTML = sessionObj.player.weaponid;
   // document.getElementById("player-protection").innerHTML = sessionObj.player.protectionid;

   //update the opponent stats
   document.getElementById("opponent-name").innerHTML = sessionObj.opponent.displayname;
   document.getElementById("opponent-hp").innerHTML = sessionObj.opponent.hitpoints;
   document.getElementById("opponent-weapon").innerHTML = sessionObj.opponent.weaponid;
   // document.getElementById("opponent-protection").innerHTML = sessionObj.opponent.protectionid;
}