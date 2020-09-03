<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

?>
<!DOCTYPE html>
<html>

<body class="home">
<div class="home-container">

    <div class="photo-container">
        <form class="chd-form">
            <div class="speech-bubble">
                <div>Having difficulties reading?</div>
                <div> Browse <a href="#" class="btn btn-primary">Simplified</a> Version</div>
            </div>

            <div id="select-div">
                <span>Are you</span>
                <select class="form-control">
                    <option>Having concerns about CHD</option>
                    <option>Currently having CHD</option>
                    <option>Concerned for someone else having CHD</option>
                </select>
                <a type="submit" class="btn btn-red">Submit</a>

            </div>

        </form>

    </div>
    <h1>Chronic Heart Disease Kills</h1>

    <div class="row content">
        <div class="col-md-3 col-lg-3">
            <div>Chronic Heart Disease Ranked No 1 in leading single cause of death in Australia.</div>
            <div>CHD can cause a stroke. Angina pectoris, myocardial infarction, arrhythmia, and heart failure. They are the main causes of sudden death in patients with CHD.</div>
            <div>According to research,  the main factors for CHD are smoking, age, and gender.</div>
            <div>Compared with non-smokers, smoking more than 25 cigarettes a day increased the risk of more than fivefold. Also, the number of smokers between 45 to 60 years of age smoked a lot which accounted for 16% of the total population in 2019.</div>
            <div>The proportion of patients generally increases with age. The number of patients is also increasing year by year in Australia.</div>
        </div>
        <div class="col-md-9 col-lg-9">
            <div id="myChart" style="width: 500px; height: 500px;"></div>

        </div>
    </div>
</div>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <h6>About</h6>
                <p class="text-justify">Heart KSDS Tech provides information and suggestions on Chronic Heart Disease</p>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Categories</h6>
                <ul class="footer-links">
                    <li><a href="#">Exercises</a></li>
                    <li><a href="#">Nutrition</a></li>
                    <li><a href="#">Meals</a></li>
                    <li><a href="#">Feature</a></li>
                    <li><a href="#">Feature</a></li>
                </ul>
            </div>

            <div class="col-xs-6 col-md-3">
                <h6>Quick Links</h6>
                <ul class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Contribute</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by
                    <a href="#">Heart KSDS Tech</a>.
                </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>



</body>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
    // var ctx = document.getElementById('myChart').getContext('2d');
    // var myChart = new Chart(ctx, {
    //     type: 'bar',
    //     data: {
    //         labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    //         datasets: [{
    //             label: '# of Votes',
    //             data: [12, 19, 3, 5, 2, 3],
    //             backgroundColor: [
    //                 'rgba(255, 99, 132, 0.2)',
    //                 'rgba(54, 162, 235, 0.2)',
    //                 'rgba(255, 206, 86, 0.2)',
    //                 'rgba(75, 192, 192, 0.2)',
    //                 'rgba(153, 102, 255, 0.2)',
    //                 'rgba(255, 159, 64, 0.2)'
    //             ],
    //             borderColor: [
    //                 'rgba(255, 99, 132, 1)',
    //                 'rgba(54, 162, 235, 1)',
    //                 'rgba(255, 206, 86, 1)',
    //                 'rgba(75, 192, 192, 1)',
    //                 'rgba(153, 102, 255, 1)',
    //                 'rgba(255, 159, 64, 1)'
    //             ],
    //             borderWidth: 1
    //         }]
    //     },
    //     options: {
    //         scales: {
    //             yAxes: [{
    //                 ticks: {
    //                     beginAtZero: true
    //                 }
    //             }]
    //         }
    //     }
    // });
</script>
<script>
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Major causes of CVD', 'Male', 'Female'],
            <?php
            foreach ($mortalityRecords as $mortalityRecord){
                echo "['".$mortalityRecord->cause."', ".$mortalityRecord->male_death.", ".$mortalityRecord->female_death."],";
            }
            ?>
        ]);

        var options = {
            width: 850,
            chart: {
                title: 'CVD Mortality Rate',
            },
            bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('myChart'));
        chart.draw(data, options);
    };
</script>
</html>
