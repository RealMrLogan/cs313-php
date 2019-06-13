const http = require('http');
const url = require('url');
const port = 8080;

http.createServer(onRequest).listen(port, () => {
   console.log("Now listening on port:", port);
});

function onRequest(req, res) {
   const requestUrl = url.parse(req.url, true);
   switch (requestUrl.pathname) {
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
      case "/add":
         const query = requestUrl.query;
         let sum = 0;
         for (const key in query) {
            sum += parseInt(query[key]);
         }
         res.writeHead(200, {
            "Content-type": "application/json"
         });
         res.end(sum.toString());
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