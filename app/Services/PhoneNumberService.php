<?php

namespace App\Services;

class PhoneNumberService
{

    /**
     * Validate phone number
     *
     * @param string $mobile
     * @return bool
     */
    public static function validate(string $mobile): bool
    {
        if (preg_match("/\((237)\) ?[2368]\d{7,8}$/", $mobile)) {
            return true;
        }

        if (preg_match("/\((251)\) ?[1-59]\d{8}$/", $mobile)) {
            return true;
        }

        if (preg_match("/\((212)\) ?[5-9]\d{8}$/", $mobile)) {
            return true;
        }

        if (preg_match("/\((258)\) ?[28]\d{7,8}$/", $mobile)) {
            return true;
        }

        if (preg_match("/\((256)\) ?\d{9}$/", $mobile)) {
            return true;
        }

        return false;
    }

    /**
     * Get country code from phone field
     *
     * @param string $number
     * @return false|string
     */
    public static function getCode(string $number)
    {
        return substr($number, 1, 3);
    }

    /**
     * Get only the phone number from phone field
     *
     * @param string $number
     * @return false|string
     */
    public static function getPhone(string $number)
    {
        return substr($number, 6);
    }

}
