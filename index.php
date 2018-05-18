<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Create and share course schedules with ease.">
    <meta name="keywords" content="course, schedule, listings, university, registration, catalog">
    <meta name="Armand" content="feedback@courseoff.com">

    <link rel="shortcut icon" href="/favicon.ico">

    <title>coursecompare - Armand Raynor</title>

    <meta property="og:title" content="Semester Schedule">
    <meta property="og:site_name" content="Courseoff">
    <meta property="og:description" content="Create and share course schedules with ease.">

    <link rel="stylesheet" href="Resources/css/index.css">
    <link rel="stylesheet" href="Resources/css/base.css">
    <link rel="stylesheet" href="Resources/css/additional.css">
    <script type="text/javascript" src="script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <style>
        #loader {
            position: absolute;
            left: 48%;
            top: 50%;
            z-index: 1;
            margin: -75px 0 0 -75px;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #52a4eb;
            width: 200px;
            height: 200px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
</style>


</head>
<body lang="en" onload="hide('toggle'); hide('loader')">
    <div class="navbar navbar-fixed-top noprint">
        <div class="container">
            <div class="navbar-brand">
                <span>course | compare</span>
            </div>
        </div>
    </div>

    <div class="container page">

<div id="inputForm">
    <div style="padding: 10px">
        <input placeholder="Schedule 1" class="linkBox" id="schedule1"></input>
    </div>
    <div style="padding: 10px">
        <input placeholder="Schedule 2" class="linkBox" id="schedule2"></input>
    </div>
    <button style="padding: 10px" class="btn btn-success" onclick="toggle()">Submit</button>
</div>

<div id="loader"></div>

<div id="toggle">
<div id="page">
<div class="row">
    <div class="col-md-6">
        <h3><span data-visible="owner_name" class="hidden"></span>Availible Times</h3>
    </div>


    <br><div id="workspace"><div class="calendar">
        <table class="table-bordered" data-replace="calendar">
            <tbody>
                <tr>
                    <th class="wk-times" style="width: 89px"></th>
                    <th class="wk-day" style="width: 172px">monday</th>
                    <th class="wk-day" style="width: 172px">tuesday</th>
                    <th class="wk-day" style="width: 172px">wednesday</th>
                    <th class="wk-day" style="width: 172px">thursday</th>
                    <th class="wk-day" style="width: 172px">friday</th>
                </tr>
                <tr>
                    <td>
                        <div class="wk-day-body wk-day-body-times">
                            <div class="hour">
                                <span class="hour-first-hald">8:00 </span>
                                <span class="small">am</span>
                            </div>
                            <div class="hour">
                                <span class="hour-first-hald">9:00 </span>
                                <span class="small">am</span>
                            </div>
                            <div class="hour">
                                <span class="hour-first-hald">10:00 </span
                                    <span class="small">am</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">11:00 </span>
                                    <span class="small">am</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">12:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">1:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">2:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">3:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">4:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">5:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">6:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">7:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">8:00 </span>
                                    <span class="small">pm</span>
                                </div>
                                <div class="hour">
                                    <span class="hour-first-hald">9:00 </span>
                                    <span class="small">pm</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="wk-day-body" id="Monday">
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                            </div>
                        </td>
                        <td>
                            <div class="wk-day-body" id="Tuesday">
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                            </div>
                        </td>
                        <td>
                            <div class="wk-day-body" id="Wednesday">
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                            </div>
                        </td>
                        <td>
                            <div class="wk-day-body" id="Thursday">
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                            </div>
                        </td>
                        <td>
                            <div class="wk-day-body" id="Friday">
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                                <div class="hour"></div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <center class="noprint"><hr><p>View the original schedules below!</p>
        <p><a href="" class="btn btn-success" id='sch1link'>Schedule 1</a>
        <a href="" class="btn btn-success " id='sch2link'>Schedule 2</a></p>
    </center>
    </div>
</div>
</body>

</html>