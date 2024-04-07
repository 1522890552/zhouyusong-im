<?php

namespace im\Tencent\Other;

use GuzzleHttp\Exception\GuzzleException;
use im\Tencent\Request\TencentClient;

/**
 * Class OperationClient
 * @author laoqianjunzi
 * @package im\Tencent\Other
 */
class OperationClient extends TencentClient
{
    /**
     * 拉取运营数据
     * https://cloud.tencent.com/document/product/269/4193.
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function getappinfo()
    {
        return $this->send('openconfigsvr/getappinfo', []);
    }

    const CHATTYPE_C2C = 'C2C';
    const CHATTYPE_GROUP = 'Group';

    /**
     * 下载最近消息记录.
     *
     * @param $msgTime
     * @param string $chatType
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function gethistory($msgTime, $chatType = OperationClient::CHATTYPE_C2C)
    {
        $params = [
            'ChatType' => $chatType,
            'MsgTime' => $msgTime,
        ];

        return $this->send('open_msg_svc/get_history', $params);
    }

    /**
     * 获取服务器 IP 地址
     * https://cloud.tencent.com/document/product/269/45438.
     *
     * @throws GuzzleException
     *
     * @return string
     */
    public function getIPList()
    {
        return $this->send('ConfigSvc/GetIPList', []);
    }
}
