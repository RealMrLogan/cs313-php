const http = require('http');
const port = 8080;

http.createServer((req, res) => {
   res.write("Hello World");
   res.end();
}).listen(port, () => {
   console.log("Now listening on port: ", port);
});

// var http = require('http');

// //create a server object:
// http.createServer(function (req, res) {
//   res.write('Hello World!'); //write a response to the client
//   res.end(); //end the response
// }).listen(8080); //the server object listens on port 8080