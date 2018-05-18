function hide(id) {
    var x = document.getElementById(id);
    x.style.display = "none";
}

function show(id) {
    var x = document.getElementById(id);
    x.style.display = "block";
}

function toggle() {
    var toggle = document.getElementById("toggle");
    var schedule1 = document.getElementById("schedule1").value;
    var schedule2 = document.getElementById("schedule2").value;

    var prefix = "https://gatech.courseoff.com/share";

    if (schedule1.includes(prefix) && schedule2.includes(prefix)) {
        if (toggle.style.display === "none") {
            hide('inputForm');

            document.getElementById('sch1link').href = schedule1;
            document.getElementById('sch2link').href = schedule2;

            getBoundaries(schedule1, schedule2);

        } else {
            hide('toggle');
        }
    } else {
      alert("Please enter valid URLs");
    }
}

function getBoundaries(url1, url2) {

    show('loader');
    var request = $.ajax({
        url: 'fetchBoundaries.php',
        type: 'get',
        dataType: 'html',
        data: {
            url1: url1,
            url2: url2
        }
    });

    request.done( function ( data ) {
        hide('loader');
        show('toggle');

        data = data.split(' ');
        urlOneData = data[0];
        urlTwoData = data[1];

        urlOneData = formatData(urlOneData);
        urlTwoData = formatData(urlTwoData);

        var mergedArray = mergeArrays(urlOneData, urlTwoData);
        var finalArr = [];
        var flatArr = [];

        mergedArray.forEach(function(row) {
            row = removeDuplicates(mergeIntervals(row));
            finalArr.push(row);

            var flat = [].concat.apply([], row);
            flat.unshift(0.0);
            flat.push(100.0);
            flatArr.push(flat);
        });

        drawFreeTime(finalArr, flatArr);
    });

    request.fail( function ( jqXHR, textStatus) {
        console.log( 'Sorry: ' + textStatus );
    });
}

function removeDuplicates(arr) {
    var newArr = [];
    for (var i = 0; i < arr.length; i++) {
        if (!newArr.includes(arr[i])) {
            newArr.push(arr[i]);
        }
    }
    return newArr;
}

function mergeArrays(arr1, arr2) {

    for (var i = 0; i < arr1.length; i++) {
        for (var j = 0; j < arr2[i].length; j++) {
            arr1[i].push(arr2[i][j]);
        }
    }

    return arr1;
}

function mergeIntervals(intervals) {
    // test if there are at least 2 intervals
    if(intervals.length <= 1)
        return intervals;

    var stack = [];
    var top   = null;

    // sort the intervals based on their start values
    intervals = intervals.sort();

    // push the 1st interval into the stack
    stack.push(intervals[0]);

    // start from the next interval and merge if needed
    for (var i = 1; i < intervals.length; i++) {
        // get the top element
        top = stack[stack.length - 1];

        // if the current interval doesn't overlap with the
        // stack top element, push it to the stack
        if (top[1] < intervals[i][0]) {
            stack.push(intervals[i]);
        }
        // otherwise update the end value of the top element
        // if end of current interval is higher
        else if (top[1] < intervals[i][1]) {
            top[1] = intervals[i][1];
            stack.pop();
            stack.push(top);
        }
    }

    return stack;
}

function formatData(data) {
    data = data.split('|');
    for (var i = 0; i < data.length; i++) {
        data[i] = data[i].split(':');
        for (var j = 0; j < data[i].length; j++) {

            //remove extraneous commas
            if (data[i][j].charAt(0) == ',') {
                data[i][j] = data[i][j].substr(1);
            }
            if (data[i][j].charAt(data[i][j].length - 1) == ',') {
                data[i][j] = data[i][j].slice(0, -1);
            }

            //convert to floats
            data[i][j] = data[i][j].split(',');
            data[i][j][0] = parseFloat(data[i][j][0]);
            data[i][j][1] = parseFloat(data[i][j][1]);
        }

        genericSort(0, data[i]);
    }
    return data;
}

function genericSort(index, array) {
    array.sort(function(a,b) {return a[index] > b[index]});
}

function drawFreeTime(arr, boundaries) {

    console.log(boundaries);

    var days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    for (var i = 0; i < boundaries.length; i++) {
        console.log("Index: " + i);
        for (var j = 0; j < boundaries[i].length; j += 2) {

            var top = boundaries[i][j];
            var height = boundaries[i][j + 1] - boundaries[i][j];

            if (height > 2.0) {
                console.log("top: " + top + " | height: " + height);

                var div = document.createElement('div');
                div.className = 'course-box';
                div.style.top = String(top) + "%";
                div.style.height = String(height) + "%";

                var childDiv = document.createElement('div');
                childDiv.className = 'course-cal pinned';
                childDiv.style.backgroundColor = "rgb(121, 242, 121)";
                childDiv.borderColor = "rgb(121, 242, 121)";

                div.appendChild(childDiv);

                document.getElementById(days[i]).appendChild(div);
            }
        }
    }
}