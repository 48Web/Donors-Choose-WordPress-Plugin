$(document).ready(function() {
  var zip = $("#hZip").val();
  $.getJSON('http://api.donorschoose.org/common/json_feed.html?state=' + zip + '&APIKey=DONORSCHOOSE&callback=?', function(data) {

    var output = "";
    output += '<h3>Donate To Area Schools</h3>';
    output += '<strong>' + data["proposals"][0]["title"] + '</strong>';
    output += '<img src="' + data["proposals"][0]["imageURL"] + '" alt="' + data["proposals"][0]["title"] + '"/><br /><br />';
    output += '<p>' + data["proposals"][0]["fulfillmentTrailer"] + ' <a href="" target="_blank">Read More...</a></p>';
    output += '<p><strong>Needs $' + data["proposals"][0]["costToComplete"] + ' to complete</strong><br />';
    output += '<small>' + data["proposals"][0]["percentFunded"] + '% of the way there</small></p>';
    output += '<p><a href="'+ data["proposals"][0]["fundURL"] +'" class="btn btn-primary"><i class="icon-shopping-cart icon-white"></i> Fund Project</a></p>';
    
    $("#donors-choose-widget").html(output);
  });
});