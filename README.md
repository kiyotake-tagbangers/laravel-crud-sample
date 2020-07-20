.env
# Serverless + PHP (Laravel) Sample Application

### エンドポイント設定 (API gateway)

```
APP_URL=<API gatewayのエンドポイント(/devまで)>
```

### Cronジョブ定期実行 (artisan関数を使用する場合)
https://bref.sh/docs/cron.html
1. `serverless.yml`に以下を追加。(functions.artisan.events)

```
    events:
      - schedule:
          rate: rate(1 minute) # see https://docs.aws.amazon.com/AmazonCloudWatch/latest/events/ScheduledEvents.html
          input: '"schedule:run"' # artisan commands
```

2. `app > Console > Kernel.php`の*schedule()*に実行したい任意の処理を記述
https://laravel.com/docs/7.x/scheduling

```
protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        \Log::debug('RUN CRON');
    }
```

以下のコマンドを使って試せる。
```
php artisan schedule:run
```
or 
```
vendor/bin/bref cli --region ap-northeast-1 giftee-goto-dev-artisan schedule:run
```

### Cronジョブ定期実行 (カスタム関数を使用する場合)
https://bref.sh/docs/cron.html#function-cron-tasks
1. `serverless.yml`に以下の関数定義を追加。

```
functions:
    console:
        handler: function.php
        layers:
            - ${bref:layer.php-73}
        events:
            - schedule: rate(1 hour)
```

2. `function.php`に実行したいジョブの任意の処理を記述。