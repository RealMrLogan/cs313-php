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
   console.log(first);
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
   if (sessionObj.player.hitpoints > 0 && sessionObj.opponent.hitpoints > 0) {
      switch (sessionObj.turn) {
         case "player":
            displayPlayerOptions();
            break;
         case "opponent":
            makeMove(sessionObj.opponent, "attack", sessionObj.player);
            break;
      }
   } else { // someone won

   }
}

function showPlayeroptions() {
   document.getElementById("player-options").style.display = "flex";
}
function showPlayeroptions() {
   document.getElementById("player-options").style.display = "flex";
}

function makeMove(person, action, affectedPerson) {
   switch (action) {
      case "attack":
         const damage = person.damage; // modify using weapon and buffs
         affectedPerson.hitpoints -= damage;
         break;
   }
   // switch (person) {
   //    case "":
   //       break;

   // }
}