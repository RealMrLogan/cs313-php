const fs = require('fs');
fs.readFile(process.argv[2], (err, buf) => {
   const path = buf.toString();
   const arr = path.split('\n');
   console.log(arr.length -1);
   
   // console.log(buf.toString().split('\n').length - 1);
});