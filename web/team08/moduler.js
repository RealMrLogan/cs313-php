const myModule = require('./moduler-module');
const dirName = process.argv[2];
const ext = process.argv[3];
myModule(dirName, ext, function callback(err, data) {
   data.forEach(element => {
      console.log(element);
      
   });
})