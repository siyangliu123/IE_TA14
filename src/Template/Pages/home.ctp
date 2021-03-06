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
<script>
    $( function() {
        $( document ).tooltip({
            position: {
                my: "center top-20",
                at: "center top",
                using: function( position, feedback ) {
                    $( this ).css( position );
                    $( "<div>" )
                        .addClass( "arrow" )
                        .addClass( feedback.vertical )
                        .addClass( feedback.horizontal )
                        .appendTo( this );
                }
            }
        });
    } );
</script>
<body class="home">
<div class="home-container">

    <div class="photo-container">

        <?php echo $this->Form->create(null, ['type' => 'post', 'controller' => 'pages', 'action' => 'redirection']); ?>
        <!--            <div class="speech-bubble">-->
        <!--                <div>Having difficulties reading?</div>-->
        <!--                <div> Browse <a href="#" class="btn btn-primary">Simplified</a> Version</div>-->
        <!--            </div>-->
        <h1 class="ml10">
  <span class="text-wrapper">
    <span class="letters">Save more hearts from</span>
  </span>
        </h1>
        <h1 class="ml12">Coronary Heart Disease</h1>
        <div id="select-div">
            <label id="are-you">Are you</label>
            <select id="selection" name="selection">
                <option value="1">Having concerns about developing CHD</option>
                <option value="2">Currently suffering from CHD</option>
                <option value="3">Looking for diet suggestion</option>
                <option value="4">Looking for exercise suggestion</option>
            </select>
            <a type="submit" class="btn btn-red">Submit</a>
        </div>

        <?php echo $this->Form->end(); ?>

    </div>


    <div class="content">
        <div class="row pad" style="font-weight: bold"><h2>Coronary Heart Disease (CHD) Ranked <span
                        style="font-size: 10vh; color: red">No.1</span> in leading single cause of death in Australia.
            </h2>
        </div>
        <div class="row pad">
            <div class="col-md-3 col-lg-3">
                <div class="section"><p>CHD can cause <b style="text-transform: capitalize">stroke, angina pectoris,
                            myocardial infarction, arrhythmia, and heart failure</b>. They are the main causes of sudden
                        death in patients with CHD.</p>
                <?php
                echo $this->Html->link("Test Your Risk Here", ['controller' => 'pages', 'action' => 'questionnaire'], ['class' => 'btn btn-red']);
                ?>
                    <br>
                </div>
                <div class="section">
                    <p>According to research, the main factors for CHD are <b style="text-transform: capitalize">smoking,
                            age, and gender.</b></p>
                    <?php
                    echo $this->Html->link("Read More", ['controller' => 'pages', 'action' => 'smoke_visualisation'], ['class' => 'btn btn-red']);
                    ?>
                    <br/>
                </div>
            </div>
            <div class="col-md-9 col-lg-9 infographic-container">
                <div>
                    <?php echo $this->Html->image('CHD infographic.png', ['id' => 'infographic', 'class' => 'content-image', 'onclick' => 'showImage(this);', 'title' => 'Click to view in full screen.']); ?>
                </div>
                <div class="image-container">
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

                    <img id="expandedImg">

                    <div id="imgtext"></div>
                </div>
            </div>
        </div>
        <div class="cont s--inactive">
            <!-- cont inner start -->
            <div class="cont__inner">
                <!-- el start -->
                <div class="el">
                    <div class="el__overflow">
                        <div class="el__inner">
                            <div class="el__bg"></div>
                            <div class="el__preview-cont">
                                <h2 class="el__heading">CHD Statistics</h2>
                            </div>
                            <div class="el__content">
                                <div class="el__title">CHD Statistics</div>
                                <div class="el__close-btn"></div>
                                <div class="el__text">
                                    Explore the statistics and graphs on Coronary Heart Disease and it's effect on factors such as age group, smoking and gender.
                                    <br>
                                    <?php echo $this->Html->link("View Mortality Rate", ['controller' => 'mortality_record', 'action' => 'visualisation'], ['class' => 'btn btn-red']); ?>
                                    <?php echo $this->Html->link("View Factors of CHD", ['controller' => 'pages', 'action' => 'smoke_visualisation'], ['class' => 'btn btn-red']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back">1</div>
                        <div class="el__index-front">
                            <div class="el__index-overlay" data-index="1">1</div>
                        </div>
                    </div>
                </div>
                <!-- el end -->
                <!-- el start -->
                <div class="el">
                    <div class="el__overflow">
                        <div class="el__inner">
                            <div class="el__bg"></div>
                            <div class="el__preview-cont">
                                <h2 class="el__heading">Diet Advice</h2>
                            </div>
                            <div class="el__content">
                                <div class="el__title">Diet Advice</div>
                                <div class="el__close-btn"></div>
                                <div class="el__text">
                                    Improve your lifestyle by following our diet suggestions. View our comprehensive list of foods and their nutrition details to reduce the risk of Coronary heart disease
                                    <br>
                                    <?php echo $this->Html->link("View Diet Suggestions", ['controller' => 'foods', 'action' => 'healthy_nutrition'], ['class' => 'btn btn-red']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back">2</div>
                        <div class="el__index-front">
                            <div class="el__index-overlay" data-index="2">2</div>
                        </div>
                    </div>
                </div>
                <!-- el end -->
                <!-- el start -->
                <div class="el">
                    <div class="el__overflow">
                        <div class="el__inner">
                            <div class="el__bg"></div>
                            <div class="el__preview-cont">
                                <h2 class="el__heading">Exercise Advice</h2>
                            </div>
                            <div class="el__content">
                                <div class="el__title">Exercise Advice</div>
                                <div class="el__close-btn"></div>
                                <div class="el__text">
                                    Strengthen your body to defend against Coronary Heart Disease by performing various exercises. We also provide the benefits and how much to perform each day.
                                    <br>
                                    <?php echo $this->Html->link("View Exercises", ['controller' => 'pages', 'action' => 'exercise'], ['class' => 'btn btn-red']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back">3</div>
                        <div class="el__index-front">
                            <div class="el__index-overlay" data-index="3">3</div>
                        </div>
                    </div>
                </div>
                <!-- el end -->
                <!-- el start -->
                <div class="el">
                    <div class="el__overflow">
                        <div class="el__inner">
                            <div class="el__bg"></div>
                            <div class="el__preview-cont">
                                <h2 class="el__heading">Food Calories Calculator</h2>
                            </div>
                            <div class="el__content">
                                <div class="el__title">Food Calories Calculator</div>
                                <div class="el__close-btn"></div>
                                <div class="el__text">
                                    Obesity can increase the risk of coronary heart disease by change your cholesterol level and blood pressure. Record and calculate the total calories of each meal to help you balance your daily nutrition intake.
                                    <br>
                                    <?php echo $this->Html->link("Food Calories Calculator", ['controller' => 'foods', 'action' => 'calculator'], ['class' => 'btn btn-red']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back">4</div>
                        <div class="el__index-front">
                            <div class="el__index-overlay" data-index="4">4</div>
                        </div>
                    </div>
                </div>
                <!-- el end -->
                <!-- el start -->
                <div class="el">
                    <div class="el__overflow">
                        <div class="el__inner">
                            <div class="el__bg"></div>
                            <div class="el__preview-cont">
                                <h2 class="el__heading">Exercise Calories Calculator</h2>
                            </div>
                            <div class="el__content">
                                <div class="el__title">Exercise Calories Calculator</div>
                                <div class="el__close-btn"></div>
                                <div class="el__text">
                                    Help you calculate calories burning through exercises to increase body fitness to reduce the risk of coronary heart disease.
                                    <br>
                                    <?php echo $this->Html->link("Exercise Calories Calculator", ['controller' => 'pages', 'action' => 'exercise_calculator'], ['class' => 'btn btn-red']); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="el__index">
                        <div class="el__index-back">5</div>
                        <div class="el__index-front">
                            <div class="el__index-overlay" data-index="5">5</div>
                        </div>
                    </div>
                </div>
                <!-- el end -->
            </div>
            <!-- cont inner end -->
        </div>

        <div class="row pad">

<!--            <div class="col-md-5 col-lg-5 section card one">-->
<!--                <h3>Nutrition Advice</h3>-->
<!--                --><?php
//                echo $this->Html->link("Read More", ['controller' => 'nutritions', 'action' => 'healthy_nutrition'], ['class' => 'btn btn-red']);
//                ?>
<!--            </div>-->
<!--            <div class="col-md-5 col-lg-5 section card two">-->
<!--                <h3>Exercise Advice</h3>-->
<!--                --><?php
//                echo $this->Html->link("Read More", ['controller' => 'pages', 'action' => 'exercise'], ['class' => 'btn btn-red']);
//                ?>
<!--            </div>-->
<!--            <div class="col-md-5 col-lg-5 section card three">-->
<!--                <h3>CHD Statistics</h3>-->
<!--                --><?php
//                echo $this->Html->link("Read More", ['controller' => 'mortality_record', 'action' => 'visualisation'], ['class' => 'btn btn-red']);
//                ?>
<!---->
<!--            </div>-->
<!--            <div class="col-md-5 col-lg-5 section card four">-->
<!--                <h3>Calories Calculator</h3>-->
<!--                --><?php
//                echo $this->Html->link("Read More", ['controller' => 'foods', 'action' => 'calculator'], ['class' => 'btn btn-red']);
//                ?>
<!---->
<!--            </div>-->
        </div>
    </div>


</body>

<script>
    $(document).ready(function () {
        var textWrapper = document.querySelector('.ml10 .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: false})
            .add({
                targets: '.ml10 .letter',
                rotateY: [-90, 0],
                duration: 1000,
                delay: (el, i) => 145 * i
            });

        var textWrapper = document.querySelector('.ml12');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: false})
            .add({
                targets: '.ml12 .letter',
                translateX: 0,
                translateZ: 0,
                opacity: [0, 1],
                easing: "easeOutExpo",
                duration: 2000,
                delay: (el, i) => 2500 + 30 * i
            });
    });
    //google.charts.load('current', {'packages': ['bar']});
    //google.charts.setOnLoadCallback(drawStuff);
    //
    //function drawStuff() {
    //    var data = new google.visualization.arrayToDataTable([
    //        ['Major causes of CVD', 'Male', 'Female'],
    //        <?php
    //        foreach ($mortalityRecords as $mortalityRecord) {
    //            echo "['" . $mortalityRecord->cause . "', " . $mortalityRecord->male_death . ", " . $mortalityRecord->female_death . "],";
    //        }
    //        ?>
    //    ]);
    //
    //    var options = {
    //        width: 600,
    //        chart: {
    //            title: 'CVD Mortality Rate',
    //        },
    //        bars: 'horizontal' // Required for Material Bar Charts.
    //    };
    //
    //    var chart = new google.charts.Bar(document.getElementById('myChart'));
    //    chart.draw(data, options);
    //};
    $(".btn-red").click(function () {
        var selection = $("#selection").val();
        if (selection === "1") {
            window.location.href = "<?= \Cake\Routing\Router::url(['controller' => 'pages', 'action' => 'questionnaire']) ?>"
        }
        else if (selection === "2") {
            window.location.href = "<?= \Cake\Routing\Router::url(['controller' => 'pages', 'action' => 'chd_nav']) ?>"
        }
        else if (selection === "3") {
            window.location.href = "<?= \Cake\Routing\Router::url(['controller' => 'foods', 'action' => 'healthy_nutrition']) ?>"
        }
        else if (selection === "4") {
            window.location.href = "<?= \Cake\Routing\Router::url(['controller' => 'pages', 'action' => 'exercise']) ?>"
        }
    });

    function showImage(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }

    var $cont = document.querySelector('.cont');
    var $elsArr = [].slice.call(document.querySelectorAll('.el'));
    var $closeBtnsArr = [].slice.call(document.querySelectorAll('.el__close-btn'));

    setTimeout(function() {
        $cont.classList.remove('s--inactive');
    }, 200);

    $elsArr.forEach(function($el) {
        $el.addEventListener('click', function() {
            if (this.classList.contains('s--active')) return;
            $cont.classList.add('s--el-active');
            this.classList.add('s--active');
        });
    });

    $closeBtnsArr.forEach(function($btn) {
        $btn.addEventListener('click', function(e) {
            e.stopPropagation();
            $cont.classList.remove('s--el-active');
            document.querySelector('.el.s--active').classList.remove('s--active');
        });
    });

    /*
Reference: http://jsfiddle.net/BB3JK/47/
*/

    $('select').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });


</script>
</html>
