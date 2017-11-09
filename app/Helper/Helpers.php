<?php

if(!function_exists('site_option'))
{
    function site_option($param)
    {
        $option = App\Option::where('opt_name', $param)->get('opt_value');
        return $option;
    }
}

if(!function_exists('genRegNumber'))
{
    function genRegNumber()
    {
        $members = App\Member::count();
        $lastnum = $members + 1;
        $prefix = 'AGT';
        $digits = strlen($lastnum);

        switch ($digits) {
            case $digits == '1':
                $numreg = $prefix.'0000'.$lastnum;
                break;

            case $digits == '2':
                $numreg = $prefix.'000'.$lastnum;
                break;

            case $digits == '3':
                $numreg = $prefix.'00'.$lastnum;
                break;

            case $digits == '4':
                $numreg = $prefix.'0'.$lastnum;
                break;

            default:
                $numreg = $prefix.$lastnum;
                break;
        }
        return $numreg;
    }
}

if(!function_exists('genSaveNumber'))
{
    function genSaveNumber()
    {
        $savings = App\Saving::count();
        $lastnum = $savings + 1;
        $prefix = 'SIM';
        $digits = strlen($lastnum);

        switch ($digits) {
            case $digits == '1':
                $numsav = $prefix.'0000'.$lastnum;
                break;

            case $digits == '2':
                $numsav = $prefix.'000'.$lastnum;
                break;

            case $digits == '3':
                $numsav = $prefix.'00'.$lastnum;
                break;

            case $digits == '4':
                $numsav = $prefix.'0'.$lastnum;
                break;

            default:
                $numsav = $prefix.$lastnum;
                break;
        }
        return $numsav;
    }
}

if(!function_exists('genLoanNumber'))
{
    function genLoanNumber()
    {
        $loans = App\Loan::count();
        $lastnum = $loans + 1;
        $prefix = 'PIM';
        $digits = strlen($lastnum);

        switch ($digits) {
            case $digits == '1':
                $numsav = $prefix.'0000'.$lastnum;
                break;

            case $digits == '2':
                $numsav = $prefix.'000'.$lastnum;
                break;

            case $digits == '3':
                $numsav = $prefix.'00'.$lastnum;
                break;

            case $digits == '4':
                $numsav = $prefix.'0'.$lastnum;
                break;

            default:
                $numsav = $prefix.$lastnum;
                break;
        }
        return $numsav;
    }
}


if(!function_exists('InstallmentSec'))
{
    function InstallmentSec($param)
    {
        $lastnum = App\Installment::where('id_pinjaman', $param)->count();
        return ++$lastnum;
    }
}
