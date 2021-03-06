<div class="visualisation-container">

    <div class="visualisation content">
        <h1 class="red">Coronary Heart Disease Mortality Rate</h1>

        <div>
            <p>For the data related to different cardiovascular diseases. <b>CHD is ranked 1st</b> in total number of cases.</p>
            <h3 style="text-align: left"><b class="red">Coronary Heart Disease Kills</b></h3>
            <div>
                <div id="myChart" style="width: 80%; height: 500px;"></div>
            </div>
            <br>
            <div>
                <p>The bar chart illustrates the number of males and females affected by different cardiovascular
                    diseases.
                    According to the study of Australian Institute of Health and Welfare the highest mortality rate is
                    for
                    Coronary heart disease which is <b>11,075 cases for males and 8,702 cases for females</b>. It can be
                    seen that the
                    death rate for <b>CHD is highest among all other heart diseases</b> .
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 box">
            <h5>Want to know more about your risk of getting CHD? Take a simple test to check your risk. </h5>
            <?php
            echo $this->Html->link("Test Your Risk Here", ['controller' => 'pages', 'action' => 'questionnaire'], ['class' => 'btn btn-red']);
            ?>
            </div>
            <div class="col-md-6 col-lg-6 box">
                <h5>Do you know that Smoking, Age and Gender are major factors of developing CHD? </h5>
                <?php
                echo $this->Html->link("Read More", ['controller' => 'pages', 'action' => 'smoke_visualisation'], ['class' => 'btn btn-red']);
                ?>
            </div>
        </div>


    </div>
</div>

<script>
    google.charts.load('current', {'packages': ['bar']});
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
            ['Major causes of CVD', 'Male', 'Female'],
            <?php
            foreach ($mortalityRecords as $mortalityRecord) {
                echo "['" . $mortalityRecord->cause . "', " . $mortalityRecord->male_death . ", " . $mortalityRecord->female_death . "],";
            }
            ?>
        ]);

        var options = {
            width: 750,
            chart: {
                title: 'CVD Mortality Rate',
            },
            bars: 'horizontal' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('myChart'));
        chart.draw(data, options);
    };
</script>