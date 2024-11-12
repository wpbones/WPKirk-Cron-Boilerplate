<!--
 |
 | In $plugin you'll find an instance of Plugin class.
 | If you'd like can pass variable to this view, for example:
 |
 | return PluginClassName()->view( 'dashboard.index', [ 'var' => 'value' ] );
 |
-->
<?php ob_start() ?>

<div class="wp-kirk wrap wp-kirk-sample">

  <div class="wp-kirk-toc-content">

    <!-- ----------------------------------------------------- -->
    <?php wpkirk_section(__('Overview', 'wp-kirk')); ?>

    <p>
      <?php _e('The cron schedule provider is a simple way to manage cron jobs in WordPress. It allows you to schedule a function to run at a specific time or interval.', 'wp-kirk'); ?>
    </p>

    <?php wpkirk_section(__('Create a Schedule Service Provider', 'wp-kirk')); ?>

    <p>
      <?php _e('You may create your own schedule service provider by following the steps below:', 'wp-kirk'); ?>
    </p>

    <p>
      <?php wpkirk_md(__('In the `plugins/Provider` directory, the new provider will be created by default. Of course, you may create your schedule service provider manually and in any directory you prefer. You have to change the namespace accordingly.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code(
      'php bones make:schedule ScheduleExampleProvider',
      ['language' => 'sh']
    ); ?>

    <?php wpkirk_code("@/plugin/Providers/ScheduleExampleProvider.php"); ?>

    <p>
      <?php wpkirk_md(__('The `run` method is the method that will be executed when the schedule event is triggered. You should define a unique hook name and recurrence for your schedule event. You may use the protected properties `$hook` and `$recurrence` to set the hook name and recurrence. Of course, you may override the `boot` method to set these properties.    For example, you may set the recurrence from the database or from a configuration file.', 'wp-kirk')) ?>
    </p>

    <?php wpkirk_section(__('Load the Schedule Service Provider', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('Add this new Service Provider to the list of providers in the `/config/plugin.php` file:
', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code('/*
|--------------------------------------------------------------------------
| Providers
|--------------------------------------------------------------------------
|
| Here is where you can register the Service Providers.
|
*/

"providers" => [
  "WPKirk\Providers\ScheduleExampleProvider",
],'); ?>

    <?php wpkirk_section(__('Clear the schedule event', 'wp-kirk')); ?>

    <p>
      <?php wpkirk_md(__('You don\'t need to clear the schedule event when you deactivate the plugin. WP Bones will do it for you.
  Anyway, you may use the `clear` method to do any cleanup when the plugin is deactivated.', 'wp-kirk')); ?>
    </p>

    <?php wpkirk_code("&lt;?php

namespace WPKirk\Providers;

if (!defined('ABSPATH')) {
  exit();
}

use WPKirk\WPBones\Foundation\WordPressScheduleServiceProvider as ServiceProvider;

class ScheduleExampleProvider extends ServiceProvider
{

  // Hook name - used in the WordPress schedule event
  protected \$hook = 'schedule_example_event';

  public function boot()
  {
    // You may override this method to set the properties
    // \$this->hook = 'schedule_example_event';

    \$this->recurrence = \$this->plugin->config('schedule.recurrence', 'twicedaily');
  }

  /**
    * Optional method to do any cleanup when the plugin is deactivated.
    *
    */
  public function clear()
  {
    // Do any cleanup here
  }

  /**
    * Run the scheduled event.
    *
    */
  public function run()
  {
    wpbones_logger()->info('Schedule example event triggered');
  }
}") ?>

  </div>

  <?php wpkirk_toc('Cron Schedule') ?>

</div>