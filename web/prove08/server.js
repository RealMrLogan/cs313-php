const http = require('http');
const port = 8080;

http.createServer(onRequest).listen(port, () => {
   console.log("Now listening on port:", port);
});

function onRequest(req, res) {
   switch (req.url) {
      case "/home":
         const html = `<h1>Welcome to the Home Page</h1>`;
         res.writeHead(200, {
            "Content-type": "text/html"
         });
         res.end(html);
         break;
      case "/getData":
         res.writeHead(200, {
            "Content-type": "application/json"
         });
         const json = JSON.stringify({
            name: "Logan Saunders",
            class: "CS313"
         });
         res.end(json);
         break;
      default:
         res.writeHead(404, {
            "Content-type": "text/html"
         });
         res.write("Page Not Found");
         res.end();
         break;
   }
}