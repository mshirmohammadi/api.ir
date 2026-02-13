<?php

namespace Shirmohammadi\Api_Services;

class Api_Services
{
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function Shahkar1($nationalCode, $mobile, $isCompany = false)
    {
        $data = [
            "nationalCode" => $nationalCode,
            "mobile" => $mobile,
            "isCompany" => $isCompany
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/Shahkar", $data);
        // نمونه استفاده
        // $shahkar = new Api_Services("توکن_شما");
        // $result = $shahkar->checkNationalCodeLite("0010007700", "09120000000");
        // var_dump($result);
    }

    public function Shahkar2($nationalCode, $mobile)
    {
        $data = [
            "nationalCode" => $nationalCode, // کد ملی
            "mobile" => $mobile // موبایل
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/ShahkarLite", $data);
    }

    public function matchNationalCodeWithCard($nationalCode, $birthDate, $cardNumber)
    {
        $data = [
            "nationalCode" => $nationalCode, // کد ملی
            "birthDate" => $birthDate,// تاریخ تولد
            "cardNumber" => $cardNumber// شماره کارت
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/CardMatch", $data);
    }

    public function matchNationalCodeWithIban($nationalCode, $birthDate, $iban)
    {
        $data = [
            "nationalCode" => $nationalCode, // کد ملی
            "birthDate" => $birthDate,// تاریخ تولد
            "iban" => $iban// شماره شبا
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/IbanMatch", $data);
    }

    public function matchNationalCodeWithIbanPro($nationalCode, $iban)
    {
        $data = [
            "nationalCode" => $nationalCode, // کد ملی
            "iban" => $iban                  // شماره شبا 26 رقمی به فرمت IR...
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/IbanMatchPro", $data);
    }

    public function makeCall(array $numbers, $voiceID)
    {
        $data = [
            "numbers" => $numbers, // لیستی از شماره موبایل ها یا تلفن های ثابت
            "voiceID" => $voiceID  // شناسه فایل صوتی
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/Call", $data);
    }

    public function sendCallOTP($code, $number)
    {
        $data = [
            "code" => $code,     // کد یکبار مصرف یا OTP
            "number" => $number  // شماره موبایل یا تلفن ثابت به فرمت 09121112222 یا 02122228888
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/CallOTP", $data);
    }

    public function sendCallOTPAlt($code, $number)
    {
        $data = [
            "code" => $code,     // کد یکبار مصرف یا OTP
            "number" => $number  // شماره موبایل یا تلفن ثابت به فرمت 09121112222 یا 02122228888
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/CallOTPalt", $data);
    }

    public function sendSmsOTP($code, $mobile, $template = 1)
    {
        $data = [
            "code" => $code,       // کد یا OTP
            "mobile" => $mobile,   // شماره موبایل به فرمت 09121112222
            "template" => $template // نوع قالب پیامک: کد=0، کد ورود=1، کد تایید=2، رمز=3، رمز ورود=4
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/SmsOTP", $data);
    }

    public function sendServiceSms($message, array $mobiles)
    {
        $data = [
            "message" => $message,   // متن پیامک
            "mobiles" => $mobiles    // لیست شماره موبایل‌ها
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/SendSms", $data);
    }

    public function videoBiometricVerification($nationalCode, $birthDate, $serialNumber, $videoBase64, $matchingThreshold = 90)
    {
        $data = [
            "nationalCode" => $nationalCode,           // کد ملی
            "birthDate" => $birthDate,                 // تاریخ تولد به فرمت 1370/1/1
            "serialNumber" => $serialNumber,           // سریال پشت کارت ملی یا رهگیری رسید کارت ملی
            "videoBase64" => $videoBase64,             // ویدئوی سلفی کاربر به صورت Base64 (حداکثر 5 مگابایت)
            "matchingThreshold" => $matchingThreshold  // حد آستانه تطبیق چهره (مثلاً 90)
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/VideoMatch", $data);
    }

    public function videoBiometricLive($nationalCode, $birthDate, $serialNumber, $videoBase64, $matchingThreshold = 90, $livenessThreshold = 80)
    {
        $data = [
            "nationalCode" => $nationalCode,           // کد ملی
            "birthDate" => $birthDate,                 // تاریخ تولد به فرمت 1370/1/1
            "serialNumber" => $serialNumber,           // سریال پشت کارت ملی یا رهگیری رسید کارت ملی
            "videoBase64" => $videoBase64,             // ویدئوی سلفی کاربر به صورت Base64 (حداکثر 5 مگابایت)
            "matchingThreshold" => $matchingThreshold, // حد آستانه تطبیق چهره (مثلاً 90)
            "livenessThreshold" => $livenessThreshold  // حد آستانه زنده سنجی (مثلاً 80)
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/VideoLive", $data);
    }

    public function videoBiometricFull($nationalCode, $birthDate, $serialNumber, $videoBase64, $speechText, $matchingThreshold = 90, $livenessThreshold = 80, $speechThreshold = 50)
    {
        $data = [
            "nationalCode" => $nationalCode,           // کد ملی
            "birthDate" => $birthDate,                 // تاریخ تولد به فرمت 1370/1/1
            "serialNumber" => $serialNumber,           // سریال پشت کارت ملی یا رهیگیری رسید کارت ملی
            "videoBase64" => $videoBase64,             // ویدئوی سلفی کاربر به صورت Base64 (حداکثر 5 مگابایت)
            "speechText" => $speechText,               // متنی که فرد در زمان ضبط می خواند
            "matchingThreshold" => $matchingThreshold, // حد آستانه تطبیق چهره (مثلاً 90)
            "livenessThreshold" => $livenessThreshold, // حد آستانه زنده سنجی (مثلاً 80)
            "speechThreshold" => $speechThreshold      // حد آستانه تطبیق گفتار (مثلاً 50)
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/VideoVerify", $data);
    }

    public function imageBiometricVerification($nationalCode, $birthDate, $serialNumber, $imageBase64, $matchingThreshold = 75)
    {
        $data = [
            "nationalCode" => $nationalCode,           // کد ملی
            "birthDate" => $birthDate,                 // تاریخ تولد به فرمت 1370/1/1
            "serialNumber" => $serialNumber,           // سریال پشت کارت ملی یا رهیگیری رسید کارت ملی
            "imageBase64" => $imageBase64,             // عکس سلفی به صورت Base64
            "matchingThreshold" => $matchingThreshold  // حد آستانه تطبیق (50 تا 100)
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/FaceMatch", $data);
    }

    public function imageBiometricLite($nationalCode, $birthDate, $serialNumber, $imageBase64, $matchingThreshold = 75)
    {
        $data = [
            "nationalCode" => $nationalCode,           // کد ملی
            "birthDate" => $birthDate,                 // تاریخ تولد به فرمت 1370/1/1
            "serialNumber" => $serialNumber,           // سریال پشت کارت ملی یا رهگیری رسید کارت ملی
            "imageBase64" => $imageBase64,             // عکس سلفی به صورت Base64
            "matchingThreshold" => $matchingThreshold  // حد آستانه تطبیق (50 تا 100)
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/FaceMatchLite", $data);
    }

    public function checkEnamad($domain)
    {
        $data = [
            "domain" => $domain // نام دامنه سایت
        ];
        return $this->sendRequest("https://s.api.ir/api/sw1/Enamad", $data);
    }

    public function getDynamicWallpaper()
    {
        $data = []; // هیچ پارامتری نیاز ندارد
        return $this->sendRequest("https://s.api.ir/api/sw1/Wallpaper", $data);
    }

    public function getIbanByAccount($accountNumber, $bankCode)
    {
        // نگاشت کد بانک به نام بانک
        $bankNames = [
            "010" => "مرکزی",
            "011" => "صنعت و معدن",
            "012" => "ملت",
            "013" => "رفاه",
            "014" => "مسکن",
            "015" => "سپه",
            "016" => "کشاورزی",
            "017" => "ملی",
            "018" => "تجارت",
            "019" => "صادرات",
            "020" => "توسعه صادرات",
            "021" => "پست",
            "022" => "توسعه تعاون",
            "051" => "موسسه اعتباری توسعه",
            "053" => "کارآفرین",
            "054" => "پارسیان",
            "055" => "اقتصاد نوین",
            "056" => "سامان",
            "057" => "پاسارگاد",
            "058" => "سرمایه",
            "059" => "سینا",
            "060" => "قرض الحسنه مهر",
            "061" => "شهر",
            "062" => "تات",
            "063" => "انصار",
            "064" => "گردشگری",
            "065" => "حکمت ایرانیان",
            "066" => "دی"
        ];

        $data = [
            "accountNumber" => $accountNumber, // شماره حساب بانکی
            "bankCode" => $bankCode            // کد بانک
        ];

        $response = $this->sendRequest("https://s.api.ir/api/sw1/BankAccountInfo", $data);

        // اضافه کردن نام بانک در پاسخ
        if (isset($response['data']['iban'])) {
            $response['data']['bankName'] = isset($bankNames[$bankCode]) ? $bankNames[$bankCode] : "نامشخص";
        }

        return $response;
    }

    public function getBankCardInfo($cardNumber)
    {
        $data = [
            "cardNumber" => $cardNumber // شماره کارت بانکی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/BankCardInfo", $data);
    }

    public function cardToIban($cardNumber)
    {
        $data = [
            "cardNumber" => $cardNumber // شماره کارت بانکی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/CardToIban", $data);
    }

    public function getIbanInfo($iban)
    {
        $data = [
            "iban" => $iban // شماره شبا 26 رقمی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/IbanInfo", $data);
    }

    public function getCompanyInfo($nationalID)
    {
        $data = [
            "nationalID" => $nationalID // شناسه ملی شرکت یا موسسه
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/CompanyInfo", $data);
    }

    public function getCompanyMembers($nationalID)
    {
        $data = [
            "nationalID" => $nationalID // شناسه ملی شرکت
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/CompanyMembers", $data);
    }

    public function getCompanyNewspapers($nationalID)
    {
        $data = [
            "nationalID" => $nationalID // شناسه ملی شرکت
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/CompanyNewspapers", $data);
    }

    public function getCompanySignatories($nationalID)
    {
        $data = [
            "nationalID" => $nationalID // شناسه ملی شرکت
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/CompanySignatories", $data);
    }

    public function getPostalCodeInfo(string $postalCode)
    {
        $data = [
            "postalCode" => $postalCode // کد پستی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/PostalCodeInfo", $data);
    }

    public function trackPostalPackage(string $trackingCode)
    {
        $data = [
            "trackingCode" => $trackingCode // کد رهگیری مرسوله پستی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/PostalTracking", $data);
    }

    public function getLocationByPostalCode($postalCode)
    {
        $data = [
            "postalCode" => $postalCode // کد پستی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/PostalCodeLocation", $data);
    }

    public function checkSana($nationalCode, $isCompany = false)
    {
        $data = [
            "nationalCode" => $nationalCode, // کد ملی یا شناسه ملی
            "isCompany" => $isCompany        // حقیقی=false، حقوقی=true
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/Sana", $data);
    }

    public function getUnpaidCheques($nationalCode)
    {
        $data = [
            "nationalCode" => $nationalCode // کد ملی فرد
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/UnpaidCheque", $data);
    }

    public function getChequeColor($nationalCode, $isCompany = false)
    {
        $data = [
            "nationalCode" => $nationalCode, // کد ملی یا شناسه ملی شرکت
            "isCompany" => $isCompany        // حقیقی = false، حقوقی = true
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/ChequeColor", $data);
    }

    public function getChequeInfo($chequeID)
    {
        $data = [
            "chequeID" => $chequeID // شناسه چک صیادی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/ChequeInfo", $data);
    }

    public function getActiveLoans($nationalCode)
    {
        $data = [
            "nationalCode" => $nationalCode // کد ملی یا شناسه ملی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/ActiveLoans", $data);
    }

    public function getPassportStatus($nationalCode, $mobile)
    {
        $data = [
            "nationalCode" => $nationalCode, // کد ملی فرد
            "mobile" => $mobile              // شماره موبایل با فرمت 09120001111
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/PassportStatus", $data);
    }

    public function getDrivingLicenseScore($nationalCode, $mobile, $licenseNumber)
    {
        $data = [
            "nationalCode" => $nationalCode,   // کد ملی فرد
            "mobile" => $mobile,               // شماره موبایل با فرمت 09120001111
            "licenseNumber" => $licenseNumber  // شماره گواهینامه رانندگی
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/DrivingScore", $data);
    }

    public function getDrivingLicense($nationalCode, $mobile)
    {
        $data = [
            "nationalCode" => $nationalCode,  // کد ملی یا شناسه ملی فرد
            "mobile" => $mobile               // شماره موبایل با فرمت 09120001111
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/DrivingLisense", $data);
    }

    public function getMilitaryStatus($nationalCode)
    {
        $data = [
            "nationalCode" => $nationalCode  // کد ملی فرد
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/MilitaryStatus", $data);
    }

    public function getActivePlates($nationalCode, $mobile)
    {
        $data = [
            "nationalCode" => $nationalCode,  // کد ملی یا شناسه ملی
            "mobile" => $mobile               // شماره موبایل به فرمت 09120000000
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/ActivePlates", $data);
    }

    public function getPlateHistory($nationalCode, $plateNumber)
    {
        $data = [
            "nationalCode" => $nationalCode,  // کد ملی مالک پلاک
            "plateNumber" => $plateNumber     // شماره پلاک به فرمت "ایران 11 – 1111 ب 11"
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/PlateHistory", $data);
    }

    public function getVehicleInfoByParts($nationalCode, $part1, $letter, $part2, $part3)
    {
        $plateNumber = "ایران {$part1} – {$part2} {$letter} {$part3}";

        $data = [
            "nationalCode" => $nationalCode, // کد ملی مالک پلاک
            "plateNumber" => $plateNumber // شماره پلاک به فرمت "ایران 11 – 1111 ب 11"
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/VehicleInfo", $data);
    }


    public function getVehicleViolationByParts($nationalCode, $mobile, $part1, $letter, $part2, $part3)
    {
        // ساخت پلاک به فرمت استاندارد
        $plateNumber = "ایران {$part1} – {$part2} {$letter} {$part3}";

        $data = [
            "nationalCode" => $nationalCode,  // کد ملی مالک خودرو
            "mobile" => $mobile,              // شماره موبایل
            "plateNumber" => $plateNumber     // پلاک خودرو
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/VehicleViolation", $data);
    }

    public function getNationalityStatus($code, $codeType = 2)
    {
        $data = [
            "code" => $code,         // کد شناسایی تبعه / فیدا / شناسه فراگیر / کد یکتا
            "codeType" => $codeType  // نوع کد: 1=کد شناسایی تبعه، 2=فیدا، 3=شناسه فراگیر ناجا، 4=کد یکتا
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/NationalityStatus", $data);
    }

    public function getWaterBill($billID)
    {
        $data = [
            "billID" => $billID  // شناسه قبض آب
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/WatterBill", $data);
    }

    public function getWaterBillInfo($billID)
    {
        $data = [
            "billID" => $billID  // شناسه قبض آب
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/WatterBillInfo", $data);
    }

    public function getGasBill($billID)
    {
        $data = [
            "billID" => $billID  // شناسه قبض گاز
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/GasBill", $data);
    }

    public function getGasBillInfo($billID)
    {
        $data = [
            "billID" => $billID  // شناسه قبض گاز
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/GasBillInfo", $data);
    }

    public function getPowerBill($billID)
    {
        $data = [
            "billID" => $billID  // شناسه قبض برق
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/PowerBill", $data);
    }

    public function getPowerBillInfo($billID)
    {
        $data = [
            "billID" => $billID  // شناسه قبض برق
        ];

        return $this->sendRequest("https://s.api.ir/api/sw1/PowerBillInfo", $data);
    }

    private function sendRequest($url, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
            "Authorization: Bearer " . $this->token
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $result = json_decode($response, true);

        if ($httpCode !== 200) {
            return [
                "success" => false,
                "code" => $httpCode,
                "error" => isset($result['error']) ? $result['error'] : "HTTP error",
                "message" => isset($result['message']) ? $result['message'] : null,
                "data" => null
            ];
        }

        return $result;
    }
}
