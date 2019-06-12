var http = require('http')

http.get(process.argv[2], function (response) {
   response.setEncoding('utf8');
   let data = "";
   response.on('data', (chunk) => {
      data += chunk;
   });
   response.on('error', console.error);
   response.on('end', () => {
      console.log(data.length);
      console.log(data);
   })
}).on('error', console.error);

// Their solution
// var http = require('http')
// var bl = require('bl')

// http.get(process.argv[2], function (response) {
//   response.pipe(bl(function (err, data) {
//     if (err) {
//       return console.error(err)
//     }
//     data = data.toString()
//     console.log(data.length)
//     console.log(data)
//   }))
// })