# Laravel-UUIDs

In your migrations, replace `$table->id();` with `$table->uuid('id');`.

Add the `Uuids` trait in your Eloquent model:
```php
class MyModel extends Model
{
  use Uuids;
}
```
