<?php

/**
 * @package ChartJS_ESGI
 * @version 1.0.0
 */
/*
Plugin Name: ChartJS ESGI
Plugin URI: https://turtlecorp.fr
Description: This plugin allow an easy implementation of the ChartJS library inside Wordpress
Author: Milan CAMUS & Arthur VADROT
Version: 1.0.0
Author URI: https://turtlecorp.fr
*/


/**
 * SHORTCODES
 * 
 * In this section, we are creating the shortcodes for all the avalaible charts
 */
function shortcode_chartbar($params) {
  extract(shortcode_atts(
    array(
      'width' => '400',
      'height' => '400',
      'chartlabel' => 'Chart Label',
      'labels' => "'Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'",
      'values' => '' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . '',
      'colors' => randomColor(0.2) . "," . randomColor(0.2) . "," . randomColor(0.2) . "," . randomColor(0.2) . "," . randomColor(0.2),
      'bordercolors' => randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor(),
      'borderwidth' => '1'
    ),
    $params
  ));

  $chartName = generateRandomString();

  return "
  <canvas id='chartESGI_" . $chartName . "' width='" . $width . "' height='" . $height . "'></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js' integrity='sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
  <script>
  var ctx = document.getElementById('chartESGI_" . $chartName . "').getContext('2d');
  var chartESGI_" . $chartName . " = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: [" . $labels . "],
          datasets: [{
              label: '" . $chartlabel . "',
              data: [" . $values . "],
              backgroundColor: [" . $colors . "],
              borderColor: [" . $bordercolors . "],
              borderWidth: " . $borderwidth . "
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>";
}

function shortcode_chartline($params) {
  extract(shortcode_atts(
    array(
      'width' => '400',
      'height' => '400',
      'chartlabel' => 'Chart Label',
      'labels' => "'Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'",
      'values' => '' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . '',
      'colors' => randomColor(0.2) . "," . randomColor(0.2) . "," . randomColor(0.2) . "," . randomColor(0.2) . "," . randomColor(0.2),
      'bordercolors' => randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor(),
      'borderwidth' => '1'
    ),
    $params
  ));

  $chartName = generateRandomString();


  return "
  <canvas id='chartESGI_" . $chartName . "' width='" . $width . "' height='" . $height . "'></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js' integrity='sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
  <script>
  var ctx = document.getElementById('chartESGI_" . $chartName . "').getContext('2d');
  var chartESGI_" . $chartName . " = new Chart(ctx, {
      type: 'line',
      data: {
          labels: [" . $labels . "],
          datasets: [{
              label: '" . $chartlabel . "',
              data: [" . $values . "],
              backgroundColor: [" . $colors . "],
              borderColor: [" . $bordercolors . "],
              borderWidth: " . $borderwidth . "
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>";
}

function shortcode_chartdoughnut($params) {
  extract(shortcode_atts(
    array(
      'width' => '400',
      'height' => '400',
      'chartlabel' => 'Chart Label',
      'labels' => "'Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'",
      'values' => '' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . '',
      'colors' => randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor(),
      'bordercolors' => randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor(),
      'borderwidth' => '0'
    ),
    $params
  ));

  $chartName = generateRandomString();


  return "
  <canvas id='chartESGI_" . $chartName . "' width='" . $width . "' height='" . $height . "'></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js' integrity='sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
  <script>
  var ctx = document.getElementById('chartESGI_" . $chartName . "').getContext('2d');
  var chartESGI_" . $chartName . " = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: [" . $labels . "],
          datasets: [{
              label: '" . $chartlabel . "',
              data: [" . $values . "],
              backgroundColor: [" . $colors . "],
              borderColor: [" . $bordercolors . "],
              borderWidth: " . $borderwidth . "
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>";
}

function shortcode_chartpie($params) {
  extract(shortcode_atts(
    array(
      'width' => '400',
      'height' => '400',
      'chartlabel' => 'Chart Label',
      'labels' => "'Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'",
      'values' => '' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . '',
      'colors' => randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor(),
      'bordercolors' => randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor(),
      'borderwidth' => '0'
    ),
    $params
  ));

  $chartName = generateRandomString();


  return "
  <canvas id='chartESGI_" . $chartName . "' width='" . $width . "' height='" . $height . "'></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js' integrity='sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
  <script>
  var ctx = document.getElementById('chartESGI_" . $chartName . "').getContext('2d');
  var chartESGI_" . $chartName . " = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: [" . $labels . "],
          datasets: [{
              label: '" . $chartlabel . "',
              data: [" . $values . "],
              backgroundColor: [" . $colors . "],
              borderColor: [" . $bordercolors . "],
              borderWidth: " . $borderwidth . "
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>";
}

function shortcode_chartarea($params) {
  extract(shortcode_atts(
    array(
      'width' => '400',
      'height' => '400',
      'chartlabel' => 'Chart Label',
      'labels' => "'Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'",
      'values' => '' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . ',' . rand(10, 50) . '',
      'colors' => randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor(),
      'bordercolors' => randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor() . "," . randomColor(),
      'borderwidth' => '0'
    ),
    $params
  ));

  $chartName = generateRandomString();


  return "
  <canvas id='chartESGI_" . $chartName . "' width='" . $width . "' height='" . $height . "'></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js' integrity='sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
  <script>
  var ctx = document.getElementById('chartESGI_" . $chartName . "').getContext('2d');
  var chartESGI_" . $chartName . " = new Chart(ctx, {
      type: 'polarArea',
      data: {
          labels: [" . $labels . "],
          datasets: [{
              label: '" . $chartlabel . "',
              data: [" . $values . "],
              backgroundColor: [" . $colors . "],
              borderColor: [" . $bordercolors . "],
              borderWidth: " . $borderwidth . "
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>";
}

// Shortcodes implementation
add_shortcode('chart_bar', 'shortcode_chartbar');
add_shortcode('chart_line', 'shortcode_chartline');
add_shortcode('chart_doughnut', 'shortcode_chartdoughnut');
add_shortcode('chart_pie', 'shortcode_chartpie');
add_shortcode('chart_area', 'shortcode_chartarea');

/**
 * WIDGETS
 * 
 * In this section, we are creating the widgets for all the avalaible charts
 */

// Utils
function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function randomColor($opacity = 1) {
  return "'rgba(" . rand(0, 255) . ", " . rand(0, 255) . ", " . rand(0, 255) . ", " . $opacity . ")'";
}