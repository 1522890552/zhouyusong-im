<?php

namespace im\Tencent\Group;

use GuzzleHttp\Exception\GuzzleException;
use im\Kernel\Interfaces\GroupNotifyInterface;
use im\Tencent\Request\TencentClient;

/**
 * Class NotifyClient
 * @author zhouyusong
 * @package im\Tencent\Group
 */
class NotifyClient extends TencentClient implements GroupNotifyInterface
{
    /**
     * 在群组中发送系统通知
     * https://cloud.tencent.com/document/product/269/1630.
     *
     * @param $groupId
     * @param $text
     * @param array $at 接收者群成员列表，请填写接收者 UserID，不填或为空表示全员下发
     *
     * @throws GuzzleException
     *
     * @return mixed
     */
    public function sendNotify($groupId, $text, array $at = [])
    {
        $params = [
            'GroupId' => $groupId,
            'Content' => $text,
        ];
        if ($at) {
            $params['ToMembers_Account'] = $at;
        }

        return $this->send('group_open_http_svc/send_group_system_notification', $params);
    }
}
