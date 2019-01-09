var page = require('webpage').create();
page.open('http://phantomjs.org/api/webpage/property/plain-text.html', function(status) {
  console.log("Status: " + status);
  if(status === "success") {
    page.render('example.png');
  }
  phantom.exit();
});