# API_Services PHP Library

با استفاده از این پکیج میتوانید استعلامات زیر را در کسری از ثانیه دریافت نمایید.

## 📦 نصب

کافی است با استفاده از کامپوزر دستور زیر را اجرا نمایید.

```php
composer require mshirmohammadi/api.ir  
```

## 📦 راه اندازی
```php
require 'vendor/autoload.php';
use Shirmohammadi\Api_Services\Api_Services;
$token = "YOUR_API_TOKEN";
$api = new Api_Services($token);
```

---

## ⚡ متدها

### 1️⃣ احراز هویت شاهکار​ اشخاص حقیقی و حقوقی (Shahkar1)
**توضیح:** وب سرویس شاهکار تطبیق کد ملی با شماره موبایل را استعلام می نماید. در این نسخه دیتا به صورت رمز شده استعلام می گردد. همچنین امکان استعلام شناسه ملی و سیم کارت اشخاص حقوقی هم دارد

**پارامترها:**
- `nationalCode` (string) – کد ملی فرد یا شناسه ملی شرکت
- `mobile` (string) – شماره موبایل
- `isCompany` (bool, اختیاری) – true برای شرکت، false برای فرد (پیش‌فرض: false)

**نمونه استفاده:**
```php
$nationalCode   = "11111111111";
$mobile         = "09120000000";
$result         = $api->Shahkar1($nationalCode, $mobile,true);
print_r($result);
```

**نمونه پاسخ:**
```json
{
  "data": true,
  "success": true,
  "code": 1,
  "error": null,
  "message": null
}
```

### 2️⃣ checkNationalCodeLite
**توضیح:** احراز هویت شاهکار Lite
**HTTP Method:** POST

**پارامترها:**
- `nationalCode` (string) – کد ملی
- `mobile` (string) – شماره موبایل

**نمونه استفاده:**
```php
$result = $shahkar->checkNationalCodeLite("0010007700", "09120000000");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "code": 1,
  "data": { "verified": true }
}
```

### 3️⃣ matchNationalCodeWithCard
**توضیح:** تطبیق کد ملی با کارت بانکی
**HTTP Method:** POST

**پارامترها:**
- `nationalCode` (string) – کد ملی
- `birthDate` (string) – تاریخ تولد
- `cardNumber` (string) – شماره کارت

**نمونه استفاده:**
```php
$result = $shahkar->matchNationalCodeWithCard("0010007700", "1370/01/01", "6037991234567890");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "data": { "matched": true }
}
```

### 4️⃣ matchNationalCodeWithIban
**توضیح:** تطبیق کد ملی با شبا
**HTTP Method:** POST

**پارامترها:**
- `nationalCode` (string)
- `birthDate` (string)
- `iban` (string)

**نمونه استفاده:**
```php
$result = $shahkar->matchNationalCodeWithIban("0010007700", "1370/01/01", "IR820540102680020817909002");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "data": { "matched": true }
}
```
# 5️⃣ matchNationalCodeWithCard

**توضیح:** تطبیق کد ملی با کارت بانکی
**HTTP Method:** POST

**پارامترها:**
- nationalCode (string) – کد ملی
- birthDate (string) – تاریخ تولد به فرمت YYYY/MM/DD
- cardNumber (string) – شماره کارت بانکی

**نمونه استفاده:**
```php
$result = $shahkar->matchNationalCodeWithCard("0010007700", "1370/01/01", "6037997000000000");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "code": 1,
  "data": { "matched": true, "bank": "ملت" }
}
```

# 6️⃣ matchNationalCodeWithIban

**توضیح:** تطبیق کد ملی با شماره شبا
**HTTP Method:** POST

**پارامترها:**
- nationalCode (string) – کد ملی
- birthDate (string) – تاریخ تولد
- iban (string) – شماره شبا 26 رقمی

**نمونه استفاده:**
```php
$result = $shahkar->matchNationalCodeWithIban("0010007700", "1370/01/01", "IR123456789012345678901234");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "code": 1,
  "data": { "matched": true, "bank": "ملت" }
}
```

# 7️⃣ matchNationalCodeWithIbanPro

**توضیح:** تطبیق کد ملی با شماره شبا پرو (سیاح)
**HTTP Method:** POST

**پارامترها:**
- nationalCode (string) – کد ملی
- iban (string) – شماره شبا 26 رقمی

**نمونه استفاده:**
```php
$result = $shahkar->matchNationalCodeWithIbanPro("0010007700", "IR123456789012345678901234");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "code": 1,
  "data": { "matched": true, "bank": "ملت" }
}
```

# 8️⃣ makeCall

**توضیح:** وب‌سرویس تماس تلفنی
**HTTP Method:** POST

**پارامترها:**
- numbers (array) – لیست شماره موبایل‌ها یا تلفن‌های ثابت
- voiceID (string) – شناسه فایل صوتی

**نمونه استفاده:**
```php
$result = $shahkar->makeCall(["09121112222"], "voice123");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "code": 1,
  "data": { "callStatus": "initiated" }
}
```

# 9️⃣ sendCallOTP

**توضیح:** وب‌سرویس OTP تلفنی
**HTTP Method:** POST

**پارامترها:**
- code (string) – کد یکبار مصرف
- number (string) – شماره موبایل یا تلفن ثابت

**نمونه استفاده:**
```php
$result = $shahkar->sendCallOTP("123456", "09121112222");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "code": 1,
  "data": { "otpSent": true }
}
```

# 🔟 sendCallOTPAlt

**توضیح:** وب‌سرویس OTP تلفنی alt
**HTTP Method:** POST

**پارامترها:**
- code (string) – کد یکبار مصرف
- number (string) – شماره موبایل یا تلفن ثابت

**نمونه استفاده:**
```php
$result = $shahkar->sendCallOTPAlt("123456", "09121112222");
print_r($result);
```

**نمونه خروجی:**
```json
{
  "success": true,
  "code": 1,
  "data": { "otpSent": true }
}
```
