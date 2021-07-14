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
 * ADMIN PAGE
 * 
 * In this section we'll add a page to admin pannel for plugin usage and description
 */

add_action('admin_menu', 'admin_page');

function admin_page() {
  add_menu_page('ChartJS ESGI', 'ChartJS ESGI', 'manage_options', 'chartjs-esgi', 'chartJS_ESGI_page', 'dashicons-chart-area');
}

function chartJS_ESGI_page() {
  echo "<h1>Welcome to ChartJS ESGI !</h1>
<p><em>Plugin created by <a href=\"https://github.com/MisterGoodDeal\">Milan CAMUS</a> and <a href=\"https://github.com/Haborym\">Arthur VADROT</a>.</em></p>
<p>In this page you will find everything you need to know about this plugin.</p>
<p>&nbsp;</p>
<h3>Charts available</h3>
<p>With our plugin you have access to five different types of charts :</p>
<ol>
<li>Bar chart&nbsp; : vertical bars with multiple values and colors</li>
<li>Line chart : horizontal line with multiple dots representing values&nbsp;</li>
<li>Doughnut chart : 360&deg; chart with a hole in the middle representing one or more values.</li>
<li>Pie chart : 360&deg; chart representing one or more values.</li>
<li>Area chart : 360&deg; chart representing one or more values in polar style.</li>
</ol>
<p>&nbsp;</p>
<h3>Parameters</h3>
<p><em>The following parameters are available for every charts</em></p>
<div>
<div><code>width</code>: Width of the canavas (default value is '400')</div>
<div><code>height</code>: Height of the canevas (default value is '400')</div>
<div><code>chartlabel</code>: Label display above the chart (default value is 'Chart Label')</div>
<div><code>labels</code>: Labels of every single values (default value is \"'Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'\")</div>
<div><code>values</code>: Values displayed on the chart (default value is 5 random values between 10 and 50)</div>
<div><code>colors</code>: Colors of each values (default value is 5 random colors at 0.2 opacity)</div>
<div><code>bordercolors</code>: Border colors of each values (default value is 5 random colors)</div>
<div><code>borderwidth</code>: Width in pixels of the values border (default value is '1')</div>
<div>&nbsp;</div>
<h3>Usage with shortcodes</h3>
<ol>
<li>Bar chart&nbsp; : <code>[chart_bar]</code></li>
<li>Line chart :<code> [chart_line]</code></li>
<li>Doughnut chart : <code>[chart_doughnut]</code></li>
<li>Pie chart : <code>[chart_pie]</code></li>
<li>Area chart : <code>[chart_area]</code></li>
</ol>
<p><span style=\"text-decoration: underline;\">Example :</span></p>
<p><code>[chart_bar </code></p>
<p>&nbsp; <code>width=\"600\" </code></p>
<p>&nbsp; <code>height=\"400\" </code></p>
<p>&nbsp; <code>chartlabel=\"Label de test\" </code></p>
<p>&nbsp; <code>labels=\"'Bonjour', 'Test', '123 Soleil'\" </code></p>
<p>&nbsp; <code>values=\"12,34,17\" </code></p>
<p>&nbsp; <code>colors=\"'rgba(0,0,0,0.2)','rgba(23,75,255,0.2)','rgba(76,54,32,0.2)'\" </code></p>
<p>&nbsp; <code>bordercolors=\"'rgba(0,0,0,1)','rgba(23,75,255,1)','rgba(76,54,32,1)'\"</code></p>
<p><code>&nbsp;borderwith=\"2\"</code></p>
<p><code> ]</code></p>
<p>&nbsp;</p>
<h3>Usage with widgets</h3>
<p>TODO</p>
</div>";
}


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

add_action('widgets_init', 'chartJS_ESGI_init');
function chartJS_ESGI_init() {
  register_widget("widgetChartJS_ESGI");
}

class widgetChartJS_ESGI extends WP_Widget {

  // Constructeur du widgets
  function __construct() {
    parent::__construct(
      // widget ID
      'chartjs_esgi',
      // widget name
      __('ChartJS ESGI', 'chartjs_esgi_domain'),
      // widget description
      array('description' => __('Implement Charts with widgets', 'chartjs_esgi_domain'),)
    );
  }

  //  Mise en forme
  function widget($args, $instance) {
    $chartName = generateRandomString();
    echo  "
  <canvas id='chartESGI_" . $chartName . "' width='" . $instance["width"] . "' height='" . $instance["height"] . "'></canvas>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js' integrity='sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
  <script>
  var ctx = document.getElementById('chartESGI_" . $chartName . "').getContext('2d');
  var chartESGI_" . $chartName . " = new Chart(ctx, {
      type: '" . $instance["type"] . "',
      data: {
          labels: [" . $instance["labels"] . "],
          datasets: [{
              label: '" . $instance["chartlabel"] . "',
              data: [" . $instance["values"] . "],
              backgroundColor: [" . $instance["colors"] . "],
              borderColor: [" . $instance["bordercolors"] . "],
              borderWidth: " . $instance["borderwidth"] . "
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

  // Récupération des paramètres
  function update($new_instance, $old_instance) {
    $instance = $old_instance;

    $instance['width'] = $new_instance['width'];
    $instance['height'] = $new_instance['height'];
    $instance['chartlabel'] = $new_instance['chartlabel'];
    $instance['labels'] = $new_instance['labels'];
    $instance['values'] = $new_instance['values'];
    $instance['colors'] = $new_instance['colors'];
    $instance['bordercolors'] = $new_instance['bordercolors'];
    $instance['borderwidth'] = $new_instance['borderwidth'];
    $instance['type'] = $new_instance['type'];

    return $instance;
  }

  // Paramètres dans l’administration
  function form($instance) {
    $width = esc_attr($instance['width']);
    $height = esc_attr($instance['height']);
    $chartlabel = esc_attr($instance['chartlabel']);
    $labels = esc_attr($instance['labels']);
    $values = esc_attr($instance['values']);
    $colors = esc_attr($instance['colors']);
    $bordercolors = esc_attr($instance['bordercolors']);
    $borderwidth = esc_attr($instance['borderwidth']);
    $type = esc_attr($instance['type']);

?>
<!-- Width -->
<p>
  <label for="<?php echo $this->get_field_id('width'); ?>">
    <?php echo 'Width:'; ?>
    <input class="widefat"
      id="<?php echo $this->get_field_id('width'); ?>"
      name="<?php echo $this->get_field_name('width'); ?>"
      type="text"
      placeholder="400"
      value="<?php echo $width; ?>" />
  </label>
</p>
<!-- Height -->
<p>
  <label for="<?php echo $this->get_field_id('height'); ?>">
    <?php echo 'Height:'; ?>
    <input class="widefat"
      id="<?php echo $this->get_field_id('height'); ?>"
      name="<?php echo $this->get_field_name('height'); ?>"
      type="text"
      placeholder="400"
      value="<?php echo $height; ?>" />
  </label>
</p>
<!-- Chart label -->
<p>
  <label for="<?php echo $this->get_field_id('chartlabel'); ?>">
    <?php echo 'Chart label:'; ?>
    <input class="widefat"
      id="<?php echo $this->get_field_id('chartlabel'); ?>"
      name="<?php echo $this->get_field_name('chartlabel'); ?>"
      type="text"
      placeholder="Chart label"
      value="<?php echo $chartlabel; ?>" />
  </label>
</p>
<!-- Labels -->
<p>
  <label for="<?php echo $this->get_field_id('labels'); ?>">
    <?php echo 'Labels:'; ?>
    <input class="widefat"
      id="<?php echo $this->get_field_id('labels'); ?>"
      name="<?php echo $this->get_field_name('labels'); ?>"
      type="text"
      placeholder="'Label 1','Label 2'"
      value="<?php echo $labels; ?>" />
  </label>
</p>
<!-- Values -->
<p>
  <label for="<?php echo $this->get_field_id('values'); ?>">
    <?php echo 'Values:'; ?>
    <input class="widefat"
      id="<?php echo $this->get_field_id('values'); ?>"
      name="<?php echo $this->get_field_name('values'); ?>"
      type="text"
      placeholder="<?= rand(10, 50) . "," . rand(10, 50) ?>"
      value="<?php echo $values; ?>" />
  </label>
</p>
<!-- Colors -->
<p>
  <label for="<?php echo $this->get_field_id('colors'); ?>">
    <?php echo 'Colors:'; ?>
    <input class="widefat"
      id="<?php echo $this->get_field_id('colors'); ?>"
      name="<?php echo $this->get_field_name('colors'); ?>"
      type="text"
      placeholder="<?= randomColor(.2) . "," . randomColor(.2) ?>"
      value="<?php echo $colors; ?>" />
  </label>
</p>
<!-- Border Colors -->
<p>
  <label for="<?php echo $this->get_field_id('bordercolors'); ?>">
    <?php echo 'Border colors:'; ?>
    <input class="widefat"
      id="<?php echo $this->get_field_id('bordercolors'); ?>"
      name="<?php echo $this->get_field_name('bordercolors'); ?>"
      type="text"
      placeholder="<?= randomColor() . "," . randomColor() ?>"
      value="<?php echo $bordercolors; ?>" />
  </label>
</p>
<!-- Border Width -->
<p>
  <label for="<?php echo $this->get_field_id('borderwidth'); ?>">
    <?php echo 'Border width:'; ?>
    <input class="widefat"
      id="<?php echo $this->get_field_id('borderwidth'); ?>"
      name="<?php echo $this->get_field_name('borderwidth'); ?>"
      type="text"
      placeholder="2"
      value="<?php echo $borderwidth; ?>" />
  </label>
</p>
<!-- Type -->
<p>
  <label for="<?php echo $this->get_field_id('type'); ?>">
    <?php echo 'Chart Type:'; ?>
    <select id="<?php echo $this->get_field_id('type'); ?>"
      name="<?php echo $this->get_field_name('type'); ?>"
      class="widefat">
      <option value="bar">Bar chart</option>
      <option value="line">Line chart</option>
      <option value="doughnut">Doughtnut chart</option>
      <option value="pie">Pie chart</option>
      <option value="polarArea">Area chart</option>
    </select>
  </label>
</p>

<?php

  }

  // Fin du widget
}


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