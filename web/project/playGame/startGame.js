console.log(sessionObj);
if (sessionObj.length == 0) {
   sessionObj.player.name = "Player One";
   sessionObj.player.weapon = "Sword";
   sessionObj.player.hitpoints = 100;
   sessionObj.player.damage = 20;
   sessionObj.opponent.name = "Enemy";
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
      document.getElementById("coin-flip").innerHTML = "You go first! Loading Game";
   } else { // opponent goes first
      document.getElementById("coin-flip").innerHTML = "Opponent goes first! Loading Game";
   }
   setTimeout(startGameLoop, 1000);
}

function startGameLoop() {
   do {

   } while (sessionObj.player.hitpoints > 0 && sessionObj.opponent.hitpoints > 0);
}