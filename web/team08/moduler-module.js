const fs = require('fs');
const path = require('path');

module.exports = function(dirName, extension, callback) {
   fs.readdir(dirName, (err, data) => {
      if (err) {
         return callback(err);
      }
      const fileNames = [];
      for (let i = 0; i < data.length; i++) {
         const ext = path.extname(data[i]);
         if (ext.split('.')[1] == extension) {
            fileNames.push(data[i]);
            // console.log(buff[i]);
         }
      }
      callback(null, fileNames);
   });
}