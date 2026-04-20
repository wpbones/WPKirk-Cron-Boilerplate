# WPKirk-Cron-Boilerplate

Focused demo of **WordPress cron (scheduled events)** in WP Bones — declared as a service
provider class with a `$hook`, a `$recurrence` (`hourly`/`twicedaily`/`daily`), and a `run()`
method. The framework handles scheduling on activation and cleanup on deactivation.

## What this demos

A single scheduled event provider:

- `plugin/Providers/ScheduleExampleProvider.php` — extends
  `WordPressScheduleServiceProvider`, sets `$hook = 'schedule_example_event'`,
  `$recurrence = 'twicedaily'`, and implements `run()` which logs via `wpbones_logger()`.
- Registered via `config/plugin.php` under the `providers` array (generic provider slot, not
  a dedicated `schedules` key — the service provider auto-registers the WP cron hook).

**Key files to read first:**

| File | What to look at |
| --- | --- |
| `plugin/Providers/ScheduleExampleProvider.php` | `$hook`, `$recurrence`, `run()` method |
| `config/plugin.php` | Provider registration |
| `plugin/Http/Controllers/Examples/CronController.php` | Admin dashboard showing the cron docs |

## Smoke test (manual, ~30s)

With the plugin active:

1. `wp cron event list` (from the plugin root) — `schedule_example_event` should appear with
   a `twicedaily` recurrence.
2. `wp cron event run schedule_example_event` — should execute without errors.
3. Check `wp-content/debug.log` → you should see `Schedule example event triggered`.
4. `wp plugin deactivate wpkirk-cron-boilerplate` → `wp cron event list` should no longer
   list the event (the service provider cleans it up).

## Use as a template

```sh
# 1. clone from the GitHub template
gh repo create my-cron-plugin --template wpbones/WPKirk-Cron-Boilerplate --public --clone
cd my-cron-plugin

# 2. rename the PHP namespace + plugin slug
composer install
php bones rename "My Cron Plugin"

# 3. build + activate
yarn install && yarn build
wp plugin activate my-cron-plugin
```

Generate additional scheduled providers with `php bones make:schedule <Name>`. Register each
under `providers` in `config/plugin.php`. For custom recurrences beyond WP defaults, use
`add_filter('cron_schedules', ...)`.

## Framework surface exercised

This boilerplate is the **regression bed** for the cron layer:

- `WPKirk\WPBones\Foundation\WordPressScheduleServiceProvider` — registers the cron hook on
  activation, handles `wp_schedule_event()` and cleans up on deactivation
- Provider registration via `config/plugin.php` → `providers` array → `Plugin::registerProviders()`
- `wpbones_logger()` helper used inside the `run()` method
- `php bones make:schedule` code generator
