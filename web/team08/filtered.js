const fs = require('fs');
const path = require('path');
fs.readdir(process.argv[2], (err, buff) => {
   for (let i = 0; i < buff.length; i++) {
      const ext = path.extname(buff[i]);
      if (ext.split('.')[1] == process.argv[3]) {
         console.log(buff[i]);
      }
   }
});