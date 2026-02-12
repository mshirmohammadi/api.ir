# api.ir
ارائه انواع وب سرویس های OTP، احراز هویت، استعلام ها و ....
# ShahkarServicePHP

یک کلاس PHP برای ارتباط با وب‌سرویس‌های Shahkar (استعلام ملی، بانک، قبض، خودرو و غیره).

## نصب
کافیست کلاس را در پروژه خود `require` یا `include` کنید:

```php
require 'ShahkarService.php';

$shahkar = new ShahkarService("توکن_شما");
$result = $shahkar->getPowerBill("1100151403410");
print_r($result);
