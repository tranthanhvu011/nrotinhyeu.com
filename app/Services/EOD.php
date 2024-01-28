<?php
/**
 * EOD: Export On Demand Service
 * Created by Andy Nguyen on 10/28/21
 * Copyright Â© 2018-2019 Beeknights Co., Ltd. All rights reserved.
 */

namespace App\Services;


use Illuminate\Support\Facades\Redis;

abstract class EOD
{
    // Key phÃ¢n biá»‡t cÃ¡c file export, dÃ¹ng lÃ m redis key...
    abstract public function getKey();

    // Gá»“m path trong folder public vÃ  tÃªn folder. Ex: excel-files/daily-request/Thuong_Nhom.xlsx
    abstract function getFilePath();

    public function getFileFullPath() {
        return public_path($this->getFilePath());
    }

    public function getCurrentFile() {
        $path = $this->getFileFullPath();
        if (!file_exists($path)) {
            return null;
        }
        return [
            'creation_time' => date("H:i d-m-Y", filemtime($path)),
            'url' => url($this->getFilePath()) . "?t=" . time()
        ];
    }

    public function isProcessRunning() {
        return Redis::get($this->getKey());
    }

    public function setProcessRunning() {
        // Expire after 10p to make sure it will never stuck
        Redis::set($this->getKey(), true, 'EX', 600);
    }

    public function unsetProcessRunning() {
        Redis::del($this->getKey());
    }
}