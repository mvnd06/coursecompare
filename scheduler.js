
var page = require('webpage').create();
var system = require('system');
var args = system.args;

var url = String(args[1]);

page.open(url,
    function(status) {
        if (status == "success") {
            window.setTimeout(function() {
                page.render('confirm.png');
                //convert content to html and add to DOM
                var dummy = document.createElement('html');
                dummy.innerHTML = page.content;

                //will hold html elements from table
                var tableArr = [];

                //will hold boundaries for comparison
                var boundaryArr = [];

                //get each day
                days = dummy.getElementsByClassName('wk-day-body');

                for (var i = 0; i < days.length; i++) {
                    var tableRow = [];

                    for (var j = 0; j < days[i].childNodes.length; j++) {

                        var child = days[i].childNodes[j];

                        if (child.className == "course-box") {
                            tableRow.push(child);
                        }
                    }

                    tableArr.push(tableRow);
                }

                //account for row of labels
                tableArr.shift();

                //loop through arr and calculate heights

                for (var col = 0; col < tableArr.length; col++) {
                    var boundaryRow = [];
                    for (var row = 0; row < tableArr[col].length; row++) {
                        var elem = tableArr[col][row].style;

                        var height = parseFloat(elem.getPropertyValue('height'));
                        var top = parseFloat(elem.getPropertyValue('top'));
                        var bottom = top + height;

                        boundaryRow.push([top.toFixed(2), bottom.toFixed(2)]);
                        if (row < tableArr[col].length - 1) {
                            boundaryRow.push(":");
                        }
                    }
                    boundaryArr.push(boundaryRow);
                    if (col < tableArr.length - 1) {
                        boundaryArr.push("|");
                    }
                }

                console.log(boundaryArr);
                phantom.exit();

            }, 2000);
        } else {
            console.log("Error occurred.... idk what happened lol");
            phantom.exit();
        }
    });